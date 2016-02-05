<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Annotations\Description;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * NavigationItem
 *
 * @ORM\Table(name="navigation_item")
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
     * @ORM\Column(name="idNavigation", type="integer")
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
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

     /**
     * @var string
     * 
     * @Description("title", title="Title", dataType="string")
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="routePath", type="string", length=255, nullable=true)
     */
    private $routePath;

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
            return $title;
        return '';
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
     * Set routePath
     *
     * @param string $routePath
     *
     * @return NavigationItem
     */
    public function setRoutePath($routePath)
    {
        $this->routePath = $routePath;

        return $this;
    }

    /**
     * Get routePath
     *
     * @return string
     */
    public function getRoutePath()
    {
        return $this->routePath;
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
     * @param \AppBundle\Entity\Navigation $navigation
     *
     * @return NavigationItem
     */
    public function setNavigation(\AppBundle\Entity\Navigation $navigation = null)
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
     * @param \AppBundle\Entity\NavigationItem $parentNavigationItem
     *
     * @return NavigationItem
     */
    public function setParentNavigationItem(\AppBundle\Entity\NavigationItem $parentNavigationItem = null)
    {
        $this->parentNavigationItem = $parentNavigationItem;

        return $this;
    }

    /**
     * Get parentNavigationItem
     *
     * @return \AppBundle\Entity\NavigationItem
     */
    public function getParentNavigationItem()
    {
        return $this->parentNavigationItem;
    }

    /**
     * Add childrenNavigationItem
     *
     * @param \AppBundle\Entity\NavigationItem $childrenNavigationItem
     *
     * @return NavigationItem
     */
    public function addChildrenNavigationItem(\AppBundle\Entity\NavigationItem $childrenNavigationItem)
    {
        $this->childrenNavigationItems[] = $childrenNavigationItem;

        return $this;
    }

    /**
     * Remove childrenNavigationItem
     *
     * @param \AppBundle\Entity\NavigationItem $childrenNavigationItem
     */
    public function removeChildrenNavigationItem(\AppBundle\Entity\NavigationItem $childrenNavigationItem)
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
     * @param \AppBundle\Entity\ScrollItem $entryStatus
     *
     * @return NavigationItem
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
}
