<?php

namespace AppBundle\Services\Entities\Content;

use AppBundle\Services\Entities\EntityInterface;
use AppBundle\Services\Entities\BaseEntity;

class News extends BaseEntity implements EntityInterface
{
    protected $container = null;

    public function __construct($container)
    {
        $this->container=$container;
    }

    public function getRequest() {
        return $this->getContainer()->get('request');
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function init($entity=false)
    {
        $em = $this->getContainer()->get('doctrine')->getManager();

        if(!$entity)
        {
            $entity = $this->getNew();
        }

        $content = $em->getRepository('AppBundle:Content')->findOneBy([
            'entityCode'=>'news'
        ]);

        return $entity->setRoutePath($content->getRoutePath());
    }

    public function baseQuery()
    {
        $doctrine = $this->container->get('doctrine');

        // Основной запрос
        $status = $doctrine->getRepository("AppBundle:ScrollItem")
                           ->findByScrollItemCodeAndScrollCode('delete', 'entry_status');

        // Основной запрос
        return $doctrine->getRepository($this->getLogicalName())
                        ->createQueryBuilder('e')
                        ->select('e')
                        ->where('e.entryStatus != :status')
                        ->setParameter('status', $status->getId());
    }
}
