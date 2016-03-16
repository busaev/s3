<?php
namespace AppBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;

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

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
                
        if ( $this->skipCondition($entity) && is_callable(array($entity, 'getRoutePath'))) 
        {
            $em       = $args->getEntityManager();
            $entities = $this->container->get('app.entities');
            
            // Создаём маршрут
            $route = new Route;
            $route->setEntryId($entity->getId());
            $route->setRoutePath($entity->getRoutePath());

            $route->setAction($entity->getDefineAction($entity));

            $route->setContentType($entity->getContentType());
            $route->setEntityCode($entities->getByObject($entity)->getCode());
                        
            // Обновляем сущность
            $entity->setRoute($route);
            
            $em->persist($route);
            $em->persist($entity);
            
            $em->flush();
            
        }
    }

    public function postUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($this->skipCondition($entity) && is_callable(array($entity, 'getRoutePath'))) 
        {
            $em       = $args->getEntityManager();
            $entities = $this->container->get('app.entities');
            
            $route = $em->getRepository('AppBundle:Core\\Route')->findOneBy([
                'entryId' => $entity->getId(),
                'entityCode' => $entities->getByObject($entity)->getCode()
            ]);
            
            if(null !== $route)
            {
                $route->setAction($entity->getDefineAction($entity));
                $route->setRoutePath($entity->getRoutePath());

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
        if( get_class($entity) != 'AppBundle\\Entity\\Core\\Route' ) {
            return true;
        }
        return false;
    }
}
