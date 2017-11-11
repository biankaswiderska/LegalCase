<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="agreements")
*/

class Agreement {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $value;

  /**
  * @ORM\Column(type="string")
  */
  private $comment;

  /**
  * @ORM\OneToMany(targetEntity="NaturalPerson", mappedBy="agreement")
  */
  private $naturalpersons;

  public function __construct() {
    $this->naturalpersons = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set value
     *
     * @param string $value
     *
     * @return Agreement
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Agreement
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
     * Add naturalperson
     *
     * @param \MyBundle\Entity\NaturalPerson $naturalperson
     *
     * @return Agreement
     */
    public function addNaturalperson(\MyBundle\Entity\NaturalPerson $naturalperson)
    {
        $this->naturalpersons[] = $naturalperson;

        return $this;
    }

    /**
     * Remove naturalperson
     *
     * @param \MyBundle\Entity\NaturalPerson $naturalperson
     */
    public function removeNaturalperson(\MyBundle\Entity\NaturalPerson $naturalperson)
    {
        $this->naturalpersons->removeElement($naturalperson);
    }

    /**
     * Get naturalpersons
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNaturalpersons()
    {
        return $this->naturalpersons;
    }
}
