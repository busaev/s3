<?php
namespace AppBundle\Entity\Content;

use AppBundle\Model\RouteSubjectInterface;
use AppBundle\Annotations\Description;

use AppBundle\Entity\Route;

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
     * Сущность по-умолчанию
     * 
     * @var string
     */
    private $entityCode ="page";
    
    
    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    /**
     * Set title
     *
     * @param string $metaTitle
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
     * @param string $metaDescription
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
     * @param string $metaKeywords
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
     * @return ContentBaseEntity
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
     *  Получить экшн по имени сущности
     * 
     * @param entity $entity
     * @return string
     */
    private function getDefineAction($entity=false)
    {
        if(is_object($entity) && is_callable([$entity, 'getAction']))
        {
            return $entity->getAction();
        }
        
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
     * @return string
     */
    public function getEntityCode()
    {
        return $this->entityCode;
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
       $route->setAction($this->getDefineAction($this));
       $route->setRoutePath($this->getRoutePath());
       $route->setEntityCode($this->getEntityCode());
       
       $this->setRoute($route);
   }
   
   /**
     * @ORM\PreUpdate
     */
   public function updateRoute()
   {
       $route = $this->getRoute();
       $route->setAction($this->getDefineAction($this));
       $route->setRoutePath($this->getRoutePath());
       
       $this->setRoute($route);
   }

    
}