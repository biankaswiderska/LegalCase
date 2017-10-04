<?php

namespace MyBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="persons")
* @ORM\InheritanceType("SINGLE_TABLE")
* @ORM\DiscriminatorColumn(name="type", type="string")
* @ORM\DiscriminatorMap( {"naturalPerson" = "NaturalPerson", "juridicalPerson" = "JuridicalPerson"} )
*/
abstract class Person {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="integer", options={"unsigned":true})
  */
  private $phone;

  /**
  * @ORM\Column(type="text")
  * @ExsAssert\BulkEmailChecker()
  */
  private $email;

  /**
  * @ORM\Column(type="datetime")
  */
  private $addDate;

  /**
  * @ORM\Column(type="boolean", options={"default":0})
  */
  private $completeProfile;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
  * @ORM\ManyToMany(targetEntity="Investigation", inversedBy="investigationDefendants")
  * @ORM\JoinTable(name="investigation_defendants")
  */
  private $investigationDefendants;

  /**
  * @ORM\ManyToMany(targetEntity="Investigation", inversedBy="investigationPlaintiffs")
  * @ORM\JoinTable(name="investigation_plaintiffs")
  */
  private $investigationPlaintiffs;

  /**
  * @ORM\ManyToMany(targetEntity="Investigation", inversedBy="investigationWitnesses")
  * @ORM\JoinTable(name="investigation_witnesses")
  */
  private $investigationWitnesses;

  /**
  * @ORM\ManyToMany(targetEntity="Lawsuit", inversedBy="lawsuitDefendants")
  * @ORM\JoinTable(name="lawsuit_defendants")
  */
  private $lawsuitDefendants;

  /**
  * @ORM\ManyToMany(targetEntity="Lawsuit", inversedBy="lawsuitPlaintiffs")
  * @ORM\JoinTable(name="lawsuit_plaintiffs")
  */
  private $lawsuitPlaintiffs;

  /**
  * @ORM\ManyToMany(targetEntity="Lawsuit", inversedBy="lawsuitWitnesses")
  * @ORM\JoinTable(name="lawsuit_witnesses")
  */
  private $lawsuitWitnesses;

  /**
   * @ORM\ManyToMany(targetEntity="CourtOrder", inversedBy="persons")
   * @ORM\JoinTable(name="persons_courtOrders")
   */
  private $courtOrders;


  public function __construct() {
    $this->investigationDefendants = new \Doctrine\Common\Collections\ArrayCollection();
    $this->investigationPlaintiffs = new \Doctrine\Common\Collections\ArrayCollection();
    $this->investigationWitnesses = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitDefendants = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitPlaintiffs = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitWitnesses = new \Doctrine\Common\Collections\ArrayCollection();
    $this->courtOrders = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set phone
     *
     * @param integer $phone
     *
     * @return Person
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return integer
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Person
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set addDate
     *
     * @param \DateTime $addDate
     *
     * @return Person
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
     * Set completeProfile
     *
     * @param boolean $completeProfile
     *
     * @return Person
     */
    public function setCompleteProfile($completeProfile)
    {
        $this->completeProfile = $completeProfile;

        return $this;
    }

    /**
     * Get completeProfile
     *
     * @return boolean
     */
    public function getCompleteProfile()
    {
        return $this->completeProfile;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Person
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
     * Add investigationDefendant
     *
     * @param \MyBundle\Entity\Investigation $investigationDefendant
     *
     * @return Person
     */
    public function addInvestigationDefendant(\MyBundle\Entity\Investigation $investigationDefendant)
    {
        $this->investigationDefendants[] = $investigationDefendant;

        return $this;
    }

    /**
     * Remove investigationDefendant
     *
     * @param \MyBundle\Entity\Investigation $investigationDefendant
     */
    public function removeInvestigationDefendant(\MyBundle\Entity\Investigation $investigationDefendant)
    {
        $this->investigationDefendants->removeElement($investigationDefendant);
    }

    /**
     * Get investigationDefendants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvestigationDefendants()
    {
        return $this->investigationDefendants;
    }

    /**
     * Add investigationPlaintiff
     *
     * @param \MyBundle\Entity\Investigation $investigationPlaintiff
     *
     * @return Person
     */
    public function addInvestigationPlaintiff(\MyBundle\Entity\Investigation $investigationPlaintiff)
    {
        $this->investigationPlaintiffs[] = $investigationPlaintiff;

        return $this;
    }

    /**
     * Remove investigationPlaintiff
     *
     * @param \MyBundle\Entity\Investigation $investigationPlaintiff
     */
    public function removeInvestigationPlaintiff(\MyBundle\Entity\Investigation $investigationPlaintiff)
    {
        $this->investigationPlaintiffs->removeElement($investigationPlaintiff);
    }

    /**
     * Get investigationPlaintiffs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvestigationPlaintiffs()
    {
        return $this->investigationPlaintiffs;
    }

    /**
     * Add investigationWitness
     *
     * @param \MyBundle\Entity\Investigation $investigationWitness
     *
     * @return Person
     */
    public function addInvestigationWitness(\MyBundle\Entity\Investigation $investigationWitness)
    {
        $this->investigationWitnesses[] = $investigationWitness;

        return $this;
    }

    /**
     * Remove investigationWitness
     *
     * @param \MyBundle\Entity\Investigation $investigationWitness
     */
    public function removeInvestigationWitness(\MyBundle\Entity\Investigation $investigationWitness)
    {
        $this->investigationWitnesses->removeElement($investigationWitness);
    }

    /**
     * Get investigationWitnesses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvestigationWitnesses()
    {
        return $this->investigationWitnesses;
    }

    /**
     * Add lawsuitDefendant
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitDefendant
     *
     * @return Person
     */
    public function addLawsuitDefendant(\MyBundle\Entity\Lawsuit $lawsuitDefendant)
    {
        $this->lawsuitDefendants[] = $lawsuitDefendant;

        return $this;
    }

    /**
     * Remove lawsuitDefendant
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitDefendant
     */
    public function removeLawsuitDefendant(\MyBundle\Entity\Lawsuit $lawsuitDefendant)
    {
        $this->lawsuitDefendants->removeElement($lawsuitDefendant);
    }

    /**
     * Get lawsuitDefendants
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuitDefendants()
    {
        return $this->lawsuitDefendants;
    }

    /**
     * Add lawsuitPlaintiff
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitPlaintiff
     *
     * @return Person
     */
    public function addLawsuitPlaintiff(\MyBundle\Entity\Lawsuit $lawsuitPlaintiff)
    {
        $this->lawsuitPlaintiffs[] = $lawsuitPlaintiff;

        return $this;
    }

    /**
     * Remove lawsuitPlaintiff
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitPlaintiff
     */
    public function removeLawsuitPlaintiff(\MyBundle\Entity\Lawsuit $lawsuitPlaintiff)
    {
        $this->lawsuitPlaintiffs->removeElement($lawsuitPlaintiff);
    }

    /**
     * Get lawsuitPlaintiffs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuitPlaintiffs()
    {
        return $this->lawsuitPlaintiffs;
    }

    /**
     * Add lawsuitWitness
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitWitness
     *
     * @return Person
     */
    public function addLawsuitWitness(\MyBundle\Entity\Lawsuit $lawsuitWitness)
    {
        $this->lawsuitWitnesses[] = $lawsuitWitness;

        return $this;
    }

    /**
     * Remove lawsuitWitness
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitWitness
     */
    public function removeLawsuitWitness(\MyBundle\Entity\Lawsuit $lawsuitWitness)
    {
        $this->lawsuitWitnesses->removeElement($lawsuitWitness);
    }

    /**
     * Get lawsuitWitnesses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuitWitnesses()
    {
        return $this->lawsuitWitnesses;
    }

    /**
     * Add courtOrder
     *
     * @param \MyBundle\Entity\CourtOrder $courtOrder
     *
     * @return Person
     */
    public function addCourtOrder(\MyBundle\Entity\CourtOrder $courtOrder)
    {
        $this->courtOrders[] = $courtOrder;

        return $this;
    }

    /**
     * Remove courtOrder
     *
     * @param \MyBundle\Entity\CourtOrder $courtOrder
     */
    public function removeCourtOrder(\MyBundle\Entity\CourtOrder $courtOrder)
    {
        $this->courtOrders->removeElement($courtOrder);
    }

    /**
     * Get courtOrders
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourtOrders()
    {
        return $this->courtOrders;
    }
}
