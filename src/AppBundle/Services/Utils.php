<?php

namespace AppBundle\Services;

class Utils
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * underscore to CamelCase
     * 
     * @param string $input
     * @return string
     */
    public function getCamelCase($input)
    {
        if(strpos($input, '_'))
        {
            $retrun = '';
            $parts = explode('_', $input);
            foreach($parts as $part) {
                $retrun .= ucfirst(strtolower($part));
            }
            return $retrun;
        }
        return ucfirst(strtolower($input));
    }
    
    /**
     * CamelCase to underscore 
     * 
     * @param string $input
     * @return string
     */
    function getUnderscore($input) 
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $input, $matches);        
        
        $ret = $matches[0];
        
        foreach ($ret as &$match) 
        {
          $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }
        
        return implode('_', $ret);
    }
    
    function getObjectClass($object)
    {
        if(!is_object($object))
        {
            return false;
        }
        
        $class = get_class($object);
        
        if(!strpos($class, '\\'))
        {
            $return = $class;
        }
        else
        {
            $tmp = explode('\\', $class);
            $return = end($tmp);
        }
        
        return $return;
    }
}
