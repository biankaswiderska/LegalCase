<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="incidentAddresses")
*/

class IncidentAddress {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
  * @ORM\Column(type="string", length=100)
  */
  private $city;

  /**
  * @ORM\Column(type="string", length=150)
  */
  private $street;

  /**
  * @ORM\Column(type="integer", options={"unsigned":true})
  */
  private $houseNumber;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;

  /**
 * @ORM\OneToMany(targetEntity="Incident", mappedBy="incidentAddress")
 */
private $incidents;

public function __construct() {
    $this->incidents = new ArrayCollection();
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
     * Set city
     *
     * @param string $city
     *
     * @return IncidentAddress
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set street
     *
     * @param string $street
     *
     * @return IncidentAddress
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set houseNumber
     *
     * @param integer $houseNumber
     *
     * @return IncidentAddress
     */
    public function setHouseNumber($houseNumber)
    {
        $this->houseNumber = $houseNumber;

        return $this;
    }

    /**
     * Get houseNumber
     *
     * @return integer
     */
    public function getHouseNumber()
    {
        return $this->houseNumber;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return IncidentAddress
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
     * @return IncidentAddress
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
