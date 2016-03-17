<?php

namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

use AppBundle\Entity\Core\NavigationItem;

/**
 * Navigation
 * 
 * @DescriptionObject("navigation", title="Navigation")
 *
 * @ORM\Table(name="navigations")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NavigationRepository")
 */
class Navigation
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
     * @Description("Code", title="Code", dataType="string")
     *
     * @ORM\Column(name="code", type="string", length=255, nullable=true)
     */
    private $code;
    
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
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="navigation")
     */
    private $navigationItems;


    /**
     * 
     */
    public function __construct() 
    {
        $this->navigationItems = new ArrayCollection();
    }

    public function __toString() {
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
     * Set title
     *
     * @param string $title
     *
     * @return Navigation
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
     * @return BaseEntity
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
     * Add navigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     *
     * @return Navigation
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
     * Set code
     *
     * @param string $code
     *
     * @return Navigation
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }
}
