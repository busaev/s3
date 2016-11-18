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
     * @var int
     *
     * @ORM\Column(name="entity_code", type="string", nullable=false)
     */
    //private $entityCode;

    /**
     * @var string
     *
     * @ORM\Column(name="module_page_id", type="integer", nullable=false, unique=false)
     */
    private $modulePageId;
    
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
     * @var BaseEntity
     *
     * Ссылка на объект сущности
     */
    private $entity;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="route")
     */
    private $navigationItems;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Core\ModulePage", inversedBy="routes")
     * @ORM\JoinColumn(name="module_page_id", referencedColumnName="id")
     */
    private $modulePage;
    
    
    
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
     * @param string $modulePageId
     *
     * @return Route
     */
    public function setModulePageId($modulePageId)
    {
        $this->modulePageId = $modulePageId;

        return $this;
    }

    /**
     * Get modulePageId
     *
     * @return string
     */
    public function getModulePageId()
    {
        return $this->modulePageId;
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
//    public function setEntityCode($entityCode)
//    {
//        $this->entityCode = $entityCode;
//
//        return $this;
//    }

    /**
     * Get entityCode
     *
     * @return integer
     */
//    public function getEntityCode()
//    {
//        return $this->entityCode;
//    }

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

    public function getModulePage() {
        return $this->modulePage;
    }

    public function setModulePage($modulePage) {
        $this->modulePage = $modulePage;
    }


    
    
}
