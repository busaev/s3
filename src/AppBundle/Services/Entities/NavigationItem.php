<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

class NavigationItem extends BaseEntity implements EntityInterface 
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
}
