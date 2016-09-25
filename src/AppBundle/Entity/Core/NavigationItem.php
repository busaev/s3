<?php

namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * NavigationItem
 * 
 * @DescriptionObject("navigation_items", title="Navigation items")
 *
 * @ORM\Table(name="navigation_items")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NavigationItemRepository")
 */
class NavigationItem
{
    /**
     * #################################################
     * ###################  Колонки  ###################
     * #################################################
     */
    
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
     * Ссылка на навигацию
     *
     * @ORM\Column(name="idNavigation", type="integer", nullable=true)
     */
    private $idNavigation;

    /**
     * @var int
     * Ссылка на родительский элемент навигации
     *
     * @ORM\Column(name="idNavigationItem", type="integer", nullable=true)
     */
    private $idNavigationItem;    
    
    /**
     * @var int
     *
     * @ORM\Column(name="entity_code", type="string", length=255, nullable=false)
     */
    private $entityCode;
        
    /**
     * @var int
     *
     * @ORM\Column(name="idModulePage", type="integer", nullable=true)
     */
    private $idModulePage;
        
    /**
     * @var int
     *
     * @ORM\Column(name="idRoute", type="integer", nullable=true)
     */
    private $idRoute;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

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
     * @ORM\Column(name="target", type="string", length=255, nullable=true)
     */
    private $target;
    
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
     * @ORM\ManyToOne(targetEntity="Navigation", inversedBy="navigationItems")
     * @ORM\JoinColumn(name="idNavigation", referencedColumnName="id")
     */
    private $navigation;
    
    /**
     * @ORM\ManyToOne(targetEntity="NavigationItem", inversedBy="childrenNavigationItems")
     * @ORM\JoinColumn(name="idNavigationItem", referencedColumnName="id")
     */
    private $parentNavigationItem;
    

    /**
     * @ORM\OneToMany(targetEntity="NavigationItem", mappedBy="parentNavigationItem")
     */
    private $childrenNavigationItems;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Core\Module", inversedBy="navigationItems")
     * @ORM\JoinColumn(name="entity_code", referencedColumnName="entity_code")
     */
    private $module;
    
    /**
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Core\ModulePage", inversedBy="navigationItems")
     * @ORM\JoinColumn(name="idModulePage", referencedColumnName="id")
     */
    private $modulePage;
    
    /**
     * @var string
     * 
     * @Description("route", title="Route", dataType="string",  property="route.routePath")
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Core\Route", inversedBy="navigationItems")
     * @ORM\JoinColumn(name="idRoute", referencedColumnName="id")
     */
    private $route;
    
    /**
     * 
     */
    public function __construct() 
    {
        $this->childrenNavigationItems = new ArrayCollection();
    }

    public function __toString()
    {   
        $title = $this->getTitle();
        
        if(is_string($title))
        {
            return $this->getTitlePrefix() . $title;
        }
        
        return '';
    }
    
    public function getTitlePrefix()
    {
        $prefix = '';
        
        if(NULL !== $this->getParentNavigationItem())
        {
            $prefix = '-' . $this->getParentNavigationItem()->getTitlePrefix();
        }
        return $prefix;
    }




    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */


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
     * Set idNavigation
     *
     * @param integer $idNavigation
     *
     * @return NavigationItem
     */
    public function setIdNavigation($idNavigation)
    {
        $this->idNavigation = $idNavigation;

        return $this;
    }

    /**
     * Get idNavigation
     *
     * @return int
     */
    public function getIdNavigation()
    {
        return $this->idNavigation;
    }

    /**
     * Set idNavigationItem
     *
     * @param integer $idNavigationItem
     *
     * @return NavigationItem
     */
    public function setIdNavigationItem($idNavigationItem)
    {
        $this->idNavigationItem = $idNavigationItem;

        return $this;
    }

