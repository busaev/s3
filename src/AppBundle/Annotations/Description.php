<?php

namespace AppBundle\Annotations;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * @Annotation
 */
final class Description
{    
    private $propertyName;
    
    //название
    private $title;
    
    //тип данных 
    private $dataType = 'string';
    
    //если нужно достать свойство из связанной сущности
    private $property;


    public function __construct($options)
    {        
        if (isset($options['value'])) {
            $options['propertyName'] = $options['value'];
            unset($options['value']);
        }

        foreach ($options as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException(sprintf('Property "%s" does not exist', $key));
            }

            $this->$key = $value;
        }
    }

    public function getPropertyName()
    {
        return $this->propertyName;
    }
    
    public function getTitle()
    {
        return $this->title;
    }

    public function getDataType()
    {
        return $this->dataType;
    }

    public function getProperty()
    {
        if(NULL !== $this->property)
            return $this->property;
            
        return $this->getPropertyName();
    }
}