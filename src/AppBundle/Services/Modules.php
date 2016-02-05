<?php

namespace AppBundle\Services;

use AppBundle\Modules\ModuleInterface;

class Modules {
    
    private $modules;
    
    public function __get($name) {
        if(isset($this->modules[$name])) {
            if(!($this->modules[$name] instanceof ModuleInterface)) {
                throw new \Exception('Модуль должен быть отимплементирован от ModuleInterface');
            }
            return $this->modules[$name];
        }
        throw new \Exception('Модуль не найден');
    }

    public function __construct()
    {
        $this->modules = array();
    }

    public function addModule($key, $module)
    {
        $this->modules[$key] = $module;
    }
}
