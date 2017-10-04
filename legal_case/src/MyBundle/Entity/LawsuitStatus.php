<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="lawsuitStatuses")
*/

class LawsuitStatus {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $value;

  /**
  * @ORM\Column(type="string")
  */
  private $comment;

  /**
  * @ORM\OneToMany(targetEntity="Lawsuit", mappedBy="lawsuitStatus")
  */
  private $lawsuits;

  public function __construct() {
    $this->lawsuits = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set value
     *
     * @param string $value
     *
     * @return LawsuitStatus
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return LawsuitStatus
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Add lawsuit
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuit
     *
     * @return LawsuitStatus
     */
    public function addLawsuit(\MyBundle\Entity\Lawsuit $lawsuit)
    {
        $this->lawsuits[] = $lawsuit;

        return $this;
    }

    /**
     * Remove lawsuit
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuit
     */
    public function removeLawsuit(\MyBundle\Entity\Lawsuit $lawsuit)
    {
        $this->lawsuits->removeElement($lawsuit);
    }

    /**
     * Get lawsuits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuits()
    {
        return $this->lawsuits;
    }
}
