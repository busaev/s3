<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

class News extends BaseEntity implements EntityInterface 
{
    protected $container = null;
    
    /**
     * @var boolean 
     */
    private $isContent = true;


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
        $em = $this->getContainer()->get('doctrine')->getManager();
        
        $module = $em->getRepository('AppBundle:Module')->findOneBy([
            'entity'=>'news'
        ]);
        
        return $entity->setRoutePath($module->getRoutePath());
    }
    
    public function baseQuery()
    {
        $doctrine = $this->container->get('doctrine');
        
        // Основной запрос
        $status = $doctrine->getRepository("AppBundle:ScrollItem")
                           ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        // Основной запрос
        return $doctrine->getRepository('AppBundle:Modules\\News')
                        ->createQueryBuilder('e')
                        ->select('e')
                        ->where('e.entryStatus != :status')
                        ->setParameter('status', $status->getId());
    }
}
