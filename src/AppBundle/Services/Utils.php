<?php

namespace AppBundle\Services;

class Utils
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getCamelCase($entityCode)
    {
        if(strpos($entityCode, '_'))
        {
            $retrun = '';
            $parts = explode('_', $entityCode);
            foreach($parts as $part) {
                $retrun .= ucfirst(strtolower($part));
            }
            return $retrun;
        }
        return ucfirst(strtolower($entityCode));
    }
    
    public function getRepositoryLogicalName($entityCode, $bundle = "AppBundle")
    {
        return $bundle . ":Modules\\" . $this->getCamelCase($entityCode);
    }
    
    

    public function getEntityTitle($entityCode)
    {
        $entityCode = $this->getCamelCase($entityCode);

        $title = $entityCode;

        //аннотации
        $annotations = $this->container->get('annotations')->getAll($entityCode);

        if(isset($annotations['object']['data']) && is_object($annotations['object']['data']))
        {
            $title = $annotations['object']['data']->getTitle();
        }

        return $title;
    }
    
    
    

    public function getEntityTypeNamspace($entityCode)
    {
        return 'AppBundle\\Form\\' . $this->getCamelCase($entityCode) . 'Type';
    }


    public function createNewEntity($entityCode)
    {
        $entity = 'AppBundle\\Entity\\Modules\\' . $this->getCamelCase($entityCode);
        return new $entity;
    }

    /**
     * @depricated
     */
    public function createNewEntityType($entityCode)
    {
        return 'AppBundle\\Form\\' . $this->getCamelCase($entityCode) . 'Type';
    }

    /**
     * @depricated
     */
    public function getEntityNamspace($entityCode)
    {
        return 'AppBundle\\Entity\\' . $this->getCamelCase($entityCode);
    }
}
