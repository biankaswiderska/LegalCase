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

class Court {

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
  * @ORM\Column(type="string", length=100)
  */
  private $type;

  /**
  * @ORM\Column(type="integer", options={"unsigned":true})
  */
  private $phone;

  /**
  * @ORM\Column(type="text")
  * @ExsAssert\BulkEmailChecker()
  */
  private $email;

  /**
  * One Product has One Shipment.
  * @OneToOne(targetEntity="Address")
  * @JoinColumn(name="address_id", referencedColumnName="id")
  */
  private $address;

  /**
  * @ORM\Column(type="string", length=255)
  */
  private $comment;
}
