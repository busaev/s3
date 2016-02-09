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
use AppBundle\Entity\ModulePage;
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
         *  Страницы модуля
         */
        
        
        $moduleNewsListRoutePath = '/news/list/';
        $moduleNewsListAction    = 'AppBundle:News:list';
        
        
        // News - list - route
        $moduleNewsListRoute = new Route;
        $moduleNewsListRoute->setContentType('module');
        $moduleNewsListRoute->setRoutePath($moduleNewsListRoutePath);
        $moduleNewsListRoute->setAction($moduleNewsListAction);
        
        $manager->persist($moduleNewsListRoute);
        
        
        // News - list
        
        $moduleNewsList = new ModulePage;
        $moduleNewsList->setEntryStatus($scrollItemEnable);
        $moduleNewsList->setModule($moduleNews);
        $moduleNewsList->setTitle('News list');
        $moduleNewsList->setMetaDescription('All our news');
        $moduleNewsList->setMetaKeywords('news, all news');
        $moduleNewsList->setRoutePath($moduleNewsListRoutePath);
        $moduleNewsList->setAction($moduleNewsListAction);
        $moduleNewsList->setRoute($moduleNewsListRoute);
                
        $manager->persist($moduleNewsList);
        
        
        $manager->flush();
                
        
        /**
         *  Навигация
         */
        
        // Top menu
        
        $topNavigation = new Navigation;
        $topNavigation->setEntryStatus($scrollItemEnable);
        $topNavigation->setTitle('Top menu');
        
        $manager->persist($topNavigation);
        
        
        // Top menu items
        $topNavigationItemNews = new NavigationItem;
        $topNavigationItemNews->setEntryStatus($scrollItemEnable);
        $topNavigationItemNews->setModule($moduleNews);
        $topNavigationItemNews->setNavigation($topNavigation);
        $topNavigationItemNews->setRoutePath($moduleNews->getRoutePath());
        $topNavigationItemNews->setPosition(1);
        $topNavigationItemNews->setTitle('News');
        $topNavigationItemNews->setModulePage($moduleNewsList);
        
        $manager->persist($topNavigationItemNews);
        
        
        $manager->flush();
        
    }
}


