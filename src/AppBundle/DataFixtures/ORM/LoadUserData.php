<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Content\News;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Entity\Core\Content;
use AppBundle\Entity\Core\ContentPage;
use AppBundle\Entity\Core\Route;
use AppBundle\Entity\Core\Navigation;
use AppBundle\Entity\Core\NavigationItem;
use AppBundle\Entity\Core\Scroll;
use AppBundle\Entity\Core\ScrollItem;


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
         *  Справочник для Вариантов типа данных аттрибута
         */
        
        $scrollAttributeDataTypes = new Scroll;
        $scrollAttributeDataTypes->setCode('data_types');
        $scrollAttributeDataTypes->setTitle('Варианты данных');
        $scrollAttributeDataTypes->setPosition('2');
        
        $manager->persist($scrollAttributeDataTypes);
        
        
        $manager->flush();
        
        
        /**
         *  Типы записи
         */
        
        // string
        $scrollItemDataString = new ScrollItem;
        $scrollItemDataString->setScroll($scrollAttributeDataTypes);
        $scrollItemDataString->setCode('string');
        $scrollItemDataString->setTitle('Строка');
        $scrollItemDataString->setPosition(1);
        
        $manager->persist($scrollItemDataString);
        
        
        // numeric
        $scrollItemDataNumeric = new ScrollItem;
        $scrollItemDataNumeric->setScroll($scrollAttributeDataTypes);
        $scrollItemDataNumeric->setCode('numeric');
        $scrollItemDataNumeric->setTitle('Число');
        $scrollItemDataNumeric->setPosition(2);
        
        $manager->persist($scrollItemDataNumeric);
        
        
        // date
        $scrollItemDataDate = new ScrollItem;
        $scrollItemDataDate->setScroll($scrollAttributeDataTypes);
        $scrollItemDataDate->setCode('date');
        $scrollItemDataDate->setTitle('Дата');
        $scrollItemDataDate->setPosition(3);
        
        $manager->persist($scrollItemDataDate);
        
        
        $manager->flush();
        
        
        
        /**
         *  Справочник для Вариантов отображения аттрибута
         */
        
        $scrollAttributeViewTypes = new Scroll;
        $scrollAttributeViewTypes->setCode('view_types');
        $scrollAttributeViewTypes->setTitle('Варианты отображения');
        $scrollAttributeViewTypes->setPosition('1');
        
        $manager->persist($scrollAttributeViewTypes);
        
        
        $manager->flush();
        
        
        /**
         *  Cтатусы записи
         */
        
        // string
        $scrollItemString = new ScrollItem;
        $scrollItemString->setScroll($scrollAttributeViewTypes);
        $scrollItemString->setCode('string');
        $scrollItemString->setTitle('Строка');
        $scrollItemString->setPosition(1);
        
        $manager->persist($scrollItemString);
        
        
        // checkbox
        $scrollItemCheckbox = new ScrollItem;
        $scrollItemCheckbox->setScroll($scrollAttributeViewTypes);
        $scrollItemCheckbox->setCode('select');
        $scrollItemCheckbox->setTitle('Выбор');
        $scrollItemCheckbox->setPosition(2);
        
        $manager->persist($scrollItemCheckbox);
        
        
        // select
        $scrollItemSelectd = new ScrollItem;
        $scrollItemSelectd->setScroll($scrollAttributeViewTypes);
        $scrollItemSelectd->setCode('checkbox');
        $scrollItemSelectd->setTitle('Множественный выбор');
        $scrollItemSelectd->setPosition(3);
        
        $manager->persist($scrollItemSelectd);
        
        
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
        
        
                
        // Index
        $contentIndex = new Content;
        $contentIndex->setEntityCode('index');
        $contentIndex->setEntryStatus($scrollItemEnable);
        $contentIndex->setRoutePath('/');
        $contentIndex->setTitle('Index');
        
        $manager->persist($contentIndex);
        
        
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
         *  Страницы модуля Index
         */
        
        
        $contentIndexIndexRoutePath = '/';
        $contentIndexIndexAction    = 'AppBundle:Frontend/Index:index';        
        
        // Index - index
        
        $contentIndexIndex = new ContentPage;
        $contentIndexIndex->setEntryStatus($scrollItemEnable);
        $contentIndexIndex->setContent($contentIndex);
        $contentIndexIndex->setTitle('Index index');
        $contentIndexIndex->setMetaDescription('Index page');
        $contentIndexIndex->setMetaKeywords('Index page');
        $contentIndexIndex->setRoutePath($contentIndexIndexRoutePath);
        $contentIndexIndex->setAction($contentIndexIndexAction);
                
        $manager->persist($contentIndexIndex);
        
        
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

        //авторизуемся
        $this->container->get('security.token_storage')->setToken(
            new UsernamePasswordToken($userWY, null, 'secured_area', $userWY->getRoles())
        );


        //IMPORT
        $this->loadNewsCSV($manager, $scrollItemEnable);
        
    }

    public function loadNewsCSV(ObjectManager $manager, $enables)
    {
        $data = getcwd() . '/src/AppBundle/DataFixtures/ORM/data/news.csv';
        if (($handle = fopen($data, "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
            {
                $entity = new News();
                $entity->setContent($data[4]);
                $entity->setShortContent($data[3]);
                $entity->setTitle($data[2]);
                $entity->setMetaDescription($data[3]);
                $entity->setMetaTitle($data[2]);
                $entity->setEntryStatus($enables);
                $entity->setRoutePath('/news/' . $this->slugify($data[2]));

                $manager->persist($entity);

                $manager->flush();


                
            }
            fclose($handle);
        }
    }

    /**
     * Продублирую, для быстроты
     * в остальных случиях брать из Utils
     *
     * @param $s string
     * @return string
     */
    function slugify( $s )
    {
        $s = strtolower($s);

        $r = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м', 'н','о','п','р','с','т','у','ф','х','ц','ч', 'ш', 'щ', 'ъ','ы','ь','э', 'ю', 'я',' ');
        $l = array('a','b','v','g','d','e','e','g','z','i','y','k','l','m','n', 'o','p','r','s','t','u','f','h','c','ch','sh','sh','', 'y','y', 'e','yu','ya','-');
        $s = str_replace( $r, $l, strtolower($s) );
        $s = preg_replace("/[^\w\-]/","$1",$s);
        $s = preg_replace("/\-{2,}/",'-',$s);
        return trim($s,'-');
    }
}


