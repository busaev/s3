<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use AppBundle\Annotations\Description;
use AppBundle\Annotations\DescriptionObject;
use AppBundle\Model\ScrollItemSubjectInterface;

/**
 * ScrollItem
 *
 * @DescriptionObject("scroll items", title="Scroll items")
 *
 * @ORM\Table(name="scroll_item")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ScrollItemRepository")
 */
class ScrollItem implements ScrollItemSubjectInterface
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
     * @ORM\Column(name="id_scroll", type="integer")
     */
    private $idScroll;

    /**
     * @var string
     *
     * @Description("code", title="Code", dataType="string")
     *
     * @ORM\Column(name="code", type="string", length=255)
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
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @Description("scroll", title="Scroll", dataType="string")
     *
     * @ORM\ManyToOne(targetEntity="Scroll", inversedBy="items")
     * @ORM\JoinColumn(name="id_scroll", referencedColumnName="id")
     */
    private $scroll;

    public function __toString() {
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
     * Set idScroll
     *
     * @param integer $idScroll
     *
     * @return ListItems
     */
    public function setIdScroll($idScroll)
    {
        $this->idScroll = $idScroll;

        return $this;
    }

    /**
     * Get idScroll
     *
     * @return int
     */
    public function getIdScroll()
    {
        return $this->idScroll;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return ListItems
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
     * @return ListItems
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
     * @return ListItems
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
     * Set scroll
     *
     * @param \AppBundle\Entity\Scroll $scroll
     *
     * @return ScrollItem
     */
    public function setScroll(\AppBundle\Entity\Scroll $scroll = null)
    {
        $this->scroll = $scroll;

        return $this;
    }

    /**
     * Get scroll
     *
     * @return \AppBundle\Entity\Scroll
     */
    public function getScroll()
    {
        return $this->scroll;
    }
}
