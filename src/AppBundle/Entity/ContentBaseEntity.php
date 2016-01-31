<?php
namespace AppBundle\Entity;

use AppBundle\Model\RouteSubjectInterface;
use AppBundle\Annotations\Description;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * @MappedSuperclass
 * @ORM\HasLifecycleCallbacks()
 */
class ContentBaseEntity implements RouteSubjectInterface
{
    
    /**
     * #################################################
     * ###################  Колонки  ###################
     * #################################################
     */
    
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
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
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
    
    
    /**
     * @var string
     */
    private $contentType="content"; // content|module
    
    
    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
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
     * #################################################
     * ###################  Staff  #####################
     * #################################################
     */
    
    /**
     *  Получить контроллек по имени сущности
     * 
     * @param entity $entity
     * @return string
     */
    private function getAction($entity=false)
    {
        if(is_object($entity) && isset($entity->action))
            return $entity->action;
        
        $class = get_class($entity);
        
        if(!strpos($class, '\\'))
        {
            $controler = $class;
        }
        else
        {
            $tmp = explode('\\', $class);
            $controler = end($tmp);
        }
        
        return "AppBundle:".$controler.":route";
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
       $route->setController($this->getAction($this));
       $route->setRoutePath($this->getRoutePath());
       
       $this->setRoute($route);
   }

    
}