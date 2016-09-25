<?php
namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Entity\BaseEntity;

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
     * @ORM\Column(name="path", type="string", length=255, unique=false)
     */
    private $path;

    /**
     * @var string
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;
    
    /**
     * @var int
     *
     * @ORM\Column(name="entity_code", type="string", nullable=false)
     */
    private $entityCode;
    
    /**
     * @var int
     *
     * @ORM\Column(name="entry_id", type="integer", nullable=true)
     */
    private $entryId;
    
    /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="route")
     */
    private $navigationItems;
    
    /**
     * @var BaseEntity
     *
     * ССылка на объект сущности
     */
    private $entity;
    
    
    
    public function __construct()
    {
        $this->navigationItems = new ArrayCollection;
    }

    /**
     * @return string
     */
    public function __toString() {
        return $this->getPath();
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
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get route
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
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
     * Set entityCode
     *
     * @param integer $entityCode
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
     * @return integer
     */
    public function getEntityCode()
    {
        return $this->entityCode;
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
}
