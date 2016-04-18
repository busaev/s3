<?php
namespace AppBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Yaml\Yaml;

use AppBundle\Entity\Core\Route;


class Router implements EventSubscriber
{
    
    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @doc http://doctrine-orm.readthedocs.org/projects/doctrine-orm/en/latest/reference/events.html
     * 
     * @return array
     */
    public function getSubscribedEvents()
    {
        return [
            'postPersist',
            'postUpdate',
            //'postFlush',
            //'postRemove'
        ];


        /**
         * @todo Check if this is running in the console or what...
         */
        if (isset($_SERVER['HTTP_HOST'])) {

            return [
                'postPersist',
                'postUpdate',
                //'postFlush',
                //'postRemove'
            ];
        }

        return [];
    }

    /**
     * Эвент, выполняемый после добавления записи
     * Если у добавляемой записи есть routePath - Создаем Route
     * 
     * @param LifecycleEventArgs $args
     */
    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ( $this->skipCondition($entity) && is_callable(array($entity, 'getRoutePath')))
        {
            $em       = $args->getEntityManager();
            $entities = $this->container->get('app.entities');

            $entityCode = $entities->getByObject($entity)->getCode();
            $action     = $this->getLogicalAction($entityCode, 'show');

            // Создаём маршрут
            $route = new Route;
            $route->setEntryId($entity->getId());
            $route->setRoutePath($entity->getRoutePath());
            $route->setEntityCode($entityCode);
            $route->setAction($action);

            $contentType = 'action';
            if(is_callable([$entity, 'getContentType']))
            {
                $contentType = $entity->getContentType();
            }
            $route->setContentType($contentType);
                        
            // Обновляем сущность
            $entity->setRoute($route);
            
            $em->persist($route);
            $em->persist($entity);
            
            $em->flush();
            
        }
    }

    /**
     * Эвент, выполняемый после обновления записи
     * Если у записи есть routePath - Обновляем Route
     * 
     * @param LifecycleEventArgs $args
     */
    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
        
        if ($this->skipCondition($entity) && is_callable(array($entity, 'getRoutePath'))) 
        {
            $em       = $args->getEntityManager();
            $entities = $this->container->get('app.entities');
            
            $entityCode = $entities->getByObject($entity)->getCode();
            $action     = $this->getLogicalAction($entityCode, 'show');
            
            $route = $em->getRepository('AppBundle:Core\\Route')->findOneBy([
                'entryId' => $entity->getId(),
                'entityCode' => $entityCode
            ]);
            
            if(null !== $route)
            {
                $route->setRoutePath($entity->getRoutePath());
                $route->setAction($action);

                $em->persist($route);
                $em->flush();
            }
            else
            {
                $route = new Route();
                
                $route->setEntityCode($entityCode);
                $route->setContentType('content');
                $route->setRoutePath($entity->getRoutePath());
                $route->setAction($action);
                $route->setEntryId($entity->getId());

                $em->persist($route);
                $em->flush();
            }
        }
    }
    
    public function postRemove(LifecycleEventArgs $args)
    {
    }
    
    public function postFlush(PostFlushEventArgs $args)
    {   
    }

    protected function skipCondition($entity)
    {
        if( get_class($entity) != 'AppBundle\\Entity\\Core\\Route' && get_class($entity) != 'AppBundle\\Entity\\Core\\Content' ) {
            return true;
        }
        return false;
    }
    
    /**
     * Получить нужный бандл
     * пока он 1, его и возвращаем
     * 
     * @return string
     */
    public function getBundle()
    {
        return 'AppBundle';
    }
    
    /**
     * Получить нужное приложение
     * пока публичное приложение 1 - его и возвращаем
     * 
     * @return string
     */
    public function getApplication()
    {
        return 'Frontend';
    }

    /**
     * Найти в конфиге нужный экшн для сущности
     * 
     * @param string $entityCode
     * @param string $action
     * 
     * @return string|boolean
     */
    protected function getControllerAction($entityCode, $action)
    {
        $application = $this->getApplication();
        $root        = $this->container->getParameter('kernel.root_dir');
        
        $yaml        = Yaml::parse(file_get_contents($root . '/Resources/config/actions.yml'));
        
        if(isset($yaml[$entityCode][$application][$action]))
        {
            return $yaml[$entityCode][$application][$action];
        }
        
        if(isset($yaml[$entityCode]['default'][$action]))
        {
            return $yaml[$entityCode]['default'][$action];
        }
        
        if(isset($yaml['default']['default'][$action]))
        {
            return $yaml['default']['default'][$action];
        }
        
        if(isset($yaml['default']['default']['default']))
        {
            return $yaml['default']['default']['default'];
        }
        
        return false;
    }
    
    /**
     * Сформировать логичесий путь до контроллера
     * 
     * @param string $entityCode
     * @param string $action
     * @return string
     */
    protected function getLogicalAction($entityCode, $action)
    {
        return $this->getBundle() . ':' . $this->getApplication() . '/' . $this->getControllerAction($entityCode, $action);
    }
}
