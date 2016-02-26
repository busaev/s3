<?php

namespace AppBundle\Services;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Filesystem\Filesystem;

class Tpl
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function getTpl($entityCode, $view='index.html.twig', $app='frontend', $customSearchPaths=false)
    {
        $finder = new Finder;
        $fs     = new Filesystem();
        
        $basePath = $this->container->get('kernel')->getRootDir() . '/Resources/views/';
        
        $searchPaths = [
            $app . '/' . $entityCode . '/',
            $app . '/entity/'
        ];
           
        foreach($searchPaths as $path)
        {   
            if( ! $fs->exists($basePath . $path))
                continue;
            
            // первый найденный
            foreach ($finder->name($view)->in($basePath . $path) as $file)
            {
                return $path . $view;
            }
        }
        return false;
    }
}
