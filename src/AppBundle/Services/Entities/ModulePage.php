<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

class ModulePage extends BaseEntity implements EntityInterface 
{
    private $container = null;
    
    /**
     * @var boolean 
     */
    protected $isContent = true;
    
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
        return $entity->setRoutePath('/module/');
    }
    
    public function baseQuery()
    {
        $doctrine = $this->container->get('doctrine');
        
        // Основной запрос
        $status = $doctrine->getRepository("AppBundle:ScrollItem")
                           ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        // Основной запрос
        return $doctrine->getRepository('AppBundle:Modules\\ModulePage')
                        ->createQueryBuilder('e')
                        ->select('e')
                        ->where('e.entryStatus != :status')
                        ->setParameter('status', $status->getId());
    }
}
