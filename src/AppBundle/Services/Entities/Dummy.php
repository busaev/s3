<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

class Dummy extends BaseEntity implements EntityInterface 
{
    protected $container = null;
    
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
    
    /**
     * @return type
     */
    public function baseQuery()
    {
        $doctrine = $this->container->get('doctrine');
        
        // Основной запрос
        return $doctrine->getRepository($this->getLogicalName())
                        ->createQueryBuilder('e')
                        ->select('e');
    }
}
