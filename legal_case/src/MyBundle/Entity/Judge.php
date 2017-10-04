<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="judges")
*/

class Judge {

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
  * @ORM\ManyToMany(targetEntity="Court", inversedBy="judges")
  * @ORM\JoinTable(name="judges_courts")
  */
  private $courts;

  /**
  * @ORM\OneToMany(targetEntity="Lawsuit", mappedBy="caseConnJudge")
  */
  private $lawsuitCaseConn;

  /**
  * @ORM\OneToMany(targetEntity="Lawsuit", mappedBy="verdictJudge")
  */
  private $lawsuitVerdict;

  public function __construct() {
    $this->courts = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitCaseConn = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitVerdict= new \Doctrine\Common\Collections\ArrayCollection();

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
     * @return Judge
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
     * @return Judge
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
     * @return Judge
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
     * @return Judge
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
     * Add court
     *
     * @param \MyBundle\Entity\Court $court
     *
     * @return Judge
     */
    public function addCourt(\MyBundle\Entity\Court $court)
    {
        $this->courts[] = $court;

        return $this;
    }

    /**
     * Remove court
     *
     * @param \MyBundle\Entity\Court $court
     */
    public function removeCourt(\MyBundle\Entity\Court $court)
    {
        $this->courts->removeElement($court);
    }

    /**
     * Get courts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourts()
    {
        return $this->courts;
    }

    /**
     * Add lawsuitCaseConn
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitCaseConn
     *
     * @return Judge
     */
    public function addLawsuitCaseConn(\MyBundle\Entity\Lawsuit $lawsuitCaseConn)
    {
        $this->lawsuitCaseConn[] = $lawsuitCaseConn;

        return $this;
    }

    /**
     * Remove lawsuitCaseConn
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitCaseConn
     */
    public function removeLawsuitCaseConn(\MyBundle\Entity\Lawsuit $lawsuitCaseConn)
    {
        $this->lawsuitCaseConn->removeElement($lawsuitCaseConn);
    }

    /**
     * Get lawsuitCaseConn
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuitCaseConn()
    {
        return $this->lawsuitCaseConn;
    }

    /**
     * Add lawsuitVerdict
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitVerdict
     *
     * @return Judge
     */
    public function addLawsuitVerdict(\MyBundle\Entity\Lawsuit $lawsuitVerdict)
    {
        $this->lawsuitVerdict[] = $lawsuitVerdict;

        return $this;
    }

    /**
     * Remove lawsuitVerdict
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitVerdict
     */
    public function removeLawsuitVerdict(\MyBundle\Entity\Lawsuit $lawsuitVerdict)
    {
        $this->lawsuitVerdict->removeElement($lawsuitVerdict);
    }

    /**
     * Get lawsuitVerdict
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuitVerdict()
    {
        return $this->lawsuitVerdict;
    }
}
