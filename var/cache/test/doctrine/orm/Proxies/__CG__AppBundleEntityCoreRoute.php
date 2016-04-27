<?php

namespace Proxies\__CG__\AppBundle\Entity\Core;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Route extends \AppBundle\Entity\Core\Route implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = [];



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'id', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'entityCode', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'routePath', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'action', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'actionType', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'entryId', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'contentPage', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'navigationItems'];
        }

        return ['__isInitialized__', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'id', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'entityCode', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'routePath', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'action', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'actionType', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'entryId', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'contentPage', '' . "\0" . 'AppBundle\\Entity\\Core\\Route' . "\0" . 'navigationItems'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Route $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function setRoutePath($routePath)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRoutePath', [$routePath]);

        return parent::setRoutePath($routePath);
    }

    /**
     * {@inheritDoc}
     */
    public function getRoutePath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRoutePath', []);

        return parent::getRoutePath();
    }

    /**
     * {@inheritDoc}
     */
    public function setAction($action)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAction', [$action]);

        return parent::setAction($action);
    }

    /**
     * {@inheritDoc}
     */
    public function getAction()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAction', []);

        return parent::getAction();
    }

    /**
     * {@inheritDoc}
     */
    public function setEntryId($entryId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEntryId', [$entryId]);

        return parent::setEntryId($entryId);
    }

    /**
     * {@inheritDoc}
     */
    public function getEntryId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEntryId', []);

        return parent::getEntryId();
    }

    /**
     * {@inheritDoc}
     */
    public function setActionType($actionType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setActionType', [$actionType]);

        return parent::setActionType($actionType);
    }

    /**
     * {@inheritDoc}
     */
    public function getActionType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getActionType', []);

        return parent::getActionType();
    }

    /**
     * {@inheritDoc}
     */
    public function addNavigationItem(\AppBundle\Entity\Core\NavigationItem $navigationItem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addNavigationItem', [$navigationItem]);

        return parent::addNavigationItem($navigationItem);
    }

    /**
     * {@inheritDoc}
     */
    public function removeNavigationItem(\AppBundle\Entity\Core\NavigationItem $navigationItem)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeNavigationItem', [$navigationItem]);

        return parent::removeNavigationItem($navigationItem);
    }

    /**
     * {@inheritDoc}
     */
    public function getNavigationItems()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNavigationItems', []);

        return parent::getNavigationItems();
    }

    /**
     * {@inheritDoc}
     */
    public function setEntityCode($entityCode)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEntityCode', [$entityCode]);

        return parent::setEntityCode($entityCode);
    }

    /**
     * {@inheritDoc}
     */
    public function getEntityCode()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEntityCode', []);

        return parent::getEntityCode();
    }

    /**
     * {@inheritDoc}
     */
    public function setContentPage($contentPage)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContentPage', [$contentPage]);

        return parent::setContentPage($contentPage);
    }

    /**
     * {@inheritDoc}
     */
    public function getContentPage()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContentPage', []);

        return parent::getContentPage();
    }

}
