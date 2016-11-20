<?php

namespace AppBundle\Entity\Slider;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Model\MediaSubjectInterface;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Slide
 *
 * @ORM\Table(name="slides")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\Modules\SlideRepository")
 */
class Slide implements MediaSubjectInterface
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
     * Связанный статус записи
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\MediaSubjectInterface", cascade={"persist"})
     */
    private $media;
    
    /**
     * Связанный статус записи
     * 
     * @ORM\ManyToOne(targetEntity="\AppBundle\Model\ScrollItemSubjectInterface")
     */
    private $entryStatus;
    

    /**
     * @ORM\ManyToOne(targetEntity="Slider", inversedBy="slides")
     * @ORM\JoinColumn(name="slider_id", referencedColumnName="id")
     */
    private $slider;

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
     * Set slider
     *
     * @param \Module\SliderBundle\Entity\Slider $slider
     * @return Slide
     */
    public function setSlider(\AppBundle\Entity\Slider\Slider $slider = null)
    {
        $this->slider = $slider;

        return $this;
    }

    /**
     * Get slider
     *
     * @return \Module\SliderBundle\Entity\Slider 
     */
    public function getSlider()
    {
        return $this->slider;
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
     * Set viewType
     *
     * @param \AppBundle\Entity\Core\Media $Media
     *
     * @return Attribute
     */
    public function setMedia(\AppBundle\Entity\Core\Media $media = null)
    {
        $media->setEntityCode('slide');
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
}
