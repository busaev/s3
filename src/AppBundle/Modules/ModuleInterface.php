<?php

namespace AppBundle\Modules;

use AppBundle\Entity\ContentBaseEntity;

/**
 *
 * @author busaev
 */
interface ModuleInterface {
    
    public function init(ContentBaseEntity $entity);
}