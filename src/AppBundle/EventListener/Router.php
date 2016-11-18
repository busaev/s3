<?php
namespace AppBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Filesystem\Filesystem;

use AppBundle\Entity\Core\ModulePage;
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
         * если нужно оставить евенты только для хттп запросов
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
        $em     = $args->getEntityManager();
        $entity = $args->getEntity();

        if ( $this->skipCondition($entity) && is_callable(array($entity, 'getRoutePath')))
        {
            $path = $entity->getRoutePath();
            if('' == $path)
            {
                return;
            }
            
            $entities = $this->container->get('app.entities');
            $router   = $this->container->get('app.route');
            
            $entityCode = $entities->getEntity($entity)->getCode();
            
<<<<<<< HEAD
            // Создаём маршрут
            $route = new Route;
            $route->setEntryId($entity->getId());
            $route->setRoutePath($entity->getRoutePath());
            $route->setEntityCode($entityCode);
            
            // определим тип экшена
            $actionType = 'show';
            if(is_callable([$entity, 'getActionType']))
            {
                $actionType = $entity->getActionType();
                if($actionType instanceof \AppBundle\Entity\Core\ScrollItem)
                {
                    $actionType = $actionType->getCode();
                }
            }            
            $route->setActionType($actionType);
            
            // это страница модуля?
=======
>>>>>>> cf05d614c7737a63ac291942cf0bb18588ee1dc1
            if($entity instanceof ModulePage)
                $modulePage = $entity;
            else
                $modulePage = $em->getRepository('AppBundle:Core\\ModulePage')->getModulePage($entityCode, 'route');
            
            if(null !== $modulePage)
            {
                // Создаём маршрут
                $route = new Route;
                $route->setEntryId($entity->getId());
                $route->setPath($path);
                $route->setModulePage($modulePage);


                // Обновляем сущность
                $entity->setRoute($route);

                $em->persist($route);
                //$em->persist($entity);

                $em->flush();
            }
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
            $router   = $this->container->get('app.route');
            
            $path = $entity->getRoutePath();
            if('' == $path)
            {
                return;
            }
            
<<<<<<< HEAD
            $entityCode = $entities->getEntity($entity)->getCode();
            $action     = $router->getLogicalAction($entity, $entityCode, $actionType);
=======
            $entityCode = $entities->getEntityCode($entity)->getCode();
            $action     = $router->getLogicalAction($entity, $entityCode);
>>>>>>> cf05d614c7737a63ac291942cf0bb18588ee1dc1
            
            $route = $em->getRepository('AppBundle:Core\\Route')->findOneBy([
                'entityCode' => $entityCode,
                'entryId' => $entity->getId()
            ]);
            
            if(null !== $route)
            {
                $route->setPath($path);
                $route->setAction($action);

                $em->persist($route);
                $em->flush();
            }
            else
            {
                $route = new Route();
                
                $route->setPath($path);
                $route->setAction($action);
                $route->setEntryId($entity->getId());

                $em->persist($route);
                $em->flush();
            }
            
            $fs = new Filesystem();
            $fs->remove($this->container->getParameter('kernel.cache_dir'));
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
        if( get_class($entity) != 'AppBundle\\Entity\\Core\\Route' && get_class($entity) != 'AppBundle\\Entity\\Core\\Module' ) {
            return true;
        }
        return false;
    }
}
