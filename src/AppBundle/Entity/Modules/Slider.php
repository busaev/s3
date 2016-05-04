<?php

namespace AppBundle\Entity\Modules;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * Slider
 *
 * @ORM\Table(name="sliders")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Modules\SliderRepository")
 */
class Slider
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @ORM\OneToMany(targetEntity="Slide", mappedBy="slider", cascade={"persist"})
     */
    private $slides;
    
    /**
     * Связанный статус записи
     * 
     * @Description("entryStatus", title="Entry status", dataType="string",  property="entryStatus.title")
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $entryStatus;
    

    public function __construct() 
    {
        
        $this -> slides = new ArrayCollection();
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
     * @return Slider
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
     * Add slides
     *
     * @return Slider
     */
    public function addSlide(\AppBundle\Entity\Modules\Slide $slide)
    {
        $slide->addSlider($this);

        $this->slides->add($slide);

        return $this;
    }

    /**
     * Remove slides
     *
     * @param \Module\SliderBundle\Entity\Slide $slide
     */
    public function removeSlide(\AppBundle\Entity\Modules\Slide $slide)
    {
        $this->slides->removeElement($slide);
    }

    /**
     * Get slides
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSlides()
    {
        return $this->slides;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Slider
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
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
}
