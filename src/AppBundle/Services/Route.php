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
     * Найти в конфиге нужный экшн для сущности и экшена
     * 
     * @param string $entityCode
     * @param string $action
     * 
     * @return string|boolean
     */
    public function getControllerAction($entityCode, $action)
    {
        $application = $this->getApplication();
        $root = $this->container->getParameter('kernel.root_dir');

        $yaml = Yaml::parse(file_get_contents($root . '/Resources/config/actions.yml'));

        if(isset($yaml[$entityCode][$application][$action]))
        {
            return $yaml[$entityCode][$application][$action];
        }
        
        if(isset($yaml[$entityCode][$application]['default']))
        {
            return $yaml[$entityCode][$application]['default'];
        }
        
        if(isset($yaml['default']['default'][$action]))
        {
            return $yaml['default']['default'][$action];
        }
        
        if(isset($yaml['default']['default']['default']))
        {
            return $yaml['default']['default']['default'];
        }
        
        return false;
    }
    
    /**
     * Сформировать логичесий путь до контроллера
     * 
     * @param obgect $entity
     * @param string $entityCode
     * @param string $action
     * @return string
     */
    public function getLogicalAction($entity, $entityCode, $action)
    {
        // если у записи есть экшн
        // пока только у записей content_page есть action
        if(is_callable([$entity, 'getAction']))
        {
            //return $entity->getAction();
        }

        return $this->getBundle() . ':' . $this->getApplication() . '/' . $this->getControllerAction($entityCode, $action);
    }
}
