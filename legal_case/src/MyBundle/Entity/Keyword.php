<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="keywords")
*/

class Keyword {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=30)
  */
  private $word;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
  * @ORM\ManyToMany(targetEntity="Incident", inversedBy="keywords")
  * @ORM\JoinTable(name="incidents_keywords")
  */
  private $incidents;

  public function __construct() {
    $this->incidents = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set word
     *
     * @param string $word
     *
     * @return Keyword
     */
    public function setWord($word)
    {
        $this->word = $word;

        return $this;
    }

    /**
     * Get word
     *
     * @return string
     */
    public function getWord()
    {
        return $this->word;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Keyword
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
     * Add incident
     *
     * @param \MyBundle\Entity\Incident $incident
     *
     * @return Keyword
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
}
