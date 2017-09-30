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

}
