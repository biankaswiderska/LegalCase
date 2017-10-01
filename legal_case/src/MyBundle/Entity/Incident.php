<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="courts")
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
  private $date;

  /**
  * @OneToMany(targetEntity="Keyword", mappedBy="Incident")
  */
  private $keywords;

  /**
  * @OneToOne(targetEntity="IncidentAddress")
  * @JoinColumn(name="incidentAddress_id", referencedColumnName="id")
  */
  private $incidentAddress;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;
}
