<?php

namespace AppBundle\Services\Entities\Content;

use AppBundle\Services\Entities\EntityInterface;
use AppBundle\Services\Entities\BaseEntity;

class ContentPage extends BaseEntity implements EntityInterface
{
    protected $container = null;

    public function __construct($container)
    {
        $this->container=$container;
    }

    public function getRequest() {
        return $this->getContainer()->get('request');
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function init($entity=false)
    {
        if(!$entity)
        {
            $entity = $this->getNew();
        }
        
        return $entity->setRoutePath('/content/');
    }

    public function baseQuery()
    {
        $doctrine = $this->container->get('doctrine');
        $entities = $this->container->get('app.entities');
        
        $entityScroll = $entities->scroll_item;
        
        // Основной запрос
        $status = $doctrine->getRepository($entityScroll->getLogicalName())
                           ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        // Основной запрос
        return $doctrine->getRepository($this->getLogicalName())
                        ->createQueryBuilder('e')
                        ->select('e')
                        ->where('e.entryStatus != :status')
                        ->setParameter('status', $status->getId());
    }
}