    /**
     * Get idNavigationItem
     *
     * @return int
     */
    public function getIdNavigationItem()
    {
        return $this->idNavigationItem;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return NavigationItem
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return NavigationItem
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
     * Set target
     *
     * @param string $target
     *
     * @return NavigationItem
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set navigation
     *
     * @param \AppBundle\Entity\Core\Navigation $navigation
     *
     * @return NavigationItem
     */
    public function setNavigation(\AppBundle\Entity\Core\Navigation $navigation = null)
    {
        $this->navigation = $navigation;

        return $this;
    }

    /**
     * Get navigation
     *
     * @return \AppBundle\Entity\Navigation
     */
    public function getNavigation()
    {
        return $this->navigation;
    }

    /**
     * Set parentNavigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $parentNavigationItem
     *
     * @return NavigationItem
     */
    public function setParentNavigationItem(\AppBundle\Entity\Core\NavigationItem $parentNavigationItem = null)
    {
        $this->parentNavigationItem = $parentNavigationItem;

        return $this;
    }

    /**
     * Get parentNavigationItem
     *
     * @return \AppBundle\Entity\Core\NavigationItem
     */
    public function getParentNavigationItem()
    {
        return $this->parentNavigationItem;
    }

    /**
     * Add childrenNavigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $childrenNavigationItem
     *
     * @return NavigationItem
     */
    public function addChildrenNavigationItem(\AppBundle\Entity\Core\NavigationItem $childrenNavigationItem)
    {
        $this->childrenNavigationItems[] = $childrenNavigationItem;

        return $this;
    }

    /**
     * Remove childrenNavigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $childrenNavigationItem
     */
    public function removeChildrenNavigationItem(\AppBundle\Entity\Core\NavigationItem $childrenNavigationItem)
    {
        $this->childrenNavigationItems->removeElement($childrenNavigationItem);
    }

    /**
     * Get childrenNavigationItems
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getChildrenNavigationItems()
    {
        return $this->childrenNavigationItems;
    }

    /**
     * Set entryStatus
     *
     * @param \AppBundle\Entity\Core\ScrollItem $entryStatus
     *
     * @return NavigationItem
     */
    public function setEntryStatus(\AppBundle\Entity\Core\ScrollItem $entryStatus = null)
    {
        $this->entryStatus = $entryStatus;

        return $this;
    }

    /**
     * Get entryStatus
     *
     * @return \AppBundle\Entity\Core\ScrollItem
     */
    public function getEntryStatus()
    {
        return $this->entryStatus;
    }

    function getEntityCode()
    {
        return $this->entityCode;
    }

    function setEntityCode($entityCode)
    {
        $this->entityCode = $entityCode;
    }
    
    /**
     * Set module
     *
     * @param \AppBundle\Entity\Core\\Module $module
     *
     * @return NavigationItem
     */
    public function setModule(\AppBundle\Entity\Core\Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \AppBundle\Entity\Core\\Module
     */
    public function getModule()
    {
        return $this->module;
    }

    /**
     * Set idModulePage
     *
     * @param integer $idModulePage
     *
     * @return NavigationItem
     */
    public function setIdModulePage($idModulePage)
    {
        $this->idModulePage = $idModulePage;

        return $this;
    }

    /**
     * Get idModulePage
     *
     * @return integer
     */
    public function getIdModulePage()
    {
        return $this->idModulePage;
    }

    /**
     * Set modulePage
     *
     * @param \AppBundle\Entity\Core\ModulePage $modulePage
     *
     * @return NavigationItem
     */
    public function setModulePage(\AppBundle\Entity\Core\ModulePage $modulePage = null)
    {
        $this->modulePage = $modulePage;

        return $this;
    }

    /**
     * Get modulePage
     *
     * @return \AppBundle\Entity\Core\ModulePage
     */
    public function getModulePage()
    {
        return $this->modulePage;
    }

    /**
     * Set idRoute
     *
     * @param integer $idRoute
     *
     * @return NavigationItem
     */
    public function setIdRoute($idRoute)
    {
        $this->idRoute = $idRoute;

        return $this;
    }

    /**
     * Get idRoute
     *
     * @return integer
     */
    public function getIdRoute()
    {
        return $this->idRoute;
    }

    /**
     * Set route
     *
     * @param \AppBundle\Entity\Core\Route $route
     *
     * @return NavigationItem
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
}
