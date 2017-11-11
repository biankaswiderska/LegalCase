<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="policestations")
*/

class Policestation {

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
  * @ORM\OneToOne(targetEntity="Address")
  * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
  */
  private $address;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
   * @ORM\ManyToMany(targetEntity="Policeofficer", mappedBy="policestations")
   */
  private $policeofficers;



  public function __construct() {
      $this->policeofficers = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Policestation
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
     * @return Policestation
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
     * Set comment
     *
     * @param string $comment
     *
     * @return Policestation
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
     * @return Policestation
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
     * Add policeofficer
     *
     * @param \MyBundle\Entity\Policeofficer $policeofficer
     *
     * @return Policestation
     */
    public function addPoliceofficer(\MyBundle\Entity\Policeofficer $policeofficer)
    {
        $this->policeofficers[] = $policeofficer;

        return $this;
    }

    /**
     * Remove policeofficer
     *
     * @param \MyBundle\Entity\Policeofficer $policeofficer
     */
    public function removePoliceofficer(\MyBundle\Entity\Policeofficer $policeofficer)
    {
        $this->policeofficers->removeElement($policeofficer);
    }

    /**
     * Get policeofficers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPoliceofficers()
    {
        return $this->policeofficers;
    }
}
