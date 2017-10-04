<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="investigationStatuses")
*/

class InvestigationStatus {

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
  * @ORM\OneToMany(targetEntity="Investigation", mappedBy="investigationStatus")
  */
  private $investigations;

  public function __construct() {
    $this->investigations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return InvestigationStatus
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
     * @return InvestigationStatus
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
     * Add investigation
     *
     * @param \MyBundle\Entity\Investigation $investigation
     *
     * @return InvestigationStatus
     */
    public function addInvestigation(\MyBundle\Entity\Investigation $investigation)
    {
        $this->investigations[] = $investigation;

        return $this;
    }

    /**
     * Remove investigation
     *
     * @param \MyBundle\Entity\Investigation $investigation
     */
    public function removeInvestigation(\MyBundle\Entity\Investigation $investigation)
    {
        $this->investigations->removeElement($investigation);
    }

    /**
     * Get investigations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvestigations()
    {
        return $this->investigations;
    }
}
