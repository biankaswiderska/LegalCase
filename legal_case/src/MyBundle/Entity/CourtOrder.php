<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Entity
* @ORM\Table(name="courtOrders")
*/

class CourtOrder {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="datetime")
  */
  private $acceptDate;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
  * @ORM\ManyToMany(targetEntity="Person", mappedBy="courtOrders")
  */
  private $persons;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $CaseConnNumber;

  /**
  * @ORM\ManyToOne(targetEntity="Lawsuit", inversedBy="courtOrders")
  * @ORM\JoinColumn(name="lawsuit_id", referencedColumnName="id")
  */
  private $lawsuit;

  /**
   * @ORM\Column(type="string")
   *
   * @Assert\File(mimeTypes={ "application/pdf" })
   */
  private $file;

  public function __construct() {
    $this->persons = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set acceptDate
     *
     * @param \DateTime $acceptDate
     *
     * @return CourtOrder
     */
    public function setAcceptDate($acceptDate)
    {
        $this->acceptDate = $acceptDate;

        return $this;
    }

    /**
     * Get acceptDate
     *
     * @return \DateTime
     */
    public function getAcceptDate()
    {
        return $this->acceptDate;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return CourtOrder
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
     * Set caseConnNumber
     *
     * @param string $caseConnNumber
     *
     * @return CourtOrder
     */
    public function setCaseConnNumber($caseConnNumber)
    {
        $this->CaseConnNumber = $caseConnNumber;

        return $this;
    }

    /**
     * Get caseConnNumber
     *
     * @return string
     */
    public function getCaseConnNumber()
    {
        return $this->CaseConnNumber;
    }

    /**
     * Set file
     *
     * @param string $file
     *
     * @return CourtOrder
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Add person
     *
     * @param \MyBundle\Entity\Person $person
     *
     * @return CourtOrder
     */
    public function addPerson(\MyBundle\Entity\Person $person)
    {
        $this->persons[] = $person;

        return $this;
    }

    /**
     * Remove person
     *
     * @param \MyBundle\Entity\Person $person
     */
    public function removePerson(\MyBundle\Entity\Person $person)
    {
        $this->persons->removeElement($person);
    }

    /**
     * Get persons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set lawsuit
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuit
     *
     * @return CourtOrder
     */
    public function setLawsuit(\MyBundle\Entity\Lawsuit $lawsuit = null)
    {
        $this->lawsuit = $lawsuit;

        return $this;
    }

    /**
     * Get lawsuit
     *
     * @return \MyBundle\Entity\Lawsuit
     */
    public function getLawsuit()
    {
        return $this->lawsuit;
    }
}
