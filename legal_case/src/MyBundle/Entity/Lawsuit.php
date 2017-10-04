<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="lawsuits")
*/

class Lawsuit {

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
  private $hearingDate;

  /**
  * @ORM\ManyToOne(targetEntity="LawsuitStatus", inversedBy="lawsuits")
  * @ORM\JoinColumn(name="lawsuitStatus_id", referencedColumnName="id")
  */
  private $lawsuitStatus;

  /**
  * @ORM\ManyToMany(targetEntity="Person", mappedBy="lawsuitDefendants")
  */
  private $lawsuitDefendants;

  /**
  * @ORM\ManyToMany(targetEntity="Person", mappedBy="lawsuitPlaintiffs")
  */
  private $lawsuitPlaintiffs;

  /**
  * @ORM\ManyToMany(targetEntity="Person", mappedBy="lawsuitWitnesses")
  */
  private $lawsuitWitnesses;

  /**
  * @ORM\ManyToMany(targetEntity="Investigation", inversedBy="lawsuits")
  * @ORM\JoinTable(name="lawsuits_investigations")
  */
  private $investigations;

  /**
  * @ORM\ManyToMany(targetEntity="Clause", inversedBy="lawsuits")
  * @ORM\JoinTable(name="lawsuits_clauses")
  */
  private $clauses;

  /**
  * @ORM\ManyToMany(targetEntity="Lawyer", mappedBy="lawsuitProsecution")
  */
  private $prosecutionLawyers;

  /**
  * @ORM\ManyToMany(targetEntity="Lawyer", mappedBy="lawsuitDefense")
  */
  private $defenseLawyers;

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

  /**
  * @ORM\ManyToOne(targetEntity="Court", inversedBy="lawsuits")
  * @ORM\JoinColumn(name="court_id", referencedColumnName="id")
  */
  private $court;

  /**
  * @ORM\ManyToOne(targetEntity="Judge", inversedBy="lawsuitCaseConn")
  * @ORM\JoinColumn(name="caseConnJudge_id", referencedColumnName="id")
  */
  private $caseConnJudge;

  /**
  * @ORM\ManyToOne(targetEntity="Judge", inversedBy="lawsuitVerdict")
  * @ORM\JoinColumn(name="verdictJudge_id", referencedColumnName="id")
  */
  private $verdictJudge;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $verdict;

  /**
  * @ORM\Column(type="string", length=50)
  */
  private $verdictShort;

  /**
  * @ORM\OneToMany(targetEntity="CourtOrder", mappedBy="lawsuit")
  */
  private $courtOrders;

