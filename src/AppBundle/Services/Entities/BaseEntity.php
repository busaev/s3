<?php

namespace AppBundle\Services\Entities;

/**
 * Description of BaseEntity
 *
 * @author busaev
 */
class BaseEntity {
    
    // является ли сущность контентной
    protected $isContent = false;
    
    // название сущности
    protected $entityCode = false;



    /**
     * Является ли сущность BaseContent?
     * 
     * @return boolean
     */
    public function getIsContent() 
    {
        if(isset($this->isContent))
        {
            return $this->isContent;
        }
        return false;
    }
    
    /**
     * Получинь название класса сущности
     */
    public function getName()
    {
        $class = get_class($this);
        
        if(!strpos($class, '\\'))
        {
            $entityName = $class;
        }
        else
        {
            $tmp = explode('\\', $class);
            $entityName = end($tmp);
        }
        
        return $entityName;
    }

    /**
     * Получить код сущности
     * 
     * @return string
     */
    public function getCode()
    {
        if($this->entityCode)
        {
            return $this->entityCode;
        }
        
        return $this->container->get('utils')->getUnderscore($this->getName());
    }
    
    /**
     * Получить название сущности из аннотаций
     * 
     * @return type
     */
    public function getTitle()
    {
        $title = $this->getName();
        
        //аннотации
        $annotations = $this->container->get('annotations')->getAll($this->getCode());

        if(isset($annotations['object']['data']) && is_object($annotations['object']['data']))
        {
            $title = $annotations['object']['data']->getTitle();
        }

        return $title;
    }

    /**
     * Получить namespace для сущности
     * 
     * @return string
     */
    public function getNamespace()
    {
        if($this->getIsContent())
        {
            return 'AppBundle\\Entity\\Content\\' . $this->getName();
        }
        return 'AppBundle\\Entity\\' . $this->getName();
    }
    
    /**
     * Получить namespace для формы сущности
     * 
     * @return string
     */
    public function getTypeNamspace()
    {
        return 'AppBundle\\Form\\' . $this->getName() . 'Type';
    }
    
    /**
     * 
     * @param type $entityCode
     * @param type $bundle
     * @return type
     */
    public function getLogicalName()
    {
        if($this->getIsContent())
        {
            return "AppBundle:Content\\" . $this->getName();
        }
        
        return "AppBundle:" . $this->getName();
    }
    
    /**
     * Получить новый объект сущности
     * 
     * @return entity
     */
    public function getNew()
    {   
        $entity = $this->getNamespace();
        
        return new $entity;
    }
    
    /**
     * Дефолтная инициализация новой сущности
     * 
     * @param entity $entity
     * @return entity
     */
    public function init($entity=false)
    {
        if(!$entity)
        {
            $entity = $this->getNew();
        }
        
        return $entity;
    }


}
