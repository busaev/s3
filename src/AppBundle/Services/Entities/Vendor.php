<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;

class Vendor extends BaseEntity implements EntityInterface
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
}
