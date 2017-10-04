<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="legalCodes")
*/

class LegalCode {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=100)
  */
  private $name;

  /**
  * @ORM\Column(type="string", length=2, unique=true, options={"fixed":true})
  */
  private $abbreviation;

  /**
  * @ORM\OneToMany(targetEntity="Clause", mappedBy="legalCode")
  */
  private $clauses;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clauses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return LegalCode
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
     * Set abbreviation
     *
     * @param string $abbreviation
     *
     * @return LegalCode
     */
    public function setAbbreviation($abbreviation)
    {
        $this->abbreviation = $abbreviation;

        return $this;
    }

    /**
     * Get abbreviation
     *
     * @return string
     */
    public function getAbbreviation()
    {
        return $this->abbreviation;
    }

    /**
     * Add clause
     *
     * @param \MyBundle\Entity\Clause $clause
     *
     * @return LegalCode
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
}
