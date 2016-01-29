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
        $scrollItemEnable->setTitle('Enable');
        $scrollItemEnable->setPosition(1);
        
        $manager->persist($scrollItemEnable);
        
        
        // disable
        $scrollItemDisable = new ScrollItem;
        $scrollItemDisable->setScroll($scroll);
        $scrollItemDisable->setCode('disable');
        $scrollItemDisable->setTitle('Disable');
        $scrollItemDisable->setPosition(2);
        
        $manager->persist($scrollItemDisable);
        
        
        $manager->flush();
        
        
        /**
         *  Роли пользователя
         */
        
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
        $userWY->setIsActive(true);
        $userWY->setEmail('wy@wy.ru');
        $userWY->addUserRole($roleAdmin);
        
        $manager->persist($userWY);
        
        
        $manager->flush();
    }
}


