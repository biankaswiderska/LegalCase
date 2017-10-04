<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="incidents")
*/

class Incident {

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
  * @ORM\Column(type="datetime")
  */
  private $incidentDate;

  /**
   * @ORM\ManyToOne(targetEntity="IncidentAddress", inversedBy="incidents")
   * @ORM\JoinColumn(name="incidentAddress_id", referencedColumnName="id")
   */
  private $incidentAddress;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
  * @ORM\ManyToMany(targetEntity="Keyword", mappedBy="incidents")
  */
  private $keywords;

  /**
   * @ORM\ManyToMany(targetEntity="Investigation", mappedBy="incidents")
   */
  private $investigations;

  public function __construct() {
    $this->keywords = new \Doctrine\Common\Collections\ArrayCollection();
    $this->investigations = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Incident
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
     * Set incidentDate
     *
     * @param \DateTime $incidentDate
     *
     * @return Incident
     */
    public function setIncidentDate($incidentDate)
    {
        $this->incidentDate = $incidentDate;

        return $this;
    }

    /**
     * Get incidentDate
     *
     * @return \DateTime
     */
    public function getIncidentDate()
    {
        return $this->incidentDate;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Incident
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
     * Set incidentAddress
     *
     * @param \MyBundle\Entity\IncidentAddress $incidentAddress
     *
     * @return Incident
     */
    public function setIncidentAddress(\MyBundle\Entity\IncidentAddress $incidentAddress = null)
    {
        $this->incidentAddress = $incidentAddress;

        return $this;
    }

    /**
     * Get incidentAddress
     *
     * @return \MyBundle\Entity\IncidentAddress
     */
    public function getIncidentAddress()
    {
        return $this->incidentAddress;
    }

    /**
     * Add keyword
     *
     * @param \MyBundle\Entity\Keyword $keyword
     *
     * @return Incident
     */
    public function addKeyword(\MyBundle\Entity\Keyword $keyword)
    {
        $this->keywords[] = $keyword;

        return $this;
    }

    /**
     * Remove keyword
     *
     * @param \MyBundle\Entity\Keyword $keyword
     */
    public function removeKeyword(\MyBundle\Entity\Keyword $keyword)
    {
        $this->keywords->removeElement($keyword);
    }

    /**
     * Get keywords
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Add investigation
     *
     * @param \MyBundle\Entity\Investigation $investigation
     *
     * @return Incident
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
}
