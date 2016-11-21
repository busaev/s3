<?php

namespace AppBundle\Services\Entities;

use AppBundle\Services\Entities\EntityInterface;
use AppBundle\Services\Entities\BaseEntity;

class User extends BaseEntity implements EntityInterface
{
    protected $container = null;

    public function __construct($container)
    {
        $this->container=$container;
    }
}
