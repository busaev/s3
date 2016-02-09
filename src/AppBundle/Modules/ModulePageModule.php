<?php

namespace AppBundle\Modules;

use AppBundle\Modules\ModuleInterface;

use AppBundle\Entity\ContentBaseEntity;

class ModulePageModule implements ModuleInterface 
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