  public function __construct() {
    $this->lawsuitDefendants = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitPlaintiffs = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitWitnesses = new \Doctrine\Common\Collections\ArrayCollection();
    $this->investigations = new \Doctrine\Common\Collections\ArrayCollection();
    $this->clauses = new \Doctrine\Common\Collections\ArrayCollection();
    $this->prosecutionLawyers = new \Doctrine\Common\Collections\ArrayCollection();
    $this->defenseLawyers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set addDate
     *
     * @param \DateTime $addDate
     *
     * @return Lawsuit
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
     * Set hearingDate
     *
     * @param \DateTime $hearingDate
     *
     * @return Lawsuit
     */
    public function setHearingDate($hearingDate)
    {
        $this->hearingDate = $hearingDate;

        return $this;
    }

    /**
     * Get hearingDate
     *
     * @return \DateTime
     */
    public function getHearingDate()
    {
        return $this->hearingDate;
    }

    /**
     * Set signature
     *
     * @param string $signature
     *
     * @return Lawsuit
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
     * @return Lawsuit
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
     * @return Lawsuit
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
     * Set verdict
     *
     * @param string $verdict
     *
     * @return Lawsuit
     */
    public function setVerdict($verdict)
    {
        $this->verdict = $verdict;

        return $this;
    }

    /**
     * Get verdict
     *
     * @return string
     */
    public function getVerdict()
    {
        return $this->verdict;
    }

    /**
     * Set verdictShort
     *
     * @param string $verdictShort
     *
     * @return Lawsuit
     */
    public function setVerdictShort($verdictShort)
    {
        $this->verdictShort = $verdictShort;

        return $this;
    }

    /**
     * Get verdictShort
     *
     * @return string
     */
    public function getVerdictShort()
    {
        return $this->verdictShort;
    }

    /**
     * Set lawsuitStatus
     *
     * @param \MyBundle\Entity\LawsuitStatus $lawsuitStatus
     *
     * @return Lawsuit
     */
    public function setLawsuitStatus(\MyBundle\Entity\LawsuitStatus $lawsuitStatus = null)
    {
        $this->lawsuitStatus = $lawsuitStatus;

        return $this;
    }

    /**
     * Get lawsuitStatus
     *
     * @return \MyBundle\Entity\LawsuitStatus
     */
    public function getLawsuitStatus()
    {
        return $this->lawsuitStatus;
    }

    /**
     * Add lawsuitDefendant
     *
     * @param \MyBundle\Entity\Person $lawsuitDefendant
     *
     * @return Lawsuit
     */
    public function addLawsuitDefendant(\MyBundle\Entity\Person $lawsuitDefendant)
    {
        $this->lawsuitDefendants[] = $lawsuitDefendant;

        return $this;
    }

    /**
     * Remove lawsuitDefendant
     *
     * @param \MyBundle\Entity\Person $lawsuitDefendant
     */
    public function removeLawsuitDefendant(\MyBundle\Entity\Person $lawsuitDefendant)
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
     * @param \MyBundle\Entity\Person $lawsuitPlaintiff
     *
     * @return Lawsuit
     */
    public function addLawsuitPlaintiff(\MyBundle\Entity\Person $lawsuitPlaintiff)
    {
        $this->lawsuitPlaintiffs[] = $lawsuitPlaintiff;

        return $this;
    }

    /**
     * Remove lawsuitPlaintiff
     *
     * @param \MyBundle\Entity\Person $lawsuitPlaintiff
     */
    public function removeLawsuitPlaintiff(\MyBundle\Entity\Person $lawsuitPlaintiff)
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
     * @param \MyBundle\Entity\Person $lawsuitWitness
     *
     * @return Lawsuit
     */
    public function addLawsuitWitness(\MyBundle\Entity\Person $lawsuitWitness)
    {
        $this->lawsuitWitnesses[] = $lawsuitWitness;

        return $this;
    }

    /**
     * Remove lawsuitWitness
     *
     * @param \MyBundle\Entity\Person $lawsuitWitness
     */
    public function removeLawsuitWitness(\MyBundle\Entity\Person $lawsuitWitness)
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
     * Add investigation
     *
     * @param \MyBundle\Entity\Investigation $investigation
     *
     * @return Lawsuit
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

    /**
     * Add clause
     *
     * @param \MyBundle\Entity\Clause $clause
     *
     * @return Lawsuit
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
     * @return Lawsuit
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
     * @return Lawsuit
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
     * Set court
     *
     * @param \MyBundle\Entity\Court $court
     *
     * @return Lawsuit
     */
    public function setCourt(\MyBundle\Entity\Court $court = null)
    {
        $this->court = $court;

        return $this;
    }

    /**
     * Get court
     *
     * @return \MyBundle\Entity\Court
     */
    public function getCourt()
    {
        return $this->court;
    }

    /**
     * Set caseConnJudge
     *
     * @param \MyBundle\Entity\Judge $caseConnJudge
     *
     * @return Lawsuit
     */
    public function setCaseConnJudge(\MyBundle\Entity\Judge $caseConnJudge = null)
    {
        $this->caseConnJudge = $caseConnJudge;

        return $this;
    }

    /**
     * Get caseConnJudge
     *
     * @return \MyBundle\Entity\Judge
     */
    public function getCaseConnJudge()
    {
        return $this->caseConnJudge;
    }

    /**
     * Set verdictJudge
     *
     * @param \MyBundle\Entity\Judge $verdictJudge
     *
     * @return Lawsuit
     */
    public function setVerdictJudge(\MyBundle\Entity\Judge $verdictJudge = null)
    {
        $this->verdictJudge = $verdictJudge;

        return $this;
    }

    /**
     * Get verdictJudge
     *
     * @return \MyBundle\Entity\Judge
     */
    public function getVerdictJudge()
    {
        return $this->verdictJudge;
    }

    /**
     * Add courtOrder
     *
     * @param \MyBundle\Entity\CourtOrder $courtOrder
     *
     * @return Lawsuit
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
