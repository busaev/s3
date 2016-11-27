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
 * @DescriptionObject("categories", title="Categories")
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Shop\CategoryRepository")
 */
class Category extends BaseEntity implements MediaSubjectInterface
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
     * @var string $content
     *
     * @Description("shortContent", title="Short content", dataType="string")
     *
     * @ORM\Column(name="short_content", type="text", unique=false, nullable=true)
     */
    private $shortContent;

    /**
     * @var string $content
     *
     * @ORM\Column(name="content", type="text", unique=false, nullable=true)
     */
    private $content;

    /**
     * @var 
     *
     * @ORM\Column(name="category_id", type="integer", nullable=true)
     */
    private $categoryId = false;
    
    /**
     * Связанный статус записи
     *
     * @Description("media", title="Media", dataType="image",  property="media.webPath")
     *
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\MediaSubjectInterface", cascade={"persist"})
     */
    private $media;

    /**
     * @ORM\ManyToMany(targetEntity="Goods", mappedBy="categories", cascade={"persist"})
     */
    private $goods;

    /**
     * @ORM\OneToMany(targetEntity="Category", mappedBy="parentCategory", cascade={"persist"})
     */
    private $categories;

    /**
     * @ORM\ManyToOne(targetEntity="Category", inversedBy="categories")
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    protected $parentCategory;

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
        $this->categories = new ArrayCollection();
        $this->goods = new ArrayCollection();
    }

    public function __toString()
    {
        return $this ->getTitle();
    }
    
    public function toStringWithParent()
    {
        $prepend = '';
        
        $parent = $this->getParentCategory();
        if($parent instanceof Category) {
            $prepend = $parent->getTitle() . ' / ';
        }
        
        return $prepend.$this->getTitle();
    }

    /**
     *
     * @return string
     */
    public function getSlug()
    {
        $path = $this->getRoutePath();
        if('' !== $path)
        {
            return $path;
        }
        return $this->getId();
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
     * Set short_content
     *
     * @param string $shortContent
     * @return Brend
     */
    public function setShortContent($shortContent)
    {
        $this->shortContent = $shortContent;

        return $this;
    }

    /**
     * Get short_content
     *
     * @return string
     */
    public function getShortContent()
    {
        return $this->shortContent;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Brend
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * Set viewType
     *
     * @param \AppBundle\Entity\Core\Media $media
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
     * @return int
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param int $categoryId
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     * Add category
     *
     * @param \AppBundle\Entity\Shop\Category $category
     *
     * @return Category
     */
    public function addCategory(\AppBundle\Entity\Shop\Category $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \AppBundle\Entity\Shop\Category $category
     */
    public function removeCategory(\AppBundle\Entity\Shop\Category $category)
    {
        $this->categories->removeElement($category);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Set parentCategory
     *
     * @param \AppBundle\Entity\Shop\Category $parentCategory
     *
     * @return Category
     */
    public function setParentCategory(\AppBundle\Entity\Shop\Category $parentCategory = null)
    {
        $this->parentCategory = $parentCategory;

        return $this;
    }

    /**
     * Get parentCategory
     *
     * @return \AppBundle\Entity\Shop\Category
     */
    public function getParentCategory()
    {
        return $this->parentCategory;
    }

    /**
     * Add good
     *
     * @param \AppBundle\Entity\Shop\Goods $good
     *
     * @return Category
     */
    public function addGood(\AppBundle\Entity\Shop\Goods $good)
    {
        $good->addCategory($this);
        $this->goods[] = $good;

        return $this;
    }

    /**
     * Remove good
     *
     * @param \AppBundle\Entity\Shop\Goods $good
     */
    public function removeGood(\AppBundle\Entity\Shop\Goods $good)
    {
        $this->goods->removeElement($good);
    }

    /**
     * Get goods
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGoods()
    {
        return $this->goods;
    }
}
