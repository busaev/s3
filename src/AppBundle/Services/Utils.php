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
     * Это не совсем камел кейс
     * Первая буква тоже большая
     * возвращает entity name
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

    /**
     * @param $s string
     * @return string
     */
    function slugify( $s )
    {
        $r = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м', 'н','о','п','р','с','т','у','ф','х','ц','ч', 'ш', 'щ', 'ъ','ы','ь','э', 'ю', 'я',' ');
        $l = array('a','b','v','g','d','e','e','g','z','i','y','k','l','m','n', 'o','p','r','s','t','u','f','h','c','ch','sh','sh','', 'y','y', 'e','yu','ya','-');
        $s = str_replace( $r, $l, strtolower($s) );
        $s = preg_replace("/[^\w\-]/","$1",$s);
        $s = preg_replace("/\-{2,}/",'-',$s);
        return trim($s,'-');
    }
}
