<?php
namespace AppBundle\Entity\Content;

use AppBundle\Model\RouteSubjectInterface;
use AppBundle\Annotations\Description;

use AppBundle\Entity\Core\Route;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping\MappedSuperclass;

/**
 * Базовая сущность для любого контента
 * 
 * @MappedSuperclass
 */
class ContentBaseEntity implements RouteSubjectInterface
{
    
    /**
     * #################################################
     * ###################  Колонки  ###################
     * #################################################
     */
    
    /**
     * Мета заголовок
     * 
     * @var string
     *
     * @ORM\Column(name="meta_title", type="string", length=255, nullable=true)
     */
    private $metaTitle;

    /**
     * Мета описание
     * 
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text", nullable=true)
     */
    private $metaDescription;

    /**
     * Мета ключевые слова
     * 
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text", nullable=true)
     */
    private $metaKeywords;
    
    /**
     * Путь в адресной строке
     * 
     * @var string
     * 
     * @Description("routePath", title="Route path", dataType="string",  property="routePath")
     * 
     * @Assert\NotBlank()
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
     * Связанный статус записи
     * 
     * @Description("entryStatus", title="Entry status", dataType="string",  property="entryStatus.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $entryStatus;
    
    /**
     * Связанный маршрут
     * 
     * @ORM\OneToOne(targetEntity="AppBundle\Model\RouteSubjectInterface", cascade={"persist"})
     */
    private $route;
    
    
    /**
     * #################################################
     * #################  Не колонки  ##################
     * #################################################
     */
    
    /**
     * Тип записи
     * 
     * @var string
     * 
     * @deprecated
     */
    private $contentType="content"; // content|action
    
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
     * @return string
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
     * @return string
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
     * @return string
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
     * @param \AppBundle\Entity\Core\Route $route
     *
     * @return News
     */
    public function setRoute(\AppBundle\Entity\Core\Route $route = null)
    {
        $this->route = $route;
        
        return $this;
    }

    /**
     * Get route
     *
     * @return \AppBundle\Entity\Core\Route
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
    public function getDefineAction($entity=false)
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
}