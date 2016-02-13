<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

class ModulePage extends BaseEntity implements EntityInterface
{
    protected $container = null;

    /**
     * @var boolean
     */
    public $isContent = true;

    public function __construct($container) {
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
        
        return $entity->setRoutePath('/module/');
    }

    public function baseQuery()
    {
        $doctrine = $this->container->get('doctrine');

        // Основной запрос
        $status = $doctrine->getRepository("AppBundle:ScrollItem")
                           ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        // Основной запрос
        return $doctrine->getRepository($this->getLogicalName())
                        ->createQueryBuilder('e')
                        ->select('e')
                        ->where('e.entryStatus != :status')
                        ->setParameter('status', $status->getId());
    }
}
