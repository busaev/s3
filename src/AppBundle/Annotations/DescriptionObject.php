<?php

namespace AppBundle\Annotations;

/**
 * @Annotation
 */
final class DescriptionObject
{    
    private $name;
    private $title;
    private $description;

    public function __construct($options)
    {
        if (isset($options['value'])) {
            $options['name'] = $options['value'];
            unset($options['value']);
        }

        foreach ($options as $key => $value) {
            if (!property_exists($this, $key)) {
                throw new \InvalidArgumentException(sprintf('Property "%s" does not exist', $key));
            }

            $this->$key = $value;
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getTitle()
    {
        return $this->title;
    }

    
    public function getDescription()
    {
        return $this->description;
    }
}