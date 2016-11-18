<?php

namespace AppBundle\Routing;

use Symfony\Component\Config\Loader\Loader;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\VarDumper\VarDumper;

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
        
        $em       = $this->container->get('doctrine.orm.entity_manager');
        $rs       = $this->container->get('app.route');
        $entities = $this->container->get('app.entities');
        

        $routes = new RouteCollection();
        
        
        $customRouts = $em->getRepository('AppBundle:Core\Route')->findAll();
        

        foreach($customRouts as $routeItem)
        {
            // prepare a new route
            $path = $routeItem->getPath();
            
            if("" == $path)
            {
                continue;
            }

            $entityCode = $routeItem->getModulePage()->getEntityCode();

            $es = $entities->$entityCode;


            
            $modulePage = $routeItem->getModulePage();
            


            $defaults = array(
                '_controller' => $rs->getLogicalAction($es->getApplicationController(), $modulePage->getAction()),
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