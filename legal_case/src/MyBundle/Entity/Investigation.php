<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="investigations")
*/

class Investigation {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="datetime")
  */
  private $addDate;

  /**
  * @ORM\Column(type="datetime")
  */
  private $interrogationDate;

  /**
  * @ORM\ManyToOne(targetEntity="InvestigationStatus", inversedBy="investigations")
  * @ORM\JoinColumn(name="investigationStatus_id", referencedColumnName="id")
  */
  private $investigationStatus;

  /**
  * @ORM\ManyToMany(targetEntity="Person", mappedBy="investigationDefendants")
  */
  private $investigationDefendants;

  /**
  * @ORM\ManyToMany(targetEntity="Person", mappedBy="investigationPlaintiffs")
  */
  private $investigationPlaintiffs;

  /**
  * @ORM\ManyToMany(targetEntity="Person", mappedBy="investigationWitnesses")
  */
  private $investigationWitnesses;

  /**
  * @ORM\ManyToMany(targetEntity="Incident", inversedBy="investigations")
  * @ORM\JoinTable(name="investigations_incidents")
  */
  private $incidents;

  /**
  * @ORM\ManyToMany(targetEntity="Clause", inversedBy="investigations")
  * @ORM\JoinTable(name="investigations_clauses")
  */
  private $clauses;

  /**
   * @ORM\ManyToMany(targetEntity="Lawyer", mappedBy="investigationProsecution")
   */
  private $prosecutionLawyers;

  /**
   * @ORM\ManyToMany(targetEntity="Lawyer", mappedBy="investigationDefense")
   */
  private $defenseLawyers;

  /**
   * @ORM\ManyToMany(targetEntity="Lawsuit", mappedBy="investigations")
   */
  private $lawsuits;

  /**
  * @ORM\Column(type="string", length=100)
  */
  private $signature;

  /**
  * @ORM\Column(type="string", length=50)
  */
  private $side;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  public function __construct() {
    $this->investigationDefendants = new \Doctrine\Common\Collections\ArrayCollection();
    $this->investigationPlaintiffs = new \Doctrine\Common\Collections\ArrayCollection();
    $this->investigationWitnesses = new \Doctrine\Common\Collections\ArrayCollection();
    $this->incidents = new \Doctrine\Common\Collections\ArrayCollection();
    $this->clauses = new \Doctrine\Common\Collections\ArrayCollection();
    $this->prosecutionLawyers = new \Doctrine\Common\Collections\ArrayCollection();
    $this->defenseLawyers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set addDate
     *
     * @param \DateTime $addDate
     *
     * @return Investigation
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
     * Set interrogationDate
     *
     * @param \DateTime $interrogationDate
     *
     * @return Investigation
     */
    public function setInterrogationDate($interrogationDate)
    {
        $this->interrogationDate = $interrogationDate;

        return $this;
    }

    /**
     * Get interrogationDate
     *
     * @return \DateTime
     */
    public function getInterrogationDate()
    {
        return $this->interrogationDate;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return Investigation
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set side
     *
     * @param string $side
     *
     * @return Investigation
     */
    public function setSide($side)
    {
        $this->side = $side;

        return $this;
    }

    /**
     * Get side
     *
     * @return string
     */
    public function getSide()
    {
        return $this->side;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Investigation
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
     * Set investigationStatus
     *
     * @param \MyBundle\Entity\InvestigationStatus $investigationStatus
     *
     * @return Investigation
     */
    public function setInvestigationStatus(\MyBundle\Entity\InvestigationStatus $investigationStatus = null)
    {
        $this->investigationStatus = $investigationStatus;

        return $this;
    }

    /**
     * Get investigationStatus
     *
     * @return \MyBundle\Entity\InvestigationStatus
     */
    public function getInvestigationStatus()
    {
        return $this->investigationStatus;
    }

    /**
     * Add investigationDefendant
     *
     * @param \MyBundle\Entity\Person $investigationDefendant
     *
     * @return Investigation
     */
    public function addInvestigationDefendant(\MyBundle\Entity\Person $investigationDefendant)
    {
        $this->investigationDefendants[] = $investigationDefendant;

        return $this;
    }

    /**
     * Remove investigationDefendant
     *
     * @param \MyBundle\Entity\Person $investigationDefendant
     */
    public function removeInvestigationDefendant(\MyBundle\Entity\Person $investigationDefendant)
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
     * @param \MyBundle\Entity\Person $investigationPlaintiff
     *
     * @return Investigation
     */
    public function addInvestigationPlaintiff(\MyBundle\Entity\Person $investigationPlaintiff)
    {
        $this->investigationPlaintiffs[] = $investigationPlaintiff;

        return $this;
    }

    /**
     * Remove investigationPlaintiff
     *
     * @param \MyBundle\Entity\Person $investigationPlaintiff
     */
    public function removeInvestigationPlaintiff(\MyBundle\Entity\Person $investigationPlaintiff)
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
     * @param \MyBundle\Entity\Person $investigationWitness
     *
     * @return Investigation
     */
    public function addInvestigationWitness(\MyBundle\Entity\Person $investigationWitness)
    {
        $this->investigationWitnesses[] = $investigationWitness;

        return $this;
    }

    /**
     * Remove investigationWitness
     *
     * @param \MyBundle\Entity\Person $investigationWitness
     */
    public function removeInvestigationWitness(\MyBundle\Entity\Person $investigationWitness)
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
     * Add incident
     *
     * @param \MyBundle\Entity\Incident $incident
     *
     * @return Investigation
     */
    public function addIncident(\MyBundle\Entity\Incident $incident)
    {
        $this->incidents[] = $incident;

        return $this;
    }

    /**
     * Remove incident
     *
     * @param \MyBundle\Entity\Incident $incident
     */
    public function removeIncident(\MyBundle\Entity\Incident $incident)
    {
        $this->incidents->removeElement($incident);
    }

    /**
     * Get incidents
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIncidents()
    {
        return $this->incidents;
    }

    /**
     * Add clause
     *
     * @param \MyBundle\Entity\Clause $clause
     *
     * @return Investigation
     */
    public function addClause(\MyBundle\Entity\Clause $clause)
    {
        $this->clauses[] = $clause;

        return $this;
    }

    /**
     * Remove clause
     *
     * @param \MyBundle\Entity\Clause $clause
     */
    public function removeClause(\MyBundle\Entity\Clause $clause)
    {
        $this->clauses->removeElement($clause);
    }

    /**
     * Get clauses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClauses()
    {
        return $this->clauses;
    }

    /**
     * Add prosecutionLawyer
     *
     * @param \MyBundle\Entity\Lawyer $prosecutionLawyer
     *
     * @return Investigation
     */
    public function addProsecutionLawyer(\MyBundle\Entity\Lawyer $prosecutionLawyer)
    {
        $this->prosecutionLawyers[] = $prosecutionLawyer;

        return $this;
    }

    /**
     * Remove prosecutionLawyer
     *
     * @param \MyBundle\Entity\Lawyer $prosecutionLawyer
     */
    public function removeProsecutionLawyer(\MyBundle\Entity\Lawyer $prosecutionLawyer)
    {
        $this->prosecutionLawyers->removeElement($prosecutionLawyer);
    }

    /**
     * Get prosecutionLawyers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProsecutionLawyers()
    {
        return $this->prosecutionLawyers;
    }

    /**
     * Add defenseLawyer
     *
     * @param \MyBundle\Entity\Lawyer $defenseLawyer
     *
     * @return Investigation
     */
    public function addDefenseLawyer(\MyBundle\Entity\Lawyer $defenseLawyer)
    {
        $this->defenseLawyers[] = $defenseLawyer;

        return $this;
    }

    /**
     * Remove defenseLawyer
     *
     * @param \MyBundle\Entity\Lawyer $defenseLawyer
     */
    public function removeDefenseLawyer(\MyBundle\Entity\Lawyer $defenseLawyer)
    {
        $this->defenseLawyers->removeElement($defenseLawyer);
    }

    /**
     * Get defenseLawyers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getDefenseLawyers()
    {
        return $this->defenseLawyers;
    }

    /**
     * Add lawsuit
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuit
     *
     * @return Investigation
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
