<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Entity\Core\Module;
use AppBundle\Entity\Core\ModulePage;
use AppBundle\Entity\Content\News;
use AppBundle\Entity\Core\Route;
use AppBundle\Entity\Core\Navigation;
use AppBundle\Entity\Core\NavigationItem;
use AppBundle\Entity\Core\Scroll;
use AppBundle\Entity\Core\ScrollItem;
use AppBundle\Entity\Shop\Attribute;


class LoadShopData implements FixtureInterface, ContainerAwareInterface
{
    
    public function getOrder()
    {
       return 2; 
    }
    
    /**
     * @var ContainerInterface
     */
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
        $doctrine = $this->container->get('doctrine');        
        $entities = $this->container->get('app.entities');
                
    }
}


