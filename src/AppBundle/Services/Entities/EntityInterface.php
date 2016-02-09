<?php

namespace AppBundle\Services\Entities;

use AppBundle\Entity\ContentBaseEntity;

/**
 *
 * @author busaev
 */
interface EntityInterface {
    
    public function init(ContentBaseEntity $entity);
}
