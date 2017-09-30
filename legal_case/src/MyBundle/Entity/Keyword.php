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
   * @ManyToOne(targetEntity="Incident", inversedBy="keywords")
   * @JoinColumn(name="incident_id", referencedColumnName="id")
   */
  private $incident;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $comment;
}
