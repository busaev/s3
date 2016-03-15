<?php

namespace AppBundle\Services\Entities\Core;

use AppBundle\Services\Entities\EntityInterface;
use AppBundle\Services\Entities\BaseEntity;

class History extends BaseEntity implements EntityInterface 
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
     * Получить namespace для сущности
     *
     * @return string
     */
    public function getNamespace()
    {
        return 'AppBundle\\Entity\\Core\\' . $this->getName();
    }
    
    /**
     *
     * @param type $entityCode
     * @param type $bundle
     * @return type
     */
    public function getLogicalName()
    {
        return "AppBundle:Core\\" . $this->getName();
    }
    
    public function baseQuery()
    {
        return false;
    }
}
