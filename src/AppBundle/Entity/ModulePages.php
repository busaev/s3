<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

use AppBundle\Entity\ContentBaseEntity;
use Doctrine\Common\Collections\ArrayCollection;


/**
 * ModulePages
 *
 * @ORM\Table(name="module_pages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModulePagesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ModulePages extends ContentBaseEntity
{
    
    
    /**
     * @var int
     * 
     * @Description("id", title="Id", dataType="integer")
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="idModule", type="integer")
     */
    private $idModule;
    
    /**
     * @var string
     * 
     * @Description("title", title="Title", dataType="string")
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * @var string
     * 
     * @Description("action", title="Action", dataType="string")
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;
    
    
   /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * @Description("module", title="Module", dataType="string",  property="module.title")
     * 
     * @ORM\ManyToOne(targetEntity="Module", inversedBy="modulePages")
     * @ORM\JoinColumn(name="idModule", referencedColumnName="id")
     */
    private $module;
    
    /**
     * @ORM\OneToMany(targetEntity="NavigationItem", mappedBy="modulePage")
     */
    private $navigationItems;
    
    /**
     * #################################################
     * #################  Не колонки  ##################
     * #################################################
     */
    
    private $contentType = 'module';
    
    
    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    public function __construct()
    {
        $this->navigationItems = new ArrayCollection();
    }


    public function __toString() {
        $title = $this->getTitle();
        if(is_string($title))
            return $title;
        return '';
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Set idModule
     *
     * @param integer $idModule
     *
     * @return ModulePages
     */
    public function setIdModule($idModule)
    {
        $this->idModule = $idModule;

        return $this;
    }

    /**
     * Get idModule
     *
     * @return int
     */
    public function getIdModule()
    {
        return $this->idModule;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ModulePages
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Set action
     *
     * @param string $action
     *
     * @return ModulePages
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction($entity=false)
    {
        return $this->action;
    }

    /**
     * Set module
     *
     * @param \AppBundle\Entity\Module $module
     *
     * @return ModulePages
     */
    public function setModule(\AppBundle\Entity\Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \AppBundle\Entity\Module
     */
    public function getModule()
    {
        return $this->module;
    }
    
    

    /**
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }
    
    /**
     * #################################################
     * #################### Events #####################
     * #################################################
     */
    
    /**
     * @ORM\PostPersist
     */
   public function initRoute()
   {
       $route = new Route;
       $route->setEntryId($this->getId());
       $route->setContentType($this->getContentType());
       $route->setAction($this->getAction($this));
       $route->setRoutePath($this->getRoutePath());
       
       $this->setRoute($route);
   }
   
   /**
     * @ORM\PreUpdate
     */
   public function updateRoute()
   {
       $route = $this->getRoute();
       $route->setContentType($this->getContentType());
       $route->setAction($this->getAction($this));
       $route->setRoutePath($this->getRoutePath());
       
       $this->setRoute($route);
   }

    /**
     * Add navigationItem
     *
     * @param \AppBundle\Entity\NavigationItem $navigationItem
     *
     * @return ModulePages
     */
    public function addNavigationItem(\AppBundle\Entity\NavigationItem $navigationItem)
    {
        $this->navigationItems[] = $navigationItem;

        return $this;
    }

    /**
     * Remove navigationItem
     *
     * @param \AppBundle\Entity\NavigationItem $navigationItem
     */
    public function removeNavigationItem(\AppBundle\Entity\NavigationItem $navigationItem)
    {
        $this->navigationItems->removeElement($navigationItem);
    }

    /**
     * Get navigationItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNavigationItems()
    {
        return $this->navigationItems;
    }
}
