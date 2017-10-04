<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="lawFirms")
*/

class LawFirm {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $name;

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
  * @ORM\OneToOne(targetEntity="Address")
  * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
  */
  private $address;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
  * @ORM\OneToMany(targetEntity="Lawyer", mappedBy="lawFirm")
  */
  private $lawyers;

  public function __construct() {
    $this->lawyers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return LawFirm
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
     * Set phone
     *
     * @param integer $phone
     *
     * @return LawFirm
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
     * @return LawFirm
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
     * Set comment
     *
     * @param string $comment
     *
     * @return LawFirm
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
     * Set address
     *
     * @param \MyBundle\Entity\Address $address
     *
     * @return LawFirm
     */
    public function setAddress(\MyBundle\Entity\Address $address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return \MyBundle\Entity\Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Add lawyer
     *
     * @param \MyBundle\Entity\Lawyer $lawyer
     *
     * @return LawFirm
     */
    public function addLawyer(\MyBundle\Entity\Lawyer $lawyer)
    {
        $this->lawyers[] = $lawyer;

        return $this;
    }

    /**
     * Remove lawyer
     *
     * @param \MyBundle\Entity\Lawyer $lawyer
     */
    public function removeLawyer(\MyBundle\Entity\Lawyer $lawyer)
    {
        $this->lawyers->removeElement($lawyer);
    }

    /**
     * Get lawyers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawyers()
    {
        return $this->lawyers;
    }
}
