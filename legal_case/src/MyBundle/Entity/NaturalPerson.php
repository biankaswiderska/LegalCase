<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="naturalPersons")
*/

class NaturalPerson extends Person {

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
  * @ORM\ManyToOne(targetEntity="Agreement", inversedBy="naturalpersons")
  * @ORM\JoinColumn(name="agreement_id", referencedColumnName="id")
  */
  private $agreement;
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
     * @return NaturalPerson
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
     * @return NaturalPerson
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
}
