<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * Module
 *
 * @DescriptionObject("modules", title="Modules", description="Mega modules", actions={
 *   "backend": {
 *     "show": {
 *         "title": "Show",
 *         "icon": "fa-search",
 *         "route_name": "backend_content_entry_show",
 *         "params": {
 *             "id": "entity",
 *             "entityCode": "module"
 *         }
 *     },
 *     "edit": {
 *         "title": "Edit",
 *         "icon": "fa-pencil",
 *         "route_name": "backend_content_entry_edit",
 *         "params": {
 *             "id": "entity",
 *             "entityCode": "module"
 *         }
 *     },
 *     "history": {
 *         "title": "History",
 *         "icon": "fa-history",
 *         "route_name": "backend_content_entry_history",
 *         "params": {
 *             "id": "entity",
 *             "entityCode": "module"
 *         }
 *     }
 *   },
 *   "frontend": {
 *     "add": {
 *         "route_name": "news_show",
 *         "params": {
 *             "id": "id"
 *         }
 *     }
 *   }
 * })
 * 
 * @ORM\Table(name="modules")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModuleRepository")
 */
class Module
{
    
    /**
     * #################################################
     * ###################  Колонки  ###################
     * #################################################
     */
    
    /**
     * @var string
     * 
     * @Description("entity", title="Entity", dataType="string")
     * @ORM\Id
     * @ORM\Column(name="entity", type="string", length=255, unique=true, nullable=false)
     */
    private $entity;

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
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Content\ModulePage", mappedBy="module")
     */
    private $modulePages;
    
    /**
     * @ORM\OneToMany(targetEntity="NavigationItem", mappedBy="module")
     */
    private $navigationItems;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modulePages     = new ArrayCollection();
        $this->navigationItems = new ArrayCollection();
    }
    
    public function __toString() {
        $title = $this->getTitle();
        if(is_string($title))
            return $title;
        return '';
    }
    
    public function getId()
    {
        return $this->getEntity();
    }



    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    /**
     * Set entity
     *
     * @param string $entity
     *
     * @return Module
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
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
     * Set title
     *
     * @param string $title
     *
     * @return Module
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
     * Add modulePage
     *
     * @param \AppBundle\Entity\Modules\ModulePage $modulePage
     *
     * @return Module
     */
    public function addModulePage(\AppBundle\Entity\Content\ModulePage $modulePage)
    {
        $this->modulePages[] = $modulePage;

        return $this;
    }

    /**
     * Remove modulePage
     *
     * @param \AppBundle\Entity\Modules\ModulePage $modulePage
     */
    public function removeModulePage(\AppBundle\Entity\Content\ModulePage $modulePage)
    {
        $this->modulePages->removeElement($modulePage);
    }

    /**
     * Get modulePages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getModulePages()
    {
        return $this->modulePages;
    }

    /**
     * Add navigationItem
     *
     * @param \AppBundle\Entity\NavigationItem $navigationItem
     *
     * @return Module
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
