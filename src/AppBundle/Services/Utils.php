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
}
