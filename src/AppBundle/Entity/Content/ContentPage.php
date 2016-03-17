<?php

namespace AppBundle\Entity\Content;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;
use AppBundle\Entity\BaseEntity;


/**
 * ContentPage
 * 
 * @DescriptionObject("content_page", title="Content pages")
 *
 * @ORM\Table(name="content_pages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContentPageRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class ContentPage extends BaseEntity
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
     * @var string
     * 
     * @Description("action", title="Action", dataType="string")
     *
     * @ORM\Column(name="action", type="string", length=255, nullable=true)
     */
    private $action;
    
    
   /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */
    
    /**
     * @Description("content", title="Content", dataType="string",  property="content.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Entity\Content", inversedBy="contentPages")
     * @ORM\JoinColumn(name="entityCode", referencedColumnName="entityCode")
     */
    private $content;
    
    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\NavigationItem", mappedBy="contentPage")
     */
    private $navigationItems;
    
    /**
     * #################################################
     * #################  Не колонки  ##################
     * #################################################
     */
    
    private $contentType = 'action';
    
    
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
     * @return string
     */
    public function getContentType()
    {
        return $this->contentType;
    }
    
    
    /**
     * @return string
     */
    public function getEntityCode()
    {
        return $this->getContent()->getEntityCode();
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
     * @return ContentPage
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
     * Set action
     *
     * @param string $action
     *
     * @return ContentPage
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * Get action
     *
     * @return string
     */
    public function getAction()
    {
        
        return $this->action;
    }

    /**
     * Set content
     *
     * @param \AppBundle\Entity\Content $content
     *
     * @return ContentPage
     */
    public function setContent(\AppBundle\Entity\Content $content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return \AppBundle\Entity\Content
     */
    public function getContent()
    {
        return $this->content;
    }
    
    /**
     * Add navigationItem
     *
     * @param \AppBundle\Entity\Core\NavigationItem $navigationItem
     *
     * @return ContentPage
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
}
