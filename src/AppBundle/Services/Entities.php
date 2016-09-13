<?php

namespace AppBundle\Services;

class Entities 
{

    private $entities;

    private $container; 
    
    public function __get($name)
    {
        if(isset($this->entities[$name]))
        {
            if(!($this->entities[$name] instanceof Entities\EntityInterface))
            {
                throw new \Exception('Модуль должен быть отимплементирован от EntityInterface');
            }
            $this->entities[$name]->entityCode = $name;
            return $this->entities[$name];
        }
        
        // возвращаем сущность заглушку
        $entity = $this->entities['dummy'];
        $entity->entityCode = $name;

        return $entity;
    }

    public function __construct($container)
    {
        $this->container = $container;
        
        $this->entities = array();
    }

    public function addEntity($key, $content)
    {
        $this->entities[$key] = $content;
    }

    /**
     * Возвращает код сущности.
     *
     * 1. пытаемся вызвать метод возвращающий код
     * 2. возвращаем имя объекта
     *
     * @param object $object
     * @return string
     */
    public function getEntity($object)
    {
        //пытаемся дернуть метод
        if(is_callable([$object, 'getEntityCode']))
        {
            $name = $object->getEntityCode();
            return $this->$name;
        }

        //определяем исходя из имени объекта
        $utils = $this->container->get('utils');
        
        $class = get_class($object);
        
        if(!strpos($class, '\\'))
        {
            $name = $class;
        }
        else
        {
            $tmp = explode('\\', $class);
            $name = end($tmp);
        }
        
        $code = $utils->getUnderscore($name);
        return $this->$code;
    }
}
