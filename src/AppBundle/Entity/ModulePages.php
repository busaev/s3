<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;


/**
 * ModulePages
 *
 * @ORM\Table(name="module_pages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModulePagesRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ModulePages
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
     * @ORM\Column(name="meta_title", type="string", length=255, nullable=true)
     */
    private $metaTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text", nullable=true)
     */
    private $metaKeywords;
    
    /**
     * @var string
     * 
     * @Description("routePath", title="Route path", dataType="string",  property="routePath")
     *
     * @ORM\Column(name="route_path", type="string", length=255, unique=false)
     */
    private $routePath;
    
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
     * @Description("entryStatus", title="Entry status", dataType="string",  property="entryStatus.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $entryStatus;
    
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Model\RouteSubjectInterface", cascade={"persist"})
     */
    private $route;
    
    
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
     * Set title
     *
     * @param string $title
     *
     * @return Seo
     */
    public function setMetaTitle($metaTitle)
    {
        $this->metaTitle = $metaTitle;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getMetaTitle()
    {
        return $this->metaTitle;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Seo
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     *
     * @return Seo
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }
    
    /**
     * Set route
     *
     * @param string $route
     *
     * @return Route
     */
    public function setRoutePath($routePath)
    {
        $this->routePath = $routePath;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getRoutePath()
    {
        return $this->routePath;
    }
    
    
    /**
     * Set entryStatus
     *
     * @param \AppBundle\Entity\ScrollItem $entryStatus
     *
     * @return News
     */
    public function setEntryStatus(\AppBundle\Entity\ScrollItem $entryStatus = null)
    {
        $this->entryStatus = $entryStatus;

        return $this;
    }

    /**
     * Get entryStatus
     *
     * @return \AppBundle\Entity\ScrollItem
     */
    public function getEntryStatus()
    {
        return $this->entryStatus;
    }
    
    /**
     * Set route
     *
     * @param \AppBundle\Entity\Route $route
     *
     * @return News
     */
    public function setRoute(\AppBundle\Entity\Route $route = null)
    {
        $this->route = $route;
        
        return $this;
    }

    /**
     * Get route
     *
     * @return \AppBundle\Entity\Route
     */
    public function getRoute()
    {
        return $this->route;
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
       $route->setController($this->getAction($this));
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
       $route->setController($this->getAction($this));
       $route->setRoutePath($this->getRoutePath());
       
       $this->setRoute($route);
   }
}
