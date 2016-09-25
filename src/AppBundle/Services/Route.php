<?php

namespace AppBundle\Services;

use Symfony\Component\Yaml\Yaml;

class Route
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    
    
    /**
     * Получить нужный бандл
     * пока он 1, его и возвращаем
     * 
     * @return string
     */
    public function getBundle()
    {
        return 'AppBundle';
    }
    
    /**
     * Получить нужное приложение
     * пока публичное приложение 1 - его и возвращаем
     * 
     * @return string
     */
    public function getApplication()
    {
        return 'Frontend';
    }
    
    /**
     * Сформировать логичесий путь до контроллера
     * 
     * @param obgect $entity
     * @param string $entityCode
     * @param string $action
     * @return string
     */
    public function getLogicalAction($entity, $entityCode)
    {   
        if(is_callable([$entity, 'getAction']))
        {
            return $entity->getAction();
        }

        return $this->getBundle() . ':' . $this->getApplication() . '/' . ucfirst(strtolower($entityCode)) . ':route';
    }
}
