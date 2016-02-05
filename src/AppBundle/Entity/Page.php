<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Entity\ContentBaseEntity;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;


/**
 * AppBundle\Entity\Page
 * 
 * @ORM\Table(name="pages")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PageRepository")
 */
class Page extends ContentBaseEntity
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
     *
     * @var string $title
     * 
     * @Description("title", title="Title", dataType="string")
     * 
     * @ORM\Column(name="title", type="string", unique=false, nullable=true, length=255)
     * 
     */
    private $title;
        
    /**
     * @var string $content
     * 
     * @ORM\Column(name="content", type="text", unique=false, nullable=true)
     * 
     */
    private $content;
    
    
    /**
     * 
     */
    public function __construct()
    {
    }
    
    public function __toString() {
        $title = $this->getTitle();
        if(is_string($title))
            return $title;
        return '';
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
     * @return News
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
     * @return News
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
}
