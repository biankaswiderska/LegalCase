<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="lawyers")
*/

class Lawyer {

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
  * @ORM\ManyToOne(targetEntity="LawFirm", inversedBy="lawyers")
  * @ORM\JoinColumn(name="lawFirm_id", referencedColumnName="id")
  */
  private $lawFirm;

  /**
  * @ORM\ManyToMany(targetEntity="Investigation", inversedBy="prosecutionLawyers")
  * @ORM\JoinTable(name="prosecutionLawyers_investigationProsecution")
  */
  private $investigationProsecution;

  /**
  * @ORM\ManyToMany(targetEntity="Investigation", inversedBy="defenseLawyers")
  * @ORM\JoinTable(name="defenseLawyers_investigationDefense")
  */
  private $investigationDefense;

  /**
  * @ORM\ManyToMany(targetEntity="Lawsuit", inversedBy="prosecutionLawyers")
  * @ORM\JoinTable(name="prosecutionLawyers_lawsuitProsecution")
  */
  private $lawsuitProsecution;

  /**
  * @ORM\ManyToMany(targetEntity="Lawsuit", inversedBy="defenseLawyers")
  * @ORM\JoinTable(name="defenseLawyers_lawsuitDefense")
  */
  private $lawsuitDefense;

  public function __construct() {
    $this->investigationProsecution = new \Doctrine\Common\Collections\ArrayCollection();
    $this->investigationDefense = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitProsecution = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuitDefense = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Lawyer
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
     * @return Lawyer
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
     * Set phone
     *
     * @param integer $phone
     *
     * @return Lawyer
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
     * @return Lawyer
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
     * @return Lawyer
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
     * @return Lawyer
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
     * @return Lawyer
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
     * Set lawFirm
     *
     * @param \MyBundle\Entity\LawFirm $lawFirm
     *
     * @return Lawyer
     */
    public function setLawFirm(\MyBundle\Entity\LawFirm $lawFirm = null)
    {
        $this->lawFirm = $lawFirm;

        return $this;
    }

    /**
     * Get lawFirm
     *
     * @return \MyBundle\Entity\LawFirm
     */
    public function getLawFirm()
    {
        return $this->lawFirm;
    }

    /**
     * Add investigationProsecution
     *
     * @param \MyBundle\Entity\Investigation $investigationProsecution
     *
     * @return Lawyer
     */
    public function addInvestigationProsecution(\MyBundle\Entity\Investigation $investigationProsecution)
    {
        $this->investigationProsecution[] = $investigationProsecution;

        return $this;
    }

    /**
     * Remove investigationProsecution
     *
     * @param \MyBundle\Entity\Investigation $investigationProsecution
     */
    public function removeInvestigationProsecution(\MyBundle\Entity\Investigation $investigationProsecution)
    {
        $this->investigationProsecution->removeElement($investigationProsecution);
    }

    /**
     * Get investigationProsecution
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvestigationProsecution()
    {
        return $this->investigationProsecution;
    }

    /**
     * Add investigationDefense
     *
     * @param \MyBundle\Entity\Investigation $investigationDefense
     *
     * @return Lawyer
     */
    public function addInvestigationDefense(\MyBundle\Entity\Investigation $investigationDefense)
    {
        $this->investigationDefense[] = $investigationDefense;

        return $this;
    }

    /**
     * Remove investigationDefense
     *
     * @param \MyBundle\Entity\Investigation $investigationDefense
     */
    public function removeInvestigationDefense(\MyBundle\Entity\Investigation $investigationDefense)
    {
        $this->investigationDefense->removeElement($investigationDefense);
    }

    /**
     * Get investigationDefense
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvestigationDefense()
    {
        return $this->investigationDefense;
    }

    /**
     * Add lawsuitProsecution
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitProsecution
     *
     * @return Lawyer
     */
    public function addLawsuitProsecution(\MyBundle\Entity\Lawsuit $lawsuitProsecution)
    {
        $this->lawsuitProsecution[] = $lawsuitProsecution;

        return $this;
    }

    /**
     * Remove lawsuitProsecution
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitProsecution
     */
    public function removeLawsuitProsecution(\MyBundle\Entity\Lawsuit $lawsuitProsecution)
    {
        $this->lawsuitProsecution->removeElement($lawsuitProsecution);
    }

    /**
     * Get lawsuitProsecution
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuitProsecution()
    {
        return $this->lawsuitProsecution;
    }

    /**
     * Add lawsuitDefense
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitDefense
     *
     * @return Lawyer
     */
    public function addLawsuitDefense(\MyBundle\Entity\Lawsuit $lawsuitDefense)
    {
        $this->lawsuitDefense[] = $lawsuitDefense;

        return $this;
    }

    /**
     * Remove lawsuitDefense
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuitDefense
     */
    public function removeLawsuitDefense(\MyBundle\Entity\Lawsuit $lawsuitDefense)
    {
        $this->lawsuitDefense->removeElement($lawsuitDefense);
    }

    /**
     * Get lawsuitDefense
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuitDefense()
    {
        return $this->lawsuitDefense;
    }
}
