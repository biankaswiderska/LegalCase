<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="juridicalPersons")
*/

class JuridicalPerson extends Person {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=100)
  */
  private $organizationType;
  /**
  * @ORM\Column(type="string", length=50)
  */
  private $name;


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
     * Set organizationType
     *
     * @param string $organizationType
     *
     * @return JuridicalPerson
     */
    public function setOrganizationType($organizationType)
    {
        $this->organizationType = $organizationType;

        return $this;
    }

    /**
     * Get organizationType
     *
     * @return string
     */
    public function getOrganizationType()
    {
        return $this->organizationType;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return JuridicalPerson
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
}
