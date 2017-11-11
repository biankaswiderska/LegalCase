<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="policeofficers")
*/

class Policeofficer {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=50)
  */
  private $name;

  /**
  * @ORM\Column(type="string", length=50)
  */
  private $surname;

  /**
  * @ORM\Column(type="datetime")
  */
  private $addDate;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
  * @ORM\ManyToMany(targetEntity="Policestation", inversedBy="policeofficers")
  * @ORM\JoinTable(name="policeofficers_policestations")
  */
  private $policestations;

  /**
  * @ORM\ManyToMany(targetEntity="Investigation", inversedBy="policeofficers")
  * @ORM\JoinTable(name="policeofficers_investigations")
  */
  private $investigations;


  /**
  * @ORM\Column(type="string", length=50)
  */
  private $ok;


  public function __construct() {
    $this->policestations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Policeofficer
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     *
     * @return Policeofficer
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     *
     * @return Policeofficer
     */
    public function setAddDate($addDate)
    {
        $this->addDate = $addDate;

        return $this;
    }

    /**
     * Get addDate
     *
     * @return \DateTime
     */
    public function getAddDate()
    {
        return $this->addDate;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Policeofficer
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
     * Set ok
     *
     * @param string $ok
     *
     * @return Policeofficer
     */
    public function setOk($ok)
    {
        $this->ok = $ok;

        return $this;
    }

    /**
     * Get ok
     *
     * @return string
     */
    public function getOk()
    {
        return $this->ok;
    }

    /**
     * Add policestation
     *
     * @param \MyBundle\Entity\Policestation $policestation
     *
     * @return Policeofficer
     */
    public function addPolicestation(\MyBundle\Entity\Policestation $policestation)
    {
        $this->policestations[] = $policestation;

        return $this;
    }

    /**
     * Remove policestation
     *
     * @param \MyBundle\Entity\Policestation $policestation
     */
    public function removePolicestation(\MyBundle\Entity\Policestation $policestation)
    {
        $this->policestations->removeElement($policestation);
    }

    /**
     * Get policestations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPolicestations()
    {
        return $this->policestations;
    }

    /**
     * Add investigation
     *
     * @param \MyBundle\Entity\Investigation $investigation
     *
     * @return Policeofficer
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
