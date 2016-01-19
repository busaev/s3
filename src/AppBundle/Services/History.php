<?php

namespace AppBundle\Services;

use AppBundle\Entity\History;


class History 
{
    private $em;
    private $tokenStorage;
    private $translator;
    
    public function __construct($em, $tokenStorage, $translator) {
        $this->em = $em;
        $this->tokenStorage = $tokenStorage;
        $this->translator = $translator;
    }
    
    public function add($entityCode, $entityType, $entityId='', $log = '')
    {   
        $history = new History();
        
        $history->setCreatedAt(new \DateTime);
        $history->setCreatedBy($this->tokenStorage->getToken()->getUser()->getId());
        
        $history->setEntity($entityCode);
        $history->setType($entityType);
        $history->setEntityId($entityId);
        $history->setLog($log);
        
        $this->em->persist($history);
        $this->em->flush();
    }
    
}
