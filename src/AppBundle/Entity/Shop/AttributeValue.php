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
 * @DescriptionObject("attribute_values", title="Значения свойств товаров")
 *
 * @ORM\Table(name="attribute_values")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Shop\AttributeValueRepository")
 */
class AttributeValue implements MediaSubjectInterface
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
     * @Description("position", title="Position", dataType="integer")
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;
    
    /**
     * @var integer
     * 
     *
     * @ORM\Column(name="attribute_id", type="integer", nullable=false)
     */
    private $attributeId = false;


    /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * Связанный статус записи
     * 
     * @Description("attribute", title="Attribute", dataType="string",  property="attribute.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Shop\Attribute", inversedBy="values")
     * @ORM\JoinColumn(name="attribute_id", referencedColumnName="id")
     */
    private $attribute;
    
    /**
     * Связанный статус записи
     * 
     * @Description("media", title="Media", dataType="image",  property="media.webPath")
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
    
    public function getAttributeId() {
        return $this->attributeId;
    }

    public function setAttributeId($attributeId) {
        $this->attributeId = $attributeId;
    }
    
    public function getAttribute() 
    {
        return $this->attribute;
    }

    public function setAttribute($attribute) 
    {
        $this->attribute = $attribute;        
    }
    
    /**
     * @deprecated since version now
     * @param \AppBundle\Entity\Shop\Attribute $attribute
     */
    public function addAttribute(Attribute $attribute)
    {
        if (!$this->attribute) {
            $this->attribute = $attribute;
        }
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
    
    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }


}
