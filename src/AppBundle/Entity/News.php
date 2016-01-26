<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;


/**
 * AppBundle\Entity\News
 * 
 * @DescriptionObject("news", title="News")
 * 
 * @ORM\Table(name="news")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NewsRepository")
 */
class News
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
     *
     * @var string $short_content
     * 
     * @Description("shortContent", title="Short content", dataType="string")
     * 
     * @ORM\Column(name="short_content", type="text", unique=false, nullable=true)
     * 
     */
    private $shortContent;
    
    /**
     * @var string $content
     * 
     * @ORM\Column(name="content", type="text", unique=false, nullable=true)
     * 
     */
    private $content;
    
    /**
     * @Description("entryStatus", title="Entry status", dataType="string",  property="entryStatus.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $entryStatus;
    
    /**
     * @Description("seo", title="Seo", dataType="string",  property="seo.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\SeoSubjectInterface")
     */
    private $seo;
    

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
     * Set short_content
     *
     * @param string $short_content
     * @return News
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
}
