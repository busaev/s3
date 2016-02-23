<?php

namespace Tests\Appbundle\Controller\Backend;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

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
        'news', 'page', 'vendor', 'user', 'scroll', 'scroll_item',
        'content', 'content_page', 'navigation', 'navigation_item'
    ];

    public function setUp()
    {
        $this->client = static::createClient();
        
        $kernel = static::createKernel();
        $kernel->boot();
        $this->em = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        $this->utils = $kernel->getContainer()->get('utils');
        $this->appEntities = $kernel->getContainer()->get('app.entities');
        $this->em->beginTransaction();
    }
    
    /**
     * Rollback changes.
     */
    public function tearDown()
    {
        $this->em->rollback();
    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $firewall = 'secured_area';
        $token = new UsernamePasswordToken('admin', null, $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
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
        $entity = $this->appEntities->news;
        
        $repositoryNews = $this->em->getRepository($entity->getLogicalName());
        
        $news = $repositoryNews->find(1);
        
        $this->assertEquals(1, $news->getId());
    }
}
