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
use AppBundle\Entity\Shop\Attribute;


class LoadUserData implements FixtureInterface, ContainerAwareInterface
{
    public function getOrder()
    {
       return 1; 
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
         *  Справочник типов экшенов
         */
        
        $scrollActionTypes = new Scroll;
        $scrollActionTypes->setCode('action_types');
        $scrollActionTypes->setTitle('Варианты экшенов');
        $scrollActionTypes->setPosition('4');
        
        $manager->persist($scrollActionTypes);
        
        
        $manager->flush();
        
        
        
        
        /**
         *  Типы экшенов
         */
        
        // string
        $scrollItemActionIndex = new ScrollItem;
        $scrollItemActionIndex->setScroll($scrollActionTypes);
        $scrollItemActionIndex->setCode('index');
        $scrollItemActionIndex->setTitle('Индексная страница');
        $scrollItemActionIndex->setPosition(1);
        
        $manager->persist($scrollItemActionIndex);
        
        
        // checkbox
        $scrollItemActionShow = new ScrollItem;
        $scrollItemActionShow->setScroll($scrollActionTypes);
        $scrollItemActionShow->setCode('show');
        $scrollItemActionShow->setTitle('Обзор');
        $scrollItemActionShow->setPosition(2);
        
        $manager->persist($scrollItemActionShow);
        
        
        $manager->flush();
        
        
        
        
        /**
         *  Справочник для Вариантов типа данных аттрибута
         */
        
        $scrollProductTypes = new Scroll;
        $scrollProductTypes->setCode('shop_product_types');
        $scrollProductTypes->setTitle('Группы товаров');
        $scrollProductTypes->setPosition('100');
        
        $manager->persist($scrollProductTypes);
        
        
        $manager->flush();
        
        
        /**
         *  Типы записи
         */
        
        // clothes
        $scrollItemClothes = new ScrollItem;
        $scrollItemClothes->setScroll($scrollProductTypes);
        $scrollItemClothes->setCode('clothes');
        $scrollItemClothes->setTitle('Одежда');
        $scrollItemClothes->setPosition(1);
        
        $manager->persist($scrollItemClothes);
        
        
        // toys
        $scrollItemToys = new ScrollItem;
        $scrollItemToys->setScroll($scrollProductTypes);
        $scrollItemToys->setCode('toys');
        $scrollItemToys->setTitle('Игрушки');
        $scrollItemToys->setPosition(2);
        
        $manager->persist($scrollItemToys);
        
        
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
        $contentNews->setTitle('Новости');
        
        $manager->persist($contentNews);
        
        
        
        // Page
        $contentPage = new Content;
        $contentPage->setEntityCode('page');
        $contentPage->setEntryStatus($scrollItemEnable);
        $contentPage->setRoutePath('/page');
        $contentPage->setTitle('Страницы');
        
        $manager->persist($contentPage);
        
        
        
        // Vendor
        $contentVendor = new Content;
        $contentVendor->setEntityCode('vendor');
        $contentVendor->setEntryStatus($scrollItemEnable);
        $contentVendor->setRoutePath('/vendor');
        $contentVendor->setTitle('Производители');
        
        $manager->persist($contentVendor);
        
        
                
        // Index
        $contentIndex = new Content;
        $contentIndex->setEntityCode('index');
        $contentIndex->setEntryStatus($scrollItemEnable);
        $contentIndex->setRoutePath('/');
        $contentIndex->setTitle('Главная страница');
        
        $manager->persist($contentIndex);
        
        
        $manager->flush();
        
        
        
        /**
         *  Страницы модуля PAGE
         */
        
        
        
        // Page - index
        
        $contentPageIndex = new ContentPage;
        $contentPageIndex->setEntryStatus($scrollItemEnable);
        $contentPageIndex->setContent($contentPage);
        $contentPageIndex->setTitle('Список страниц');
        $contentPageIndex->setMetaDescription('All our page');
        $contentPageIndex->setMetaKeywords('page, all page');
        $contentPageIndex->setRoutePath('/page');
        $contentPageIndex->setActionType($scrollItemActionIndex);
                
        $manager->persist($contentPageIndex);
        
        // Page - route
        
        $contentPageRoute = new ContentPage;
        $contentPageRoute->setEntryStatus($scrollItemEnable);
        $contentPageRoute->setContent($contentPage);
        $contentPageRoute->setTitle('Обзор страницы');
        $contentPageRoute->setMetaDescription('Page viewing');
        $contentPageRoute->setMetaKeywords('page, viewing');
        $contentPageRoute->setRoutePath('');
        $contentPageRoute->setActionType($scrollItemActionShow);
                
        $manager->persist($contentPageRoute);
        
        
        $manager->flush();
        
        
                
        
        /**
         *  Страницы модуля NEWS
         */
        
           
        
        // News - index
        
        $contentNewsIndex = new ContentPage;
        $contentNewsIndex->setEntryStatus($scrollItemEnable);
        $contentNewsIndex->setContent($contentNews);
        $contentNewsIndex->setTitle('Список новостей');
        $contentNewsIndex->setMetaDescription('All our news');
        $contentNewsIndex->setMetaKeywords('news, all news');
        $contentNewsIndex->setActionType($scrollItemActionIndex);
        $contentNewsIndex->setRoutePath('/news');
                
        $manager->persist($contentNewsIndex);
        
        // News - route
        
        $contentNewsRoute = new ContentPage;
        $contentNewsRoute->setEntryStatus($scrollItemEnable);
        $contentNewsRoute->setContent($contentNews);
        $contentNewsRoute->setTitle('Обзор новости');
        $contentNewsRoute->setMetaDescription('News viewing');
        $contentNewsRoute->setMetaKeywords('news, viewing');
        $contentNewsRoute->setRoutePath('');
        $contentNewsRoute->setActionType($scrollItemActionShow);
                
        $manager->persist($contentNewsRoute);
        
        $manager->flush();
        
        
                
        
        /**
         *  Страницы модуля Index
         */
        
        
        
        // Index - index
        
        $contentIndexIndex = new ContentPage;
        $contentIndexIndex->setEntryStatus($scrollItemEnable);
        $contentIndexIndex->setContent($contentIndex);
        $contentIndexIndex->setTitle('Индекс');
        $contentIndexIndex->setMetaDescription('Index page');
        $contentIndexIndex->setMetaKeywords('Index page');
        $contentIndexIndex->setActionType($scrollItemActionIndex);
        $contentIndexIndex->setRoutePath('/');
                
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
        
        
        
        /**
         *  Аттрибуты товаров
         */
        $entityScroll = $entities->scroll_item;
        
        $status = $doctrine
                ->getRepository($entityScroll->getLogicalName())
                ->findByScrollItemCodeAndScrollCode('enable', 'entry_status');        
            
        $dataTypes = $doctrine
                ->getRepository($entityScroll->getLogicalName())
                ->findByScrollItemCodeAndScrollCode('numeric', 'data_types');
        
        $viewTypes = $doctrine
                ->getRepository($entityScroll->getLogicalName())
                ->findByScrollItemCodeAndScrollCode('select', 'view_types');
        
        $productTypes = $doctrine
                ->getRepository($entityScroll->getLogicalName())
                ->findByScrollItemCodeAndScrollCode('clothes', 'shop_product_types');
        
        $attributeSize = new Attribute;
        $attributeSize->setTitle('Размер');
        $attributeSize->setDescription('Размеры одежды');
        $attributeSize->setInFilters(true);
        $attributeSize->setInPreview(true);
        $attributeSize->setEntryStatus($status);
        $attributeSize->setDataType($dataTypes);
        $attributeSize->setViewType($viewTypes);
        $attributeSize->setProductType($productTypes);
        
        $manager->persist($attributeSize);
        
        
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
                $entity->setContent(str_replace('\\r\\n', '', $data[4]));
                $entity->setShortContent(str_replace('\\r\\n', '', $data[3]));
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
        $r = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м', 'н','о','п','р','с','т','у','ф','х','ц','ч', 'ш', 'щ', 'ъ','ы','ь','э', 'ю', 'я',' ');
        $l = array('a','b','v','g','d','e','e','g','z','i','y','k','l','m','n', 'o','p','r','s','t','u','f','h','c','ch','sh','sh','', 'y','y', 'e','yu','ya','-');
        $s = str_replace( $r, $l, mb_strtolower($s) );
        $s = preg_replace("/[^\w\-]/","$1",$s);
        $s = preg_replace("/\-{2,}/",'-',$s);
        return trim($s,'-');
    }
}


