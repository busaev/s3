<?php
namespace AppBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\VarDumper\VarDumper;

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
        $entity = $args->getEntity();

        if ( $this->skipCondition($entity) && is_callable(array($entity, 'getRoutePath')))
        {
            $em       = $args->getEntityManager();
            $entities = $this->container->get('app.entities');
            $router   = $this->container->get('app.route');

            $entityCode = $entities->getEntityCode($entity)->getCode();
            
            // Создаём маршрут
            $route = new Route;
            $route->setEntryId($entity->getId());
            $route->setRoutePath($entity->getRoutePath());
            $route->setEntityCode($entityCode);

            // определим тип экшена
            $actionType = 'show';
            if(is_callable([$entity, 'getActionType']))
            {
                $actionType = $entity->getActionType()->getCode();
            }
            $route->setActionType($actionType);

            $action = $router->getLogicalAction($entity, $entityCode, $actionType);
            $route->setAction($action);


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
            $router   = $this->container->get('app.route');


            // определим тип экшена
            $actionType = 'show';
            if(is_callable([$entity, 'getActionType']))
            {
                $actionType = $entity->getActionType()->getCode();
            }
            
            $entityCode = $entities->getEntityCode($entity)->getCode();
            $action     = $router->getLogicalAction($entity, $entityCode, $actionType);
            
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
                $route->setRoutePath($entity->getRoutePath());
                $route->setAction($action);
                $route->setEntryId($entity->getId());
                $route->setActionType($actionType);

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
}
