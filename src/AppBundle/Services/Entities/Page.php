<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

class Page extends BaseEntity implements EntityInterface
{
    protected $container = null;

    /**
     * @var boolean
     */
    public $isContent = true;

    public function __construct($container) {
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
            'entityCode'=>'page'
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
