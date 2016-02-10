<?php

namespace AppBundle\Services;

class Entities {
    
    private $entities;
    
    public function __get($name) {
        if(isset($this->entities[$name])) {
            if(!($this->entities[$name] instanceof Entities\EntityInterface)) {
                throw new \Exception('Модуль должен быть отимплементирован от EntityInterface');
            }
            return $this->entities[$name];
        }
        return $this->entities['dummy'];
    }

    public function __construct()
    {
        $this->entities = array();
    }

    public function addEntity($key, $module)
    {
        $this->entities[$key] = $module;
    }
}
