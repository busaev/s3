<?php

namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

use AppBundle\Entity\Core\NavigationItem;

/**
 * Module
 *
 * @DescriptionObject("module", title="Modules", description="Mega modules", actions={
 *   "backend": {
 *     "show": {
 *         "title": "Show",
 *         "icon": "fa-search",
 *         "route_name": "backend_module_entry_show",
 *         "params": {
 *             "id": "entityCode",
 *             "entityCode": "module"
 *         }
 *     },
 *     "edit": {
 *         "title": "Edit",
 *         "icon": "fa-pencil",
 *         "route_name": "backend_module_entry_edit",
 *         "params": {
 *             "id": "entityCode",
 *             "entityCode": "module"
 *         }
 *     },
 *     "history": {
 *         "title": "History",
 *         "icon": "fa-history",
 *         "route_name": "backend_module_entry_history",
 *         "params": {
 *             "id": "entityCode",
 *             "entityCode": "module"
 *         }
 *     }
 *   },
 *   "frontend": {
 *     "add": {
 *         "route_name": "module_show",
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
     * @Description("entityCode", title="Module", dataType="string")
     * @ORM\Id
     * @ORM\Column(name="entity_code", type="string", length=255, unique=true, nullable=false)
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
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\ModulePage", mappedBy="module")
     */
    private $modulePages;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="module")
     */
    private $navigationItems;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->modulePages      = new ArrayCollection();
        $this->navigationItems  = new ArrayCollection();
    }
    
    /**
     * @return string
     */
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
     * @return string
     */
    public function getId()
    {
        return $this->getEntityCode();
    }


    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    /**
     * Set entity
     *
     * @param string $entityCode
     *
     * @return Module
     */
    public function setEntityCode($entityCode)
    {
        $this->entityCode = $entityCode;

        return $this;
    }

    /**
     * Get entityCode
     *
     * @return string
     */
    public function getEntityCode()
    {
        return $this->entityCode;
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
     * @param \AppBundle\Entity\Core\ScrollItem $entryStatus
     *
     * @return News
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

    /**
     * Add modulePage
     *
     * @param \AppBundle\Entity\Core\ModulePage $modulePage
     *
     * @return Module
     */
    public function addModulePage(\AppBundle\Entity\Core\ModulePage $modulePage)
    {
        $this->modulePages[] = $modulePage;

        return $this;
    }

    /**
     * Remove modulePage
     *
     * @param \AppBundle\Entity\Core\ModulePage $modulePage
     */
    public function removeModulePage(\AppBundle\Entity\Core\ModulePage $modulePage)
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
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     *
     * @return Module
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
}
