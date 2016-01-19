<?php
namespace AppBundle\EventListener;

use Doctrine\Common\EventSubscriber;
use Doctrine\ORM\Event\LifecycleEventArgs;
use Doctrine\ORM\Event\PostFlushEventArgs;
use Symfony\Component\DependencyInjection\ContainerInterface;
// for Doctrine 2.4: Doctrine\Common\Persistence\Event\LifecycleEventArgs;
//use Doctrine\Common\Persistence\Event\LifecycleEventArgs;

use AppBundle\Entity\History;


class EntityLogger implements EventSubscriber
{
    
    protected $container;
    
    protected $history = [];

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
                'preUpdate',
                'postFlush',
                'preRemove'
            ];
        }

        return [];
    }

    public function postPersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
                
        if ( $this->skipCondition($entity)) {
            
            $className = strtolower($this->extractClass($entity));
            
        
            if ($this->skipCondition($entity)) {            
                $history = new History();

                $history->setCreatedAt(new \DateTime);
                $history->setUser($this->container->get('security.token_storage')->getToken()->getUser());

                $history->setEntity($className);
                $history->setType('add');
                $history->setEntryId($entity->getId());
                $history->setLog('Entity created');

                $this->history[] = $history;
            }
        }
    }

    public function preUpdate(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        $translator = $this->container->get('translator');
        $annotations = $this->container->get('annotations');
        
        $className = $this->extractClass($entity);

        $changes = $args->getEntityChangeSet();
        
        $meta = $annotations->getAll($className);
        
        $log = '';
        $idx = 1;
        foreach($changes as $field => $change)
        {
            $fieldName = ucfirst(strtolower($field));
            if(isset($meta['properties']['data'][$field])) {
                $fieldName =  $meta['properties']['data'][$field]->getTitle();
            }
        
            $log .= "<strong>" . $translator->trans($fieldName, [], 'backend') . "</strong><br />";
            $log .= " - " . $translator->trans('It was', [], 'backend') . ": " . $change[0] . "<br />";
            $log .= " - " . $translator->trans('It became', [], 'backend') . ": " . $change[1] . "<br />";
            
            if($idx < count($changes)) {
                $log .= "<br />";
                $idx++;
            }
        }

        if ($this->skipCondition($entity)) {
                
            $history = new History();

            $history->setCreatedAt(new \DateTime);
            $history->setUser($this->container->get('security.token_storage')->getToken()->getUser());

            $history->setEntity(strtolower($className));
            $history->setType('update');
            $history->setEntryId($entity->getId());
            $history->setLog($log);

            $this->history[] = $history;
        }
    }
    
    public function preRemove(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();
                
        if ( $this->skipCondition($entity)) {
            
            $className = strtolower($this->extractClass($entity));
        
            if ($this->skipCondition($entity)) {            
                $history = new History();

                $history->setCreatedAt(new \DateTime);
                $history->setUser($this->container->get('security.token_storage')->getToken()->getUser());

                $history->setEntity($className);
                $history->setType('deleted');
                $history->setEntryId($entity->getId());
                $history->setLog('Entity deleted');

                $this->history[] = $history;
            }
        }
    }
    
    public function postFlush(PostFlushEventArgs $args)
    {   
        if (! empty($this->history))
        {
            $em = $args->getEntityManager();
            
            foreach ($this->history as $history)
            {
                 $em->persist($history);
            }
            $this->history = [];
            $em->flush();
        }
    }

    protected function skipCondition($entity)
    {
        if( get_class($entity) != 'AppBundle\\Entity\\History' ) {
            return true;
        }
        return false;
    }
    
    protected function extractClass($entity)
    {
        $class = get_class($entity);
        $parts = explode('\\', $class);
        
        return end($parts);
    }
}
