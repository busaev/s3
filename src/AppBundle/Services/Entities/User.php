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

    /**
     * Получить namespace для формы
     *
     * @return string
     */
    public function getTypeNamspace($entityFormType=false) 
    {
        $name = $entityFormType ? $entityFormType : $this->getName();
        return 'AppBundle\\Form\\' . $name . 'Type';
    }
}
