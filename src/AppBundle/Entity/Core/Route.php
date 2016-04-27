<?php
namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Route
 *
 * @ORM\Table(name="routes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RouteRepository")
 */
class Route
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;   
    
    /**
     * @var string
     *
     * @ORM\Column(name="entity_code", type="string", length=255, nullable=true)
     */
    private $entityCode;

    /**
     * @var string
     *
     * @ORM\Column(name="route_path", type="string", length=255, unique=false)
     */
    private $routePath;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;
    
    
    /**
     * Говорит нам о том, к какому типу принадлежит путь - просмотр контента или 
     * какой-то экшн контроллера
     * 
     * @var string
     *
     * @ORM\Column(name="action_type", type="string", length=255, nullable=false)
     */
    private $actionType="show"; // show|index|...
    
    /**
     * @var int
     *
     * @ORM\Column(name="entryId", type="integer", nullable=true)
     */
    private $entryId;
    
    /**
     * Флаг, показывает, является ли маршрут "страницей" Содержания (Модуля)
     * 
     * @var boolean
     *
     * @ORM\Column(name="content_page", type="boolean", nullable=false)
     */
    private $contentPage = false;
    
    /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="route")
     */
    private $navigationItems;
    
    
    public function __construct()
    {
        $this->navigationItems = new ArrayCollection;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getRoutePath();
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
     * Set controller
     *
     * @param string $action
     *
     * @return Route
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
    public function getAction()
    {
        return $this->action;
    }

    /**
     * Set entryId
     *
     * @param integer $entryId
     *
     * @return Route
     */
    public function setEntryId($entryId)
    {
        $this->entryId = $entryId;

        return $this;
    }

    /**
     * Get entryId
     *
     * @return integer
     */
    public function getEntryId()
    {
        return $this->entryId;
    }

    /**
     * Set contentType
     *
     * @param string $actionType
     *
     * @return Route
     */
    public function setActionType($actionType)
    {
        $this->actionType = $actionType;

        return $this;
    }

    /**
     * Get contentType
     *
     * @return string
     */
    public function getActionType()
    {
        return $this->actionType;
    }

    /**
     * Add navigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     *
     * @return Route
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

    /**
     * Set entityCode
     *
     * @param string $entityCode
     *
     * @return Route
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
     * Set contentPage
     *
     * @param boolean $contentPage
     *
     * @return Route
     */
    public function setContentPage($contentPage)
    {
        $this->contentPage = $contentPage;

        return $this;
    }

    /**
     * Get contentPage
     *
     * @return boolean
     */
    public function getContentPage()
    {
        return $this->contentPage;
    }
}
