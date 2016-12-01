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
use AppBundle\Entity\Core\Route;
use AppBundle\Entity\Content\News;
use AppBundle\Entity\Core\Navigation;
use AppBundle\Entity\Core\NavigationItem;
use AppBundle\Entity\Core\Scroll;
use AppBundle\Entity\Core\ScrollItem;
use AppBundle\Entity\Shop\Attribute;
use AppBundle\Entity\Shop\Brend;
use AppBundle\Entity\Core\Media;
use AppBundle\Entity\Shop\Category;


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
        
        
        // image
        $scrollItemImage = new ScrollItem;
        $scrollItemImage->setScroll($scrollAttributeDataTypes);
        $scrollItemImage->setCode('image');
        $scrollItemImage->setTitle('Картинка');
        $scrollItemImage->setPosition(4);
        
        $manager->persist($scrollItemImage);
        
        
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
        
        
        // user
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
        $userWY->setRealName('Web-You.Ru');
        $userWY->addUserRole($roleAdmin);
        
        $manager->persist($userWY);
        
        
        $manager->flush();
        

        /**
         *  Модуль
         */
        
        // News
        $moduleNews = new Module;
        $moduleNews->setEntityCode('news');
        $moduleNews->setEntryStatus($scrollItemEnable);
        $moduleNews->setRoutePath('/news');
        $moduleNews->setTitle('Новости');
        
        $manager->persist($moduleNews);
        
        
        
        // Page
        $modulePage = new Module;
        $modulePage->setEntityCode('page');
        $modulePage->setEntryStatus($scrollItemEnable);
        $modulePage->setRoutePath('/pages');
        $modulePage->setTitle('Страницы');
        
        $manager->persist($modulePage);
        
        
        
        // Brend
        $moduleBrend = new Module;
        $moduleBrend->setEntityCode('brend');
        $moduleBrend->setEntryStatus($scrollItemEnable);
        $moduleBrend->setRoutePath('/brends');
        $moduleBrend->setTitle('Бренды');
        
        $manager->persist($moduleBrend);
        
        
                
        // Index
        $moduleIndex = new Module;
        $moduleIndex->setEntityCode('index');
        $moduleIndex->setEntryStatus($scrollItemEnable);
        $moduleIndex->setRoutePath('/');
        $moduleIndex->setTitle('Главная страница');
        
        $manager->persist($moduleIndex);
        
        
                
        // Catalog
        $moduleCatalog = new Module;
        $moduleCatalog->setEntityCode('catalog');
        $moduleCatalog->setEntryStatus($scrollItemEnable);
        $moduleCatalog->setRoutePath('/catalog');
        $moduleCatalog->setTitle('Каталог');
        
        $manager->persist($moduleCatalog);
        
        
        
                
        // Category
        $moduleCategory = new Module;
        $moduleCategory->setEntityCode('category');
        $moduleCategory->setEntryStatus($scrollItemEnable);
        $moduleCategory->setRoutePath('/category');
        $moduleCategory->setTitle('Категории');
        
        $manager->persist($moduleCategory);
        
        
                
        // User
        $moduleUser = new Module;
        $moduleUser->setEntityCode('user');
        $moduleUser->setEntryStatus($scrollItemEnable);
        $moduleUser->setRoutePath('/user');
        $moduleUser->setTitle('Пользователи');
        
        $manager->persist($moduleUser);
        
        
        $manager->flush();
        
        
        
        /**
         *  Страницы модуля PAGE
         */
        
        
        
        // Page - index
        
        $modulePageIndex = new ModulePage;
        $modulePageIndex->setEntryStatus($scrollItemEnable);
        $modulePageIndex->setModule($modulePage);
        $modulePageIndex->setTitle('Список страниц');
        $modulePageIndex->setMetaDescription('All our page');
        $modulePageIndex->setMetaKeywords('page, all page');
        $modulePageIndex->setRoutePath('/page');
        $modulePageIndex->setAction('index');
                
        $manager->persist($modulePageIndex);
        
        // Page - route
        
        $modulePageRoute = new ModulePage;
        $modulePageRoute->setEntryStatus($scrollItemEnable);
        $modulePageRoute->setModule($modulePage);
        $modulePageRoute->setTitle('Обзор страницы');
        $modulePageRoute->setMetaDescription('Page viewing');
        $modulePageRoute->setMetaKeywords('page, viewing');
        //$modulePageRoute->setRoutePath('/page/{slug}');
        $modulePageRoute->setAction('route');
        
        $manager->persist($modulePageRoute);
        
        
        $manager->flush();
        
        
                
        
        /**
         *  Страницы модуля NEWS
         */
        
           
        
        // News - index
        
        $moduleNewsIndex = new ModulePage;
        $moduleNewsIndex->setEntryStatus($scrollItemEnable);
        $moduleNewsIndex->setModule($moduleNews);
        $moduleNewsIndex->setTitle('Список новостей');
        $moduleNewsIndex->setMetaDescription('All our news');
        $moduleNewsIndex->setMetaKeywords('news, all news');
        $moduleNewsIndex->setRoutePath('/news');
        $moduleNewsIndex->setAction('index');
                
        $manager->persist($moduleNewsIndex);
        
        // News - route
        
        $moduleNewsRoute = new ModulePage;
        $moduleNewsRoute->setEntryStatus($scrollItemEnable);
        $moduleNewsRoute->setModule($moduleNews);
        $moduleNewsRoute->setTitle('Обзор новости');
        $moduleNewsRoute->setMetaDescription('News viewing');
        $moduleNewsRoute->setMetaKeywords('news, viewing');
        //$moduleNewsRoute->setRoutePath('/news/{slug}');
        $moduleNewsRoute->setAction('route');
                
        $manager->persist($moduleNewsRoute);
        
        $manager->flush();
        
        
                
        
        /**
         *  Страницы модуля Index
         */
        
        
        
        // Index - index
        
        $moduleIndexIndex = new ModulePage;
        $moduleIndexIndex->setEntryStatus($scrollItemEnable);
        $moduleIndexIndex->setModule($moduleIndex);
        $moduleIndexIndex->setTitle('Индекс');
        $moduleIndexIndex->setMetaDescription('Index page');
        $moduleIndexIndex->setMetaKeywords('Index page');
        $moduleIndexIndex->setRoutePath('/');
        $moduleIndexIndex->setAction('index');
                
        $manager->persist($moduleIndexIndex);
        
        
        $manager->flush();
        
        
        
        /**
         *  Страницы модуля Catalog
         */
        
           
        
        // catalog - index
        
        $moduleCatalogIndex = new ModulePage;
        $moduleCatalogIndex->setEntryStatus($scrollItemEnable);
        $moduleCatalogIndex->setModule($moduleCatalog);
        $moduleCatalogIndex->setTitle('Каталог');
        $moduleCatalogIndex->setMetaDescription('Каталог товаров');
        $moduleCatalogIndex->setMetaKeywords('Каталог, товары');
        $moduleCatalogIndex->setRoutePath('/module/catalog');
        $moduleCatalogIndex->setAction('index');
                
        $manager->persist($moduleCatalogIndex);
        
        
        // category - index
        
        $moduleCategoryIndex = new ModulePage;
        $moduleCategoryIndex->setEntryStatus($scrollItemEnable);
        $moduleCategoryIndex->setModule($moduleCategory);
        $moduleCategoryIndex->setTitle('Категории');
        $moduleCategoryIndex->setMetaDescription('Категории товаров');
        $moduleCategoryIndex->setMetaKeywords('Категории, товары');
        $moduleCategoryIndex->setRoutePath('/catalog');
        $moduleCategoryIndex->setAction('index');
                
        $manager->persist($moduleCategoryIndex);
        
        
        // category - route
        
        $moduleCategoryRoute = new ModulePage;
        $moduleCategoryRoute->setEntryStatus($scrollItemEnable);
        $moduleCategoryRoute->setModule($moduleCategory);
        $moduleCategoryRoute->setTitle('Обзор категории');
        $moduleCategoryRoute->setMetaDescription('Обзор категории');
        $moduleCategoryRoute->setMetaKeywords('Обзор, категории');
        $moduleCategoryRoute->setAction('route');
                
        $manager->persist($moduleCategoryRoute);
        
        $manager->flush();
        
        
        
        
        
        /**
         *  Страницы модуля Brend
         */
        
           
        
        // brends - index
        
        $moduleBrendsIndex = new ModulePage;
        $moduleBrendsIndex->setEntryStatus($scrollItemEnable);
        $moduleBrendsIndex->setModule($moduleBrend);
        $moduleBrendsIndex->setTitle('Бренды');
        $moduleBrendsIndex->setMetaDescription('Список брендов');
        $moduleBrendsIndex->setMetaKeywords('бренды');
        $moduleBrendsIndex->setRoutePath('/brends');
        $moduleBrendsIndex->setAction('index');
                
        $manager->persist($moduleBrendsIndex);
        
        // brends - route
        
        $moduleBrendsRoute = new ModulePage;
        $moduleBrendsRoute->setEntryStatus($scrollItemEnable);
        $moduleBrendsRoute->setModule($moduleBrend);
        $moduleBrendsRoute->setTitle('Обзор бренда');
        $moduleBrendsRoute->setMetaDescription('Обзор бренда');
        $moduleBrendsRoute->setMetaKeywords('Обзор, бренд');
        //$moduleBrendsRoute->setRoutePath('/brend/{slug}');
        $moduleBrendsRoute->setAction('route');
                
        $manager->persist($moduleBrendsRoute);
        
        $manager->flush();
        
        
        
        
        
        /**
         *  Страницы модуля User
         */
        
           
        
        // user - auth        
        $moduleUserLogin = new ModulePage;
        $moduleUserLogin->setEntryStatus($scrollItemEnable);
        $moduleUserLogin->setModule($moduleUser);
        $moduleUserLogin->setTitle('Авторизация');
        $moduleUserLogin->setMetaDescription('Авторизация на сайте');
        $moduleUserLogin->setMetaKeywords('Авторизация на сайте');
        $moduleUserLogin->setRoutePath('/user/login');
        $moduleUserLogin->setAction('login');

        $manager->persist($moduleUserLogin);

        // user - logout
        $moduleUserLogout = new ModulePage;
        $moduleUserLogout->setEntryStatus($scrollItemEnable);
        $moduleUserLogout->setModule($moduleUser);
        $moduleUserLogout->setTitle('Выход');
        $moduleUserLogout->setMetaDescription('Выход');
        $moduleUserLogout->setMetaKeywords('Выход');
        $moduleUserLogout->setRoutePath('/user/logout');
        $moduleUserLogout->setAction('logout');
                
        $manager->persist($moduleUserLogout);
        
        
        // user - registration        
        $moduleUserRegistration = new ModulePage;
        $moduleUserRegistration->setEntryStatus($scrollItemEnable);
        $moduleUserRegistration->setModule($moduleUser);
        $moduleUserRegistration->setTitle('Регистрация');
        $moduleUserRegistration->setMetaDescription('Регистрация на сайте');
        $moduleUserRegistration->setMetaKeywords('Регистрация на сайте');
        $moduleUserRegistration->setRoutePath('/user/registration');
        $moduleUserRegistration->setAction('registration');
                
        $manager->persist($moduleUserRegistration);
        
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
        
        $manager->flush();
        
        
        /**
         * Элементы навигации
         */
        
        // Top menu items
        $topNavigationItemNews = new NavigationItem;
        $topNavigationItemNews->setEntryStatus($scrollItemEnable);
        $topNavigationItemNews->setModule($moduleNews);
        $topNavigationItemNews->setNavigation($topNavigation);
        $topNavigationItemNews->setRoute($moduleNewsIndex->getRoute());
        $topNavigationItemNews->setPosition(1);
        $topNavigationItemNews->setTitle('Новости');
        $topNavigationItemNews->setModulePage($moduleNewsIndex);
        
        $manager->persist($topNavigationItemNews);
        
        
        $userRegistrationLink = new NavigationItem;
        $userRegistrationLink->setEntryStatus($scrollItemEnable);
        $userRegistrationLink->setNavigation($topNavigation);
        $userRegistrationLink->setModulePage($moduleUserRegistration);
        $userRegistrationLink->setModule($moduleUser);
        $userRegistrationLink->setTitle('Регистрация');
        $userRegistrationLink->setRoute($moduleUserRegistration->getRoute());
        $userRegistrationLink->setPosition(2);
        
        $manager->persist($userRegistrationLink);




        // login
        $userLoginLink = new NavigationItem;
        $userLoginLink->setEntryStatus($scrollItemEnable);
        $userLoginLink->setNavigation($topNavigation);
        $userLoginLink->setModulePage($moduleUserLogin);
        $userLoginLink->setModule($moduleUser);
        $userLoginLink->setTitle('Вход');
        $userLoginLink->setRoute($moduleUserLogin->getRoute());
        $userLoginLink->setPosition(3);

        $manager->persist($userLoginLink);



        // logout
        $userLogoutLink = new NavigationItem;
        $userLogoutLink->setEntryStatus($scrollItemEnable);
        $userLogoutLink->setNavigation($topNavigation);
        $userLogoutLink->setModulePage($moduleUserLogout);
        $userLogoutLink->setModule($moduleUser);
        $userLogoutLink->setTitle('Выход');
        $userLogoutLink->setRoute($moduleUserLogout->getRoute());
        $userLogoutLink->setPosition(4);

        $manager->persist($userLogoutLink);


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
        $this->loadBrendsCSV($manager, $scrollItemEnable);
        $this->loadCategories($manager, $scrollItemEnable, $moduleCategoryRoute);
        
    }
    
    public function loadCategories(ObjectManager $manager, $enables, $moduleCategoryRoute)
    {
        $girlsCategory = new Category;        
        $girlsCategory->setTitle('Одежда для девочек');
        $girlsCategory->setRoutePath('/category/girls');
        $girlsCategory->setEntryStatus($enables);
        $girlsCategory->setMetaDescription('Куртки, ветровки');
        $girlsCategory->setMetaKeywords('Куртки, ветровки');
        $girlsCategory->setMetaTitle('Куртки, ветровки');
        $girlsCategory->setContent('Куртки, ветровки');        
        $manager->persist($girlsCategory);
        
        $boysCategory = new Category;
        $boysCategory->setTitle('Одежда для мальчиков');
        $boysCategory->setRoutePath('/category/boys');
        $boysCategory->setEntryStatus($enables);
        $boysCategory->setMetaDescription('Куртки, ветровки');
        $boysCategory->setMetaKeywords('Куртки, ветровки');
        $boysCategory->setMetaTitle('Куртки, ветровки');
        $boysCategory->setContent('Куртки, ветровки');        
        $manager->persist($boysCategory);
        
        
        $girlsCategory1 = new Category;        
        $girlsCategory1->setTitle('Куртки, ветровки');
        $girlsCategory1->setRoutePath('/category/girls-jackets');
        $girlsCategory1->setEntryStatus($enables);
        $girlsCategory1->setMetaDescription('Куртки, ветровки');
        $girlsCategory1->setMetaKeywords('Куртки, ветровки');
        $girlsCategory1->setMetaTitle('Куртки, ветровки');
        $girlsCategory1->setContent('Куртки, ветровки');
        $girlsCategory1->setParentCategory($girlsCategory);
        $manager->persist($girlsCategory1);
        
        
        $girlsCategory2 = new Category;        
        $girlsCategory2->setTitle('Праздничные платья');
        $girlsCategory2->setRoutePath('/category/girls-holiday-dresses');
        $girlsCategory2->setEntryStatus($enables);
        $girlsCategory2->setMetaDescription('Праздничные платья');
        $girlsCategory2->setMetaKeywords('Праздничные платья');
        $girlsCategory2->setMetaTitle('Праздничные платья');
        $girlsCategory2->setContent('Праздничные платья');
        $girlsCategory2->setParentCategory($girlsCategory);
        $manager->persist($girlsCategory2);
        
        
        
        $girlsCategory3 = new Category;        
        $girlsCategory3->setTitle('Школьная форма');
        $girlsCategory3->setRoutePath('/category/girls-school-uniform');
        $girlsCategory3->setEntryStatus($enables);
        $girlsCategory3->setMetaDescription('Школьная форма');
        $girlsCategory3->setMetaKeywords('Школьная форма');
        $girlsCategory3->setMetaTitle('Школьная форма');
        $girlsCategory3->setContent('Школьная форма');
        $girlsCategory3->setParentCategory($girlsCategory);
        $manager->persist($girlsCategory3);
        
        
        
        $girlsCategory4 = new Category;        
        $girlsCategory4->setTitle('Школьная форма');
        $girlsCategory4->setRoutePath('/category/platya-dlya-devochek');
        $girlsCategory4->setEntryStatus($enables);
        $girlsCategory4->setMetaDescription('Платья');
        $girlsCategory4->setMetaKeywords('Платья');
        $girlsCategory4->setMetaTitle('Платья');
        $girlsCategory4->setContent('Платья');
        $girlsCategory4->setParentCategory($girlsCategory);
        $manager->persist($girlsCategory4);
        
        
        
        $girlsCategory5 = new Category;        
        $girlsCategory5->setTitle('Джинсы, брюки, юбки');
        $girlsCategory5->setRoutePath('/category/girls-jeans-pants-skirts');
        $girlsCategory5->setEntryStatus($enables);
        $girlsCategory5->setMetaDescription('Джинсы, брюки, юбки');
        $girlsCategory5->setMetaKeywords('Джинсы, брюки, юбки');
        $girlsCategory5->setMetaTitle('Джинсы, брюки, юбки');
        $girlsCategory5->setContent('Джинсы, брюки, юбки');
        $girlsCategory5->setParentCategory($girlsCategory);
        $manager->persist($girlsCategory5);
        
        $manager->flush();
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

    public function loadBrendsCSV(ObjectManager $manager, $enables)
    {
        $data = getcwd() . '/src/AppBundle/DataFixtures/ORM/data/brends.csv';
        if (($handle = fopen($data, "r")) !== FALSE)
        {
            $images = $this->getBrendImages();
            
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
            {
                $media = false;
                if(isset($images[$data['0']]))
                {
                    $media = new Media;
                    $media->setPath($images[$data['0']]);
                    $media->setTitle($data['2']);
                    $media->setPosition(1);
                }
                
                
                $entity = new Brend();
                
                $entity->setEntryStatus($enables);
                
                $entity->setMetaDescription(strip_tags($data['4']));
                $entity->setMetaKeywords(strip_tags($data['5']));
                $entity->setMetaTitle($data['2']);
                
                $entity->setRoutePath('/brends/' . $this->slugify($data[2]));
                
                $entity->setContent($data['3']);
                $entity->setShortContent($data['4']);
                $entity->setTitle($data['2']);
                
                $site = mb_strlen($data[9]) < 5 ? '' : $data[9];
                $entity->setWebsite($site);
                
                if($media)
                {
                    $entity->setMedia($media);
                }

                $manager->persist($entity);
                
                $manager->flush();


                
            }
            fclose($handle);
        }
    }
    
    public function getBrendImages()
    {
        $data = getcwd() . '/src/AppBundle/DataFixtures/ORM/data/images.csv';
        
        $return = [];
        
        if (($handle = fopen($data, "r")) !== FALSE)
        {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
            {
                if(count($data) >= 4)
                {
                    $id = (int)$data[1];

                    if($id && $id > 0)
                    {
                        $return[$id] = str_replace('/uploads/vendors', '', $data[3]);
                    }
                }
            }
            fclose($handle);
        }
        return $return;
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


