<?php

namespace AppBundle\Modules;

use AppBundle\Modules\ModuleInterface;

use AppBundle\Entity\ContentBaseEntity;

class PageModule implements ModuleInterface 
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
            'entity'=>'page'
        ]);
        
        return $entity->setRoutePath($module->getRoutePath());
    }
}
