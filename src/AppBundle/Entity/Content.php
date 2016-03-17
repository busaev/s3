<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

use AppBundle\Entity\Core\NavigationItem;

/**
 * Content
 *
 * @DescriptionObject("contents", title="Contents", description="Mega contents", actions={
 *   "backend": {
 *     "show": {
 *         "title": "Show",
 *         "icon": "fa-search",
 *         "route_name": "backend_content_entry_show",
 *         "params": {
 *             "id": "entityCode",
 *             "entityCode": "content"
 *         }
 *     },
 *     "edit": {
 *         "title": "Edit",
 *         "icon": "fa-pencil",
 *         "route_name": "backend_content_entry_edit",
 *         "params": {
 *             "id": "entityCode",
 *             "entityCode": "content"
 *         }
 *     },
 *     "history": {
 *         "title": "History",
 *         "icon": "fa-history",
 *         "route_name": "backend_content_entry_history",
 *         "params": {
 *             "id": "entityCode",
 *             "entityCode": "content"
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
 * @ORM\Table(name="contents")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContentRepository")
 */
class Content
{
    
    /**
     * #################################################
     * ###################  Колонки  ###################
     * #################################################
     */
    
    /**
     * @var string
     * 
     * @Description("entityCode", title="Content", dataType="string")
     * @ORM\Id
     * @ORM\Column(name="entityCode", type="string", length=255, unique=true, nullable=false)
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
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Content\ContentPage", mappedBy="content")
     */
    private $contentPages;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="content")
     */
    private $navigationItems;
    
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->contentPages     = new ArrayCollection();
        $this->navigationItems  = new ArrayCollection();
    }
    
    /**
     * @return string
     */
    public function __toString() 
    {
        $title = $this->getTitle();
        if(is_string($title))
            return $title;
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
     * @return Content
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
     * @return Content
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
     * Add contentPage
     *
     * @param \AppBundle\Entity\Contents\ContentPage $contentPage
     *
     * @return Content
     */
    public function addContentPage(\AppBundle\Entity\Content\ContentPage $contentPage)
    {
        $this->contentPages[] = $contentPage;

        return $this;
    }

    /**
     * Remove contentPage
     *
     * @param \AppBundle\Entity\Contents\ContentPage $contentPage
     */
    public function removeContentPage(\AppBundle\Entity\Content\ContentPage $contentPage)
    {
        $this->contentPages->removeElement($contentPage);
    }

    /**
     * Get contentPages
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getContentPages()
    {
        return $this->contentPages;
    }

    /**
     * Add navigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     *
     * @return Content
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
