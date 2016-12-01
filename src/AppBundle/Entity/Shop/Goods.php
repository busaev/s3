<?php

namespace AppBundle\Entity\Shop;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;
use AppBundle\Model\MultimediaSubjectInterface;

use AppBundle\Entity\BaseEntity;

/**
 * @DescriptionObject("goods", title="Свойства товаров", description="Свойства товаров", actions={
 *   "backend": {
 *     "show": {
 *         "title": "Show",
 *         "icon": "fa-search",
 *         "route_name": "backend_module_entry_show",
 *         "params": {
 *             "id": "id",
 *             "entityCode": "goods"
 *         }
 *     },
 *     "edit": {
 *         "title": "Edit",
 *         "icon": "fa-pencil",
 *         "route_name": "backend_shop_goods_edit",
 *         "params": {
 *             "id": "id"
 *         }
 *     },
 *     "history": {
 *         "title": "History",
 *         "icon": "fa-history",
 *         "route_name": "backend_module_entry_history",
 *         "params": {
 *             "id": "id",
 *             "entityCode": "goods"
 *         }
 *     }
 *   },
 * })
 *
 * @ORM\Table(name="goods")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Shop\GoodsRepository")
 */
class Goods extends BaseEntity implements MultimediaSubjectInterface
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
     * @ORM\Column(name="content", type="text", unique=false, nullable=true)
     */
    private $content;
    
    /**
     * @var string $content
     *
     * @ORM\Column(name="article", type="string", unique=false, nullable=true)
     */
    private $article;    
    
    /**
     * @var string $price
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="price", type="decimal", precision=8, scale=2, unique=false, nullable=true)
     */
    private $price;
    
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id_brend", type="integer")
     */
    private $idBrend;
    
    /**
     * @var string
     *
     * @ORM\Column(name="entry_hash", type="string", length=255, unique=true, nullable=false)
     */
    private $entryHash=false;
    
    /**
     * @Assert\NotBlank()
     * 
     * @ORM\ManyToMany(targetEntity="Category", inversedBy="goods", cascade={"persist"})
     * @ORM\JoinTable(name="goods_categories",
     *  joinColumns={@ORM\JoinColumn(name="goods_id", referencedColumnName="id")},
     *  inverseJoinColumns={@ORM\JoinColumn(name="category_id", referencedColumnName="id")}
     * )
     */
    private $categories;

    
    /**
     * @Assert\NotBlank()
     * 
     * @ORM\ManyToOne(targetEntity="Brend", inversedBy="goods")
     * @ORM\JoinColumn(name="id_brend", referencedColumnName="id")
     */
    private $brend;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->categories = new ArrayCollection();
    }

    public function __toString()
    {
        return $this ->getTitle();
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
     * Set article
     *
     * @param string $article
     *
     * @return Goods
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return string
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Goods
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Add category
     *
     * @param \Yoda\UserBundle\Entity\User $category
     *
     * @return Goods
     */
    public function addCategory(\Yoda\UserBundle\Entity\User $category)
    {
        $this->categories[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Yoda\UserBundle\Entity\User $category
     */
    public function removeCategory(\Yoda\UserBundle\Entity\User $category)
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
     * Set idBrend
     *
     * @param integer $idBrend
     *
     * @return Goods
     */
    public function setIdBrend($idBrend)
    {
        $this->idBrend = $idBrend;

        return $this;
    }

    /**
     * Get idBrend
     *
     * @return integer
     */
    public function getIdBrend()
    {
        return $this->idBrend;
    }

    /**
     * Set brend
     *
     * @param \AppBundle\Entity\Shop\Brend $brend
     *
     * @return Goods
     */
    public function setBrend(\AppBundle\Entity\Shop\Brend $brend = null)
    {
        $this->brend = $brend;

        return $this;
    }

    /**
     * Get brend
     *
     * @return \AppBundle\Entity\Shop\Brend
     */
    public function getBrend()
    {
        return $this->brend;
    }


    /**
     * Get viewType
     *
     * @return \AppBundle\Entity\Core\Multimedia
     */
    public function getMedia()
    {
        return $this->media;
    }

    /**
     * Add medium
     *
     * @param \AppBundle\Entity\Core\Multimedia $medium
     *
     * @return Goods
     */
    public function addMedia(\AppBundle\Entity\Core\Multimedia $medium)
    {
        $this->media[] = $medium;

        return $this;
    }

    /**
     * Remove medium
     *
     * @param \AppBundle\Entity\Core\Multimedia $medium
     */
    public function removeMedia(\AppBundle\Entity\Core\Multimedia $medium)
    {
        $this->media->removeElement($medium);
    }
    
    public function getEntryHash()
    {
        return md5($this->getEntityCode() . $this->getId());
    }
}
