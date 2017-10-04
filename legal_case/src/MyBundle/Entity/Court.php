<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="courts")
*/

class Court {

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
  * @ORM\Column(type="string", length=100)
  */
  private $type;

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
   * @ORM\ManyToMany(targetEntity="Judge", mappedBy="courts")
   */
  private $judges;

  /**
 * @ORM\OneToMany(targetEntity="Lawsuit", mappedBy="court")
 */
private $lawsuits;

  public function __construct() {
      $this->judges = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name
     *
     * @param string $name
     *
     * @return Court
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
     * Set type
     *
     * @param string $type
     *
     * @return Court
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set phone
     *
     * @param integer $phone
     *
     * @return Court
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
     * @return Court
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
     * @return Court
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
     * Add judge
     *
     * @param \MyBundle\Entity\Judge $judge
     *
     * @return Court
     */
    public function addJudge(\MyBundle\Entity\Judge $judge)
    {
        $this->judges[] = $judge;

        return $this;
    }

    /**
     * Remove judge
     *
     * @param \MyBundle\Entity\Judge $judge
     */
    public function removeJudge(\MyBundle\Entity\Judge $judge)
    {
        $this->judges->removeElement($judge);
    }

    /**
     * Get judges
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getJudges()
    {
        return $this->judges;
    }

    /**
     * Add lawsuit
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuit
     *
     * @return Court
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
