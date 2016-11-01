<?php

namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;
use AppBundle\Entity\BaseEntity;


/**
 * ModulePage
 * 
 * @DescriptionObject("module_pages", title="Module pages")
 *
 * @ORM\Table(name="module_pages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModulePageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ModulePage extends BaseEntity
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
     * @ORM\Column(name="entity_code", type="string", length=255, nullable=false)
     */
    private $entityCode;
    
    /**
     * @var string
     * 
     * @Description("title", title="Title", dataType="string")
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private $title;
    
    /**
     * Логический путь до контроллера, если его необходимо переопределить
     * 
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
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Core\Module", inversedBy="modulePages")
     * @ORM\JoinColumn(name="entity_code", referencedColumnName="entity_code")
     */
    private $module;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="modulePage")
     */
    private $navigationItems;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\Route", mappedBy="modulePage")
     */
    private $routes;    
    
    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    public function __construct()
    {
        $this->navigationItems = new ArrayCollection();
        $this->routes          = new ArrayCollection();
        
        $this->review = false;
    }


    public function __toString()
    {
        $title = $this->getTitle();
        
        if(is_string($title))
        {
            return $title;
        }
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
     * @return string
     */
    public function getEntityCode()
    {
        //return $this->entityCode;
        return $this->getModule()->getEntityCode();
    }
    
    /**
     * @return string
     */
    public function setEntityCode($entityCode)
    {
        $this->entityCode = $entityCode;
        //return $this->getModule()->getEntityCode();
        return $this;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ModulePage
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
     * Set module
     *
     * @param \AppBundle\Entity\Core\Module $module
     *
     * @return ModulePage
     */
    public function setModule(\AppBundle\Entity\Core\Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \AppBundle\Entity\Module\Core
     */
    public function getModule()
    {
        return $this->module;
    }
    
    /**
     * Add navigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     *
     * @return ModulePage
     */
    public function addNavigationItem(\AppBundle\Entity\Core\NavigationItem $navigationItem)
    {
        $this->navigationItems[] = $navigationItem;

        return $this;
    }

    /**
     * Remove navigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     */
    public function removeNavigationItem(\AppBundle\Entity\Core\NavigationItem $navigationItem)
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
    
    public function getAction() 
    {
        return $this->action;
    }

    public function setAction($action)
    {
        $this->action = $action;
        return $this;
    }
    
    public function getRoutes() {
        return $this->routes;
    }

    public function setRoutes($routes) {
        $this->routes = $routes;
    }




}
