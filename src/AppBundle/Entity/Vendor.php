<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * @DescriptionObject("brends")
 *
 * @ORM\Table(name="vendors")
 * @ORM\Entity(repositoryClass="AppBundle\Entity\VendorRepository")
 */
class Vendor
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
     * @var string $path
     *
     * @Description("path", title="Path", dataType="string")
     *
     * @ORM\Column(name="path", type="string", length=255)
     */
    private $path;

    /**
     * @var boolean $disabled
     *
     * @ORM\Column(name="disabled", type="boolean", unique=false, nullable=true)
     */
    private $disabled;

    /**
     * @var string $website
     *
     * @Description("website", title="Website", dataType="string")
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     */
    private $website;

    /**
     * @ORM\OneToMany(targetEntity="Image", mappedBy="vendor", cascade={"persist"})
     */
    //protected $images;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="vendor", cascade={"persist"})
     */
    //protected $products;

    /**
     * Constructor
     */
    public function __construct()
    {
//        $this->images = new ArrayCollection();
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
     * @return Vendor
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
     * @return Vendor
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
     * Set path
     *
     * @param string $path
     * @return Vendor
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Vendor
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
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

    function getDisabled()
    {
        return $this->disabled;
    }

    function setDisabled($disabled)
    {
        $this->disabled = $disabled;
    }

    /**
     * Add images
     *
     * @param Shop\CatalogBundle\Entity\Image $images
     * @return Vendor
     */
    public function addImage(\Shop\CatalogBundle\Entity\Image $images)
    {
        $images->setVendor($this);
        $this->images[] = $images;

        return $this;
    }

    /**
     * Remove images
     *
     * @param Shop\CatalogBundle\Entity\Image $images
     */
    public function removeImage(\Shop\CatalogBundle\Entity\Image $images)
    {
        $this->images->removeElement($images);
    }

    /**
     * Get images
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Add products
     *
     * @param Shop\CatalogBundle\Entity\Product $products
     * @return Vendor
     */
    public function addProduct(\Shop\CatalogBundle\Entity\Product $products)
    {
        $this->products[] = $products;

        return $this;
    }

    /**
     * Remove products
     *
     * @param Shop\CatalogBundle\Entity\Product $products
     */
    public function removeProduct(\Shop\CatalogBundle\Entity\Product $products)
    {
        $this->products->removeElement($products);
    }

    /**
     * Get products
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * Set short_description
     *
     * @param string $shortDescription
     * @return Vendor
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
        $path = $this->getPath();
        if('' !== $path)
        {
            return $path;
        }
        return $this->getId();
    }
}
