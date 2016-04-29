<?php

namespace AppBundle\Entity\Shop;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;
use AppBundle\Model\MediaSubjectInterface;

/**
 * Атрибуты товаров
 * 
 * @DescriptionObject("attribute", title="Свойства товаров")
 *
 * @ORM\Table(name="attributes")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Shop\AttributeRepository")
 */
class Attribute implements MediaSubjectInterface
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
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    private $icon;

    /**
     * @var bool
     * 
     * @Description("inPreview", title="Show in preview", dataType="boolean")
     *
     * @ORM\Column(name="in_preview", type="boolean")
     */
    private $inPreview;

    /**
     * @var bool
     * 
     * @Description("inFilters", title="Show in filters", dataType="boolean")
     *
     * @ORM\Column(name="in_filters", type="boolean")
     */
    private $inFilters;

    /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * Связанный статус записи
     * 
     * @Description("entryStatus", title="Entry status", dataType="string",  property="entryStatus.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $entryStatus;
    
    
    
    /**
     * Тип товара
     * 
     * @Description("productType", title="Product type", dataType="string",  property="productType.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $productType;
    
    
    
    /**
     * Связанный статус записи
     * 
     * @Description("dataType", title="Data type", dataType="string",  property="dataType.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $dataType;
    
    
    
    /**
     * Связанный статус записи
     * 
     * @Description("viewType", title="View type", dataType="string",  property="viewType.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $viewType;
    
    /**
     * Связанный статус записи
     * 
     * @Description("media", title="Media", dataType="string",  property="media.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\MediaSubjectInterface", cascade={"persist"})
     */
    private $media;
    
    /**
     * 
     */
    public function __construct() 
    {
    }


    public function __toString()
    {
        return $this->getTitle();
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
     * Set title
     *
     * @param string $title
     *
     * @return Attribute
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
     * Set description
     *
     * @param string $description
     *
     * @return Attribute
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set icon
     *
     * @param string $icon
     *
     * @return Attribute
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }
    
    /**
     * Set inPreview
     *
     * @param boolean $inPreview
     *
     * @return Attribute
     */
    public function setInPreview($inPreview)
    {
        $this->inPreview = $inPreview;

        return $this;
    }

    /**
     * Get inPreview
     *
     * @return bool
     */
    public function getInPreview()
    {
        return $this->inPreview;
    }

    /**
     * Set inFilters
     *
     * @param boolean $inFilters
     *
     * @return Attribute
     */
    public function setInFilters($inFilters)
    {
        $this->inFilters = $inFilters;

        return $this;
    }

    /**
     * Get inFilters
     *
     * @return bool
     */
    public function getInFilters()
    {
        return $this->inFilters;
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
     * Set dataType
     *
     * @param \AppBundle\Entity\Core\ScrollItem $dataType
     *
     * @return Attribute
     */
    public function setDataType(\AppBundle\Entity\Core\ScrollItem $dataType = null)
    {
        $this->dataType = $dataType;

        return $this;
    }

    /**
     * Get dataType
     *
     * @return \AppBundle\Entity\Core\ScrollItem
     */
    public function getDataType()
    {
        return $this->dataType;
    }

    /**
     * Set viewType
     *
     * @param \AppBundle\Entity\Core\ScrollItem $viewType
     *
     * @return Attribute
     */
    public function setViewType(\AppBundle\Entity\Core\ScrollItem $viewType = null)
    {
        $this->viewType = $viewType;

        return $this;
    }

    /**
     * Get viewType
     *
     * @return \AppBundle\Entity\Core\ScrollItem
     */
    public function getViewType()
    {
        return $this->viewType;
    }
    
    /**
     * Set viewType
     *
     * @param \AppBundle\Entity\Core\Media $Media
     *
     * @return Attribute
     */
    public function setMedia(\AppBundle\Entity\Core\Media $media = null)
    {
        
        $media->setEntityCode('attribute');
        $this->media = $media;

        return $this;
    }

    /**
     * Get viewType
     *
     * @return \AppBundle\Entity\Core\Media
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Set productType
     *
     * @param \AppBundle\Entity\Core\ScrollItem $productType
     *
     * @return Attribute
     */
    public function setProductType(\AppBundle\Entity\Core\ScrollItem $productType = null)
    {
        $this->productType = $productType;

        return $this;
    }

    /**
     * Get productType
     *
     * @return \AppBundle\Entity\Core\ScrollItem
     */
    public function getProductType()
    {
        return $this->productType;
    }
}
