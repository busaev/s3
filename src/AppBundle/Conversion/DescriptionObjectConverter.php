<?php

namespace AppBundle\Conversion;

use Doctrine\Common\Annotations\Reader;
use Doctrine\Common\Annotations\AnnotationReader;

class DescriptionObjectConverter
{
    private $reader;
    private $annotationClass = 'AppBundle\\Annotations\\DescriptionObject';

    public function __construct(Reader $reader)
    {
        $this->reader = new AnnotationReader();
    }
    
    
    public function object($originalObject)
    {
        $convertedObject = new \stdClass;

        $reflectionObject = new \ReflectionClass($originalObject);

        // fetch the @StandardObject annotation from the annotation reader
        $annotation = $this->reader->getClassAnnotation($reflectionObject, $this->annotationClass);

        if (null !== $annotation) {

            $name = $annotation->getName();

            $convertedObject->name = $name;
            $convertedObject->data = $annotation;
        }
        

        return $convertedObject;
    }
}
