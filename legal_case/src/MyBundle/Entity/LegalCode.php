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
   * @OneToMany(targetEntity="Clause", mappedBy="legalCode")
   */
   private $clauses;
}
