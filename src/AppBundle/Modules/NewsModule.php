<?php

namespace AppBundle\Modules;

use AppBundle\Modules\ModuleInterface;

use AppBundle\Entity\ContentBaseEntity;

class NewsModule implements ModuleInterface 
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
    
    public function getModulePath(ContentBaseEntity $entity)
    {
        return $entity->setRoutePath('bububu');
    }
}
