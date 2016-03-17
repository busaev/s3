<?php

namespace AppBundle\Entity\Core;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;

/**
 * @DescriptionObject("scrolls", title="Scrolls")
 *
 * @ORM\Table(name="scroll")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScrollRepository")
 */
class Scroll
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
     * @Description("code", title="Code", dataType="string")
     *
     * @ORM\Column(name="code", type="string", length=255, unique=true)
     */
    private $code;

    /**
     * @var string
     *
     * @Description("title", title="Title", dataType="string")
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var int
     *
     * @Description("position", title="Position", dataType="integer")
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;
    
    /**
     * #################################################
     * ####################  Связи  ####################
     * #################################################
     */

    /**
     * @ORM\OneToMany(targetEntity="\AppBundle\Entity\Core\ScrollItem", mappedBy="scroll")
     */
    private $items;
    
    /**
     * #################################################
     * #############  Gettrs and Setters  ##############
     * #################################################
     */

    public function __construct() 
    {
        $this->items = new ArrayCollection();
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
     * Set code
     *
     * @param string $code
     *
     * @return List
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
     * Set title
     *
     * @param string $title
     *
     * @return List
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
     * Set position
     *
     * @param integer $position
     *
     * @return List
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Add item
     *
     * @param \AppBundle\Entity\Core\ScrollItem $item
     *
     * @return Scroll
     */
    public function addItem(\AppBundle\Entity\Core\ScrollItem $item)
    {
        $this->items[] = $item;

        return $this;
    }

    /**
     * Remove item
     *
     * @param \AppBundle\Entity\Core\ScrollItem $item
     */
    public function removeItem(\AppBundle\Entity\Core\ScrollItem $item)
    {
        $this->items->removeElement($item);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItems()
    {
        return $this->items;
    }
}
