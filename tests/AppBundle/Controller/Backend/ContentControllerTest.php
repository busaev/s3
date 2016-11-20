<?php

namespace Tests\Appbundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
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

/**
 * Description of ContentControllerTest
 *
 * @author busaev
 */
class ContentControllerTest extends WebTestCase
{
    private $client = null;
    
    private $em;
    private $utils;
    private $appEntities;
    
    // на проверку
    private $entities = [
        'news', 'page', 'brend', 'user', 'scroll', 'scroll_item',
        'module', 'module_page', 'navigation', 'navigation_item'
    ];

    public function setUp()
    {
        $this->client = static::createClient();
        
        $kernel = static::createKernel();
        $kernel->boot();
        $this->em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->utils = $kernel->getContainer()->get('utils');
        $this->appEntities = $kernel->getContainer()->get('app.entities');
        //$this->em->beginTransaction();
    }
    
    /**
     * Rollback changes.
     */
    public function tearDown()
    {
        //$this->em->rollback();
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $firewall = 'secured_area';
        $token = new UsernamePasswordToken('admin', null, $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId(), time()+60*10);
        $this->client->getCookieJar()->set($cookie);
    }
    
    public function testIndexes()
    {
        $this->logIn();
        
        $client = $this->client;
                
        // индексные странички сущностей
        foreach($this->entities as $entity)
        {
            $crawler = $client->request('GET', '/backend/content/' . $entity);
            $this->assertEquals(200, $client->getResponse()->getStatusCode());
        }  
    }
    
    public function testNew()
    {
        $this->logIn();
        
        $client = $this->client;
        
        // добавление сущностей
        foreach($this->entities as $entity)
        {
            //пользователь добавляется по другому
            if('user' == $entity)
                continue;
            
            $crawler = $client->request('GET', '/backend/content/' . $entity . '/new');
            $this->assertEquals(200, $client->getResponse()->getStatusCode());
}
        
        //пользователь
        $crawler = $client->request('GET', '/backend/user/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
    }
    
    function testNewsCrud()
    {
        $this->logIn();
        
        $client = $this->client;
        
        $entity = $this->appEntities->news;

        
        //$entityScroll = $this->appEntities->scroll_item;
        
        // Запись активна
        //$status = $this->em->getRepository($entityScroll->getLogicalName())
        //                    ->findByScrollItemCodeAndScrollCode('enable', 'entry_status');
        
        //index
        $crawler = $client->request('GET', '/backend/content/news');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        //new
        $crawler = $client->request('GET', '/backend/content/news/new');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        //get news
        $repositoryNews = $this->em->getRepository($entity->getLogicalName());
        $news = $repositoryNews->findBy([], [], 1);
        
        $this->greaterThan(0, count($news));
        
        //show
        $crawler = $client->request('GET', '/backend/content/news/'.$news[0]->getId().'/show');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        //edit
        $crawler = $client->request('GET', '/backend/content/news/'.$news[0]->getId().'/edit');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        //history
        $crawler = $client->request('GET', '/backend/content/news/'.$news[0]->getId().'/history');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    
    }
}
