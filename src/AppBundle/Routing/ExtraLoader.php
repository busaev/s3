<?php

namespace AppBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

use Symfony\Component\DependencyInjection\ContainerInterface;

class ExtraLoader extends Loader
{
    private $loaded = false;
    
    protected $container;
    
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    public function load($resource, $type = null)
    {
        if (true === $this->loaded) {
            throw new \RuntimeException('Do not add the "extra" loader twice');
        }
        
        $em = $this->container->get('doctrine.orm.entity_manager');
        $rs = $this->container->get('app.route');
        

        $routes = new RouteCollection();
        
        
        $customRouts = $em->getRepository('AppBundle:Core\Route')->findAll();
        
//        \Symfony\Component\VarDumper\VarDumper::dump($customRouts);
//        die();
        
        foreach($customRouts as $routeItem)
        {
            // prepare a new route
            $path = $routeItem->getPath();
            
            if("" == $path)
            {
                continue;
            }
            
            $modulePage = $routeItem->getModulePage();
            
            \Symfony\Component\VarDumper\VarDumper::dump($modulePage->getEntityCode());
            \Symfony\Component\VarDumper\VarDumper::dump($modulePage->getAction());
            \Symfony\Component\VarDumper\VarDumper::dump($rs->getLogicalAction($modulePage->getEntityCode(), $modulePage->getAction()));
            die();
            
            $defaults = array(
                '_controller' => $rs->getLogicalAction($modulePage->getEntityCode(), $modulePage->getAction()),
            );
            $requirements = array();
            $route = new Route($path, $defaults, $requirements, [], null, null, array('GET'));
            
            // add the new route to the route collection
            $routeName = preg_replace('/[^a-zA-Z]/', '', $path);
            $routes->add($routeName, $route);
        }        

        $this->loaded = true;

        return $routes;
    }

    public function supports($resource, $type = null)
    {
        return 'extra' === $type;
    }
}