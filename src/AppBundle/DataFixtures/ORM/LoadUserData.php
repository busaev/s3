<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

use AppBundle\Entity\Scroll;
use AppBundle\Entity\ScrollItem;
use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Entity\Module;
use AppBundle\Entity\Content\ModulePage;
use AppBundle\Entity\Route;
use AppBundle\Entity\Navigation;
use AppBundle\Entity\NavigationItem;


class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    
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
        /**
         *  Справочник для статусов записи
         */
        
        $scroll = new Scroll;
        $scroll->setCode('entry_status');
        $scroll->setTitle('Entry status');
        $scroll->setPosition('1');
        
        $manager->persist($scroll);
        
        
        $manager->flush();
        
        
        /**
         *  Cтатусы записи
         */
        
        // enabled
        $scrollItemEnable = new ScrollItem;
        $scrollItemEnable->setScroll($scroll);
        $scrollItemEnable->setCode('enable');
        $scrollItemEnable->setTitle('Enabled');
        $scrollItemEnable->setPosition(1);
        
        $manager->persist($scrollItemEnable);
        
        
        // disable
        $scrollItemDisable = new ScrollItem;
        $scrollItemDisable->setScroll($scroll);
        $scrollItemDisable->setCode('disable');
        $scrollItemDisable->setTitle('Disabled');
        $scrollItemDisable->setPosition(2);
        
        $manager->persist($scrollItemDisable);
        
        
        // delete
        $scrollItemDeleted = new ScrollItem;
        $scrollItemDeleted->setScroll($scroll);
        $scrollItemDeleted->setCode('delete');
        $scrollItemDeleted->setTitle('Deleted');
        $scrollItemDeleted->setPosition(3);
        
        $manager->persist($scrollItemDeleted);
        
        
        $manager->flush();
        
        
        /**
         *  Роли пользователя
         */
        
        // super admin
        $roleSuperAdmin = new Role;
        $roleSuperAdmin->setName('ROLE_SUPER_ADMIN'); 
        
        $manager->persist($roleSuperAdmin);
        
        // admin
        $roleAdmin = new Role;
        $roleAdmin->setName('ROLE_ADMIN'); 
        
        $manager->persist($roleAdmin);
        
        // manager
        $roleManager = new Role;
        $roleManager->setName('ROLE_MANAGER'); 
        
        $manager->persist($roleManager); 
        
        
        // moderator
        $roleModerator = new Role;
        $roleModerator->setName('ROLE_MODERATOR');  
        
        $manager->persist($roleModerator);
        
        
        // client
        $roleClient = new Role;
        $roleClient->setName('ROLE_CLIENT');  
        
        $manager->persist($roleClient);
        
        
        // manager
        $roleUser = new Role;
        $roleUser->setName('ROLE_USER');  
        
        $manager->persist($roleUser);
      
        
        $manager->flush();
        
        
        /**
         *  Пользователь
         */
        $encoder = $this->container->get('security.password_encoder');
        
        // wy
        $userWY = new User;
        $userWY->setPassword($encoder->encodePassword($userWY, 'q1w2e3'));
        $userWY->setUsername('wy');
        $userWY->setEntryStatus($scrollItemEnable);
        $userWY->setEmail('wy@wy.ru');
        $userWY->addUserRole($roleAdmin);
        
        $manager->persist($userWY);
        
        
        $manager->flush();
        
        
        /**
         *  Модуль
         */
        
        // News
        $moduleNews = new Module;
        $moduleNews->setEntity('news');
        $moduleNews->setEntryStatus($scrollItemEnable);
        $moduleNews->setRoutePath('/news/');
        $moduleNews->setTitle('News');
        
        $manager->persist($moduleNews);
        
        
        
        // Page
        $modulePage = new Module;
        $modulePage->setEntity('page');
        $modulePage->setEntryStatus($scrollItemEnable);
        $modulePage->setRoutePath('/page/');
        $modulePage->setTitle('Page');
        
        $manager->persist($modulePage);
        
        
        
        // Vendor
        $moduleVendor = new Module;
        $moduleVendor->setEntity('vendor');
        $moduleVendor->setEntryStatus($scrollItemEnable);
        $moduleVendor->setRoutePath('/vendor/');
        $moduleVendor->setTitle('Vendor');
        
        $manager->persist($moduleVendor);
        
        
        $manager->flush();
        
        /**
         *  Страницы модуля PAGE
         */
        
        
        $modulePageIndexRoutePath = '/page/index/';
        $modulePageIndexAction    = 'AppBundle:Page:index';
        
        
        // Route - page - index
        $modulePageIndexRoute = new Route;
        $modulePageIndexRoute->setContentType('module');        
        $modulePageIndexRoute->setEntityCode('page');
        $modulePageIndexRoute->setRoutePath($modulePageIndexRoutePath);
        $modulePageIndexRoute->setAction($modulePageIndexAction);
        
        $manager->persist($modulePageIndexRoute);
        
        
        // Page - index
        
        $modulePageIndex = new ModulePage;
        $modulePageIndex->setEntryStatus($scrollItemEnable);
        $modulePageIndex->setModule($modulePage);
        $modulePageIndex->setTitle('Page index');
        $modulePageIndex->setMetaDescription('All our page');
        $modulePageIndex->setMetaKeywords('page, all page');
        $modulePageIndex->setAction($modulePageIndexAction);
        $modulePageIndex->setRoutePath($modulePageIndexRoutePath);
        $modulePageIndex->setRoute($modulePageIndexRoute);
                
        $manager->persist($modulePageIndex);
        
        // Page - route
        
        $modulePageRoute = new ModulePage;
        $modulePageRoute->setEntryStatus($scrollItemEnable);
        $modulePageRoute->setModule($modulePage);
        $modulePageRoute->setTitle('Page route');
        $modulePageRoute->setMetaDescription('Page viewing');
        $modulePageRoute->setMetaKeywords('page, viewing');
        $modulePageRoute->setAction('AppBundle:Page:route');
        $modulePageRoute->setRoutePath('__content__');
        //$modulePageRoute->setRoute($modulePageIndexRoute);
                
        $manager->persist($modulePageRoute);
        
        
        $manager->flush();
        
        
                
        
        /**
         *  Страницы модуля NEWS
         */
        
        
        $moduleNewsIndexRoutePath = '/news/index/';
        $moduleNewsIndexAction    = 'AppBundle:News:index';
        
        
        // Route - news - index
        $moduleNewsIndexRoute = new Route;
        $moduleNewsIndexRoute->setContentType('module');
        $moduleNewsIndexRoute->setEntityCode('news');
        $moduleNewsIndexRoute->setRoutePath($moduleNewsIndexRoutePath);
        $moduleNewsIndexRoute->setAction($moduleNewsIndexAction);
        
        $manager->persist($moduleNewsIndexRoute);
        
        
        // News - index
        
        $moduleNewsIndex = new ModulePage;
        $moduleNewsIndex->setEntryStatus($scrollItemEnable);
        $moduleNewsIndex->setModule($moduleNews);
        $moduleNewsIndex->setTitle('News index');
        $moduleNewsIndex->setMetaDescription('All our news');
        $moduleNewsIndex->setMetaKeywords('news, all news');
        $moduleNewsIndex->setAction($moduleNewsIndexAction);
        $moduleNewsIndex->setRoutePath($moduleNewsIndexRoutePath);
        $moduleNewsIndex->setRoute($moduleNewsIndexRoute);
                
        $manager->persist($moduleNewsIndex);
        
        // News - route
        
        $moduleNewsRoute = new ModulePage;
        $moduleNewsRoute->setEntryStatus($scrollItemEnable);
        $moduleNewsRoute->setModule($moduleNews);
        $moduleNewsRoute->setTitle('News route');
        $moduleNewsRoute->setMetaDescription('News viewing');
        $moduleNewsRoute->setMetaKeywords('news, viewing');
        $moduleNewsRoute->setAction('AppBundle:News:route');
        $moduleNewsRoute->setRoutePath('__content__');
        //$moduleNewsRoute->setRoute($moduleNewsIndexRoute);
                
        $manager->persist($moduleNewsRoute);
        
        
        $manager->flush();
                
        
        /**
         *  Навигация
         */
        
        // Top menu
        
        $topNavigation = new Navigation;
        $topNavigation->setEntryStatus($scrollItemEnable);
        $topNavigation->setTitle('Top menu');
        
        $manager->persist($topNavigation);
        
//        \Symfony\Component\VarDumper\VarDumper::dump($moduleNews);
//        \Symfony\Component\VarDumper\VarDumper::dump($moduleNewsIndexRoute);
//        \Symfony\Component\VarDumper\VarDumper::dump($moduleNewsIndex);
//        die();
        
        
        // Top menu items
        $topNavigationItemNews = new NavigationItem;
        $topNavigationItemNews->setEntryStatus($scrollItemEnable);
        $topNavigationItemNews->setModule($moduleNews);
        $topNavigationItemNews->setNavigation($topNavigation);
        $topNavigationItemNews->setRoute($moduleNewsIndexRoute);
        $topNavigationItemNews->setPosition(1);
        $topNavigationItemNews->setTitle('News');
        $topNavigationItemNews->setModulePage($moduleNewsIndex);
        
        //$manager->persist($topNavigationItemNews);
        
        
        $manager->flush();
        
    }
}


