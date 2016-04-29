<?php

namespace AppBundle\Entity\Shop;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;
use AppBundle\Model\MediaSubjectInterface;

use AppBundle\Entity\BaseEntity;

/**
 * @DescriptionObject("brends", title="Brends")
 *
 * @ORM\Table(name="brends")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BrendRepository")
 */
class Brend extends BaseEntity implements MediaSubjectInterface
{
    /**
     * @var integer $id
     *
     * @Description("id", title="Id", dataType="integer")
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $title
     *
     * @Description("title", title="Title", dataType="string")
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string $description
     *
     * @ORM\Column(name="description", type="text", unique=false, nullable=true)
     */
    private $description;

    /**
     * @var string $description
     *
     * @Description("shortDescription", title="Short description", dataType="string")
     *
     * @ORM\Column(name="short_description", type="text", unique=false, nullable=true)
     */
    private $shortDescription;
    
    /**
     * Связанный статус записи
     * 
     * @Description("media", title="Media", dataType="string",  property="media.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\MediaSubjectInterface", cascade={"persist"})
     */
    private $media;

    /**
     * @var string $website
     *
     * @Description("website", title="Website", dataType="string")
     * 
     * @Assert\Url(
     *  checkDNS = true,
     *  protocols = {"http", "https"}
     * )
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="brend", cascade={"persist"})
     */
    //protected $products;

    /**
     * Constructor
     */
    public function __construct()
    {
//        $this->product = new ArrayCollection();
    }

    public function __toString()
    {
        return $this ->getTitle();
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Brend
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
     * @return Brend
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
     * Set website
     *
     * @param string $website
     * @return Brend
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
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
        $media->setEntityCode('brend');
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
     * Get website
     *
     * @return string
     */
    public function getWebsite()
    {
        return $this->website;
    }

    
//    /**
//     * Add products
//     *
//     * @param Shop\CatalogBundle\Entity\Product $products
//     * @return Brend
//     */
//    public function addProduct(\Shop\CatalogBundle\Entity\Product $products)
//    {
//        $this->products[] = $products;
//
//        return $this;
//    }
//
//    /**
//     * Remove products
//     *
//     * @param Shop\CatalogBundle\Entity\Product $products
//     */
//    public function removeProduct(\Shop\CatalogBundle\Entity\Product $products)
//    {
//        $this->products->removeElement($products);
//    }
//
//    /**
//     * Get products
//     *
//     * @return Doctrine\Common\Collections\Collection
//     */
//    public function getProducts()
//    {
//        return $this->products;
//    }

    /**
     * Set short_description
     *
     * @param string $shortDescription
     * @return Brend
     */
    public function setShortDescription($shortDescription)
    {
        $this->shortDescription = $shortDescription;

        return $this;
    }

    /**
     * Get short_description
     *
     * @return string
     */
    public function getShortDescription()
    {
        return $this->shortDescription;
    }

    public function getSlug()
    {
        $path = $this->getRoutePath();
        if('' !== $path)
        {
            return $path;
        }
        return $this->getId();
    }
}