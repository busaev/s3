<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

use AppBundle\Entity\ContentBaseEntity;

class ModulePage implements EntityInterface 
{
    private $conteiner = null;
    
    public function __construct($conteiner) {
        $this->conteiner=$conteiner;
    }

    public function getRequest() {
        return $this->getContainer()->get('request');        
    }
    
    public function getContainer() 
    {
        return $this->conteiner;
    }
    
    public function init(ContentBaseEntity $entity)
    {
        return $entity->setRoutePath('/module/');
    }
}
