<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * Module
 *
 * @DescriptionObject("modules", title="Modules")
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
     * @Description("entity", title="Entity", dataType="string")
     *
     * @ORM\Column(name="entity", type="string", length=255, unique=true)
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
     * @ORM\OneToMany(targetEntity="ModulePages", mappedBy="module")
     */
    private $modulePages;

    
    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    public function __toString() {
        $title = $this->getTitle();
        if(is_string($title))
            return $title;
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
     * Constructor
     */
    public function __construct()
    {
        $this->modulePages = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add modulePage
     *
     * @param \AppBundle\Entity\ModulePages $modulePage
     *
     * @return Module
     */
    public function addModulePage(\AppBundle\Entity\ModulePages $modulePage)
    {
        $this->modulePages[] = $modulePage;

        return $this;
    }

    /**
     * Remove modulePage
     *
     * @param \AppBundle\Entity\ModulePages $modulePage
     */
    public function removeModulePage(\AppBundle\Entity\ModulePages $modulePage)
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
}
