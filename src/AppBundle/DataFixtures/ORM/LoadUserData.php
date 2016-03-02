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
use AppBundle\Entity\Content;
use AppBundle\Entity\Content\ContentPage;
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
        $contentNews = new Content;
        $contentNews->setEntityCode('news');
        $contentNews->setEntryStatus($scrollItemEnable);
        $contentNews->setRoutePath('/news');
        $contentNews->setTitle('News');
        
        $manager->persist($contentNews);
        
        
        
        // Page
        $contentPage = new Content;
        $contentPage->setEntityCode('page');
        $contentPage->setEntryStatus($scrollItemEnable);
        $contentPage->setRoutePath('/page');
        $contentPage->setTitle('Page');
        
        $manager->persist($contentPage);
        
        
        
        // Vendor
        $contentVendor = new Content;
        $contentVendor->setEntityCode('vendor');
        $contentVendor->setEntryStatus($scrollItemEnable);
        $contentVendor->setRoutePath('/vendor');
        $contentVendor->setTitle('Vendor');
        
        $manager->persist($contentVendor);
        
        
        $manager->flush();
        
        /**
         *  Страницы модуля PAGE
         */
        
        
        $contentPageIndexRoutePath = '/page';
        $contentPageIndexAction    = 'AppBundle:Frontend/Content:index';
        
        
        // Page - index
        
        $contentPageIndex = new ContentPage;
        $contentPageIndex->setEntryStatus($scrollItemEnable);
        $contentPageIndex->setContent($contentPage);
        $contentPageIndex->setTitle('Page index');
        $contentPageIndex->setMetaDescription('All our page');
        $contentPageIndex->setMetaKeywords('page, all page');
        $contentPageIndex->setAction($contentPageIndexAction);
        $contentPageIndex->setRoutePath($contentPageIndexRoutePath);
                
        $manager->persist($contentPageIndex);
        
        // Page - route
        
        $contentPageRoute = new ContentPage;
        $contentPageRoute->setEntryStatus($scrollItemEnable);
        $contentPageRoute->setContent($contentPage);
        $contentPageRoute->setTitle('Page route');
        $contentPageRoute->setMetaDescription('Page viewing');
        $contentPageRoute->setMetaKeywords('page, viewing');
        $contentPageRoute->setAction('AppBundle:Frontend/Content:route');
        $contentPageRoute->setRoutePath('__content__');
                
        $manager->persist($contentPageRoute);
        
        
        $manager->flush();
        
        
                
        
        /**
         *  Страницы модуля NEWS
         */
        
        
        $contentNewsIndexRoutePath = '/news';
        $contentNewsIndexAction    = 'AppBundle:Frontend/Content:index';        
        
        // News - index
        
        $contentNewsIndex = new ContentPage;
        $contentNewsIndex->setEntryStatus($scrollItemEnable);
        $contentNewsIndex->setContent($contentNews);
        $contentNewsIndex->setTitle('News index');
        $contentNewsIndex->setMetaDescription('All our news');
        $contentNewsIndex->setMetaKeywords('news, all news');
        $contentNewsIndex->setAction($contentNewsIndexAction);
        $contentNewsIndex->setRoutePath($contentNewsIndexRoutePath);
                
        $manager->persist($contentNewsIndex);
        
        // News - route
        
        $contentNewsRoute = new ContentPage;
        $contentNewsRoute->setEntryStatus($scrollItemEnable);
        $contentNewsRoute->setContent($contentNews);
        $contentNewsRoute->setTitle('News route');
        $contentNewsRoute->setMetaDescription('News viewing');
        $contentNewsRoute->setMetaKeywords('news, viewing');
        $contentNewsRoute->setAction('AppBundle:Frontend/Content:route');
        $contentNewsRoute->setRoutePath('__content__');
        //$contentNewsRoute->setRoute($contentNewsIndexRoute);
                
        $manager->persist($contentNewsRoute);
        
        $manager->flush();
                
        
        /**
         *  Навигация
         */
        
        // Top menu
        
        $topNavigation = new Navigation;
        $topNavigation->setEntryStatus($scrollItemEnable);
        $topNavigation->setTitle('Top menu');
        $topNavigation->setCode('top_menu');
        
        $manager->persist($topNavigation);
        
        // Top menu items
        $topNavigationItemNews = new NavigationItem;
        $topNavigationItemNews->setEntryStatus($scrollItemEnable);
        $topNavigationItemNews->setContent($contentNews);
        $topNavigationItemNews->setNavigation($topNavigation);
        $topNavigationItemNews->setRoute($contentNewsIndex->getRoute());
        $topNavigationItemNews->setPosition(1);
        $topNavigationItemNews->setTitle('News');
        $topNavigationItemNews->setContentPage($contentNewsIndex);
        
        //$manager->persist($topNavigationItemNews);
        
        
        $manager->flush();
        
    }
}


