<?php

namespace AppBundle\Services\Entities;

/**
 *
 * @author busaev
 */
interface EntityInterface {
    
    public function init($entity=false);
    public function baseQuery();
    
}
