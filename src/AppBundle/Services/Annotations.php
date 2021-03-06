<?php
namespace AppBundle\Services;


use Doctrine\Common\Annotations\AnnotationReader;
use AppBundle\Conversion\DescriptionConverter;
use AppBundle\Conversion\DescriptionObjectConverter;

use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\VarDumper\VarDumper;

class Annotations
{
  private $container;

  public function __construct($container)
  {
      $this->container = $container;
  }

    public function getAll($entityCode)
    {
        $fields = [
            'object' => $this->getObject($entityCode),
            'properties' => $this->getProperties($entityCode),
            'methods' => []
        ];

        return $fields;
    }

    /**
     * @param string $entityCode
     * @return array
     */
    public function getObject($entityCode)
    {
        // @todo разобраться, почему сюда приходит entityName, а не entityCode 
        $utils = $this->container->get('utils');
        $entityCode = $utils->getUnderscore($entityCode);
        
        $converter = new DescriptionObjectConverter(new AnnotationReader());

        $entities = $this->container->get('app.entities');        
        $entityNameSpace = $entities->$entityCode->getNamespace();
        
        $annotations = get_object_vars($converter->object(new $entityNameSpace()));

        return $annotations;
    }

    public function getProperties($entityCode)
    {
        // @todo разобраться, почему сюда приходит entityName, а не entityCode 
        $utils = $this->container->get('utils');
        $entityCode = $utils->getUnderscore($entityCode);
        
        $converter = new DescriptionConverter(new AnnotationReader());

        $entities = $this->container->get('app.entities');        
        $entityNameSpace = $entities->$entityCode->getNamespace();

        return get_object_vars($converter->props(new $entityNameSpace()));
    }

    public function fillProperties($entityCode, $entities)
    {
        $utils = $this->container->get('utils');

        $return = [
            'object'     => [],
            'fields'     => [],
            'properties' => [],
            'titles'     => [],
            'dataTypes'  => [],
            'entities'   => []
        ];
        
//        \Symfony\Component\VarDumper\VarDumper::dump($entityCode);
//        \Symfony\Component\VarDumper\VarDumper::dump($entities);
//        die();
        
        $return['object'] = $this->getObject($entityCode);

        // accessor
        $accessor = PropertyAccess::createPropertyAccessor();

        // annotations
        $annotations = $this->getProperties($entityCode);

        if(!is_array($annotations) || empty($annotations))
            return $return;

        // fill return
        foreach($annotations as $field => $annotation)
        {
            // fill field
            $return['fields'][] = $field;

            // fill property
            $return['properties'][] = $annotation->getProperty();

            // fill title
            $return['titles'][$field] = $annotation->getTitle();

            // fill type
            $return['dataTypes'][$field] = $annotation->getDataType();

            // fill entity values
            foreach($entities as $entityIdx => $entity)
            {
                $getter = 'get' . $field;

                if(is_callable([$entity, $getter]) && NULL !== $entity->$getter())
                    $return['entities'][$entityIdx][$field] = $accessor->getValue($entity, $annotation->getProperty());
                else
                    $return['entities'][$entityIdx][$field] = NULL;
            }

        }
        return $return;
    }

    public function fillOneProperties($entityCode, $entities)
    {
        $return = $this->fillProperties($entityCode, [$entities]);

        if(isset($return['entities'][0]))
        {
            $return['entity'] = $return['entities'][0];
        }
        unset($return['entities']);

        return $return;
    }
}
