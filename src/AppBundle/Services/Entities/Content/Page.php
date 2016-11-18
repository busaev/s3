<?php

namespace AppBundle\Services\Entities\Content;

use AppBundle\Services\Entities\EntityInterface;
use AppBundle\Services\Entities\BaseEntity;

class Page extends BaseEntity implements EntityInterface
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
        $em = $this->getContainer()->get('doctrine')->getManager();
        
        $entities = $this->container->get('app.entities');        
        $entityModule = $entities->module;
        
        if(!$entity)
        {
            $entity = $this->getNew();
        }

        $content = $em->getRepository($entityModule->getLogicalName())->findOneBy([
            'entityCode'=>$this->getCode()
        ]);

        return $entity->setRoutePath($content->getRoutePath());
    }
}
