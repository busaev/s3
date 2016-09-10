<?php

namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;
use AppBundle\Entity\BaseEntity;


/**
 * ModulePage
 * 
 * @DescriptionObject("module_pages", title="Module pages")
 *
 * @ORM\Table(name="module_pages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModulePageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ModulePage extends BaseEntity
{
    
    
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
     *
     * @ORM\Column(name="entityCode", type="string", length=255, nullable=false)
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
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * @Description("module", title="Module", dataType="string",  property="module.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Core\Module", inversedBy="modulePages")
     * @ORM\JoinColumn(name="entityCode", referencedColumnName="entityCode")
     */
    private $module;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="modulePage")
     */
    private $navigationItems;
    
    /**
     * Связанный статус записи
     * 
     * @Description("actionType", title="Action type", dataType="string",  property="actionType.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $actionType;
    
    
    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */
    
    public function __construct()
    {
        $this->navigationItems = new ArrayCollection();
    }


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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * @return string
     */
    public function getEntityCode()
    {
        return $this->getModule()->getEntityCode();
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return ModulePage
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
     * Set module
     *
     * @param \AppBundle\Entity\Core\Module $module
     *
     * @return ModulePage
     */
    public function setModule(\AppBundle\Entity\Core\Module $module = null)
    {
        $this->module = $module;

        return $this;
    }

    /**
     * Get module
     *
     * @return \AppBundle\Entity\Module\Core
     */
    public function getModule()
    {
        return $this->module;
    }
    
    /**
     * Add navigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     *
     * @return ModulePage
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
     * Set entryStatus
     *
     * @param \AppBundle\Entity\Core\ScrollItem $actionType
     *
     */
    public function setActionType(\AppBundle\Entity\Core\ScrollItem $actionType = null)
    {
        $this->actionType = $actionType;

        return $this;
    }

    /**
     * Get entryStatus
     *
     * @return \AppBundle\Entity\Core\ScrollItem
     */
    public function getActionType()
    {
        return $this->actionType;
    }
}
