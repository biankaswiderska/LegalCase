<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="clauses")
*/

class Clause {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

  /**
   * @ManyToOne(targetEntity="LegalCode", inversedBy="clauses")
   * @JoinColumn(name="legalCode_id", referencedColumnName="id")
   */
  private $legalCode;

  /**
  * @ORM\Column(type="integer", options={"comment":"artykuł"})
  */
  private $article;

  /**
  * @ORM\Column(type="integer", options={"comment":"ustęp"})
  */
  private $section;

  /**
  * @ORM\Column(type="string", options={"comment":"punkt"})
  */
  private $point;

  /**
  * @ORM\Column(type="string")
  */
  private $content;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $comment;
}
