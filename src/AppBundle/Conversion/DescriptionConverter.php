<?php

namespace AppBundle\Conversion;

use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Annotations\AnnotationReader;

class DescriptionConverter
{
    private $reader;
    private $annotationClass = 'AppBundle\\Annotations\\Description';

    public function __construct(Reader $reader)
    {
        $this->reader = new AnnotationReader();
    }

    public function methods($originalObject)
    {
        $convertedObject = new \stdClass;

        $reflectionObject = new \ReflectionObject($originalObject);

        foreach ($reflectionObject->getMethods() as $item) {
            // fetch the @StandardObject annotation from the annotation reader
            $annotation = $this->reader->getMethodAnnotation($item, $this->annotationClass);            
            
            if (null !== $annotation) {
                $propertyName = $annotation->getPropertyName();

                // retrieve the value for the property, by making a call to the method
                $value = $item->invoke($originalObject);

                // try to convert the value to the requested type
                $type = $annotation->getDataType();
                if (false === settype($value, $type)) {
                    throw new \RuntimeException(sprintf('Could not convert value to type "%s"', $value));
                }

                $convertedObject->$propertyName = $value;
            }
        }
        return $convertedObject;
    }
    
    public function props($originalObject)
    {
        $convertedObject = new \stdClass;

        $reflectionObject = new \ReflectionObject($originalObject);

        foreach ($reflectionObject->getProperties() as $item) {
            // fetch the @StandardObject annotation from the annotation reader
            $annotation = $this->reader->getPropertyAnnotation($item, $this->annotationClass);

            if (null !== $annotation) {
            
                $propertyName = $annotation->getPropertyName();
                
                $convertedObject->$propertyName = $annotation;
            }
        }

        return $convertedObject;
    }
}
