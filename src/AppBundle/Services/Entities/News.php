<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

use AppBundle\Entity\ContentBaseEntity;

class News implements EntityInterface 
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
        $em = $this->getContainer()->get('doctrine')->getManager();
        
        $module = $em->getRepository('AppBundle:Module')->findOneBy([
            'entity'=>'news'
        ]);
        
        return $entity->setRoutePath($module->getRoutePath());
    }
}
