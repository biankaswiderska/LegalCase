<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="clients")
*/

class Client {

  /**
* @ORM\Id
* @ORM\Column(type="integer")
* @ORM\GeneratedValue
*/
private $id;


  /**
   * @ORM\Column(type="string", length=50)
   */
  private $name;

  /**
   * @ORM\Column(type="string", length=50)
   */
  private $surname;

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
  * @ORM\Column(type="datetime")
  */
  private $date;

  /**
  * @ORM\Column(type="boolean", options={"default":0})
  */
  private $completeProfile;

  /**
   * @ORM\Column(type="string", length=255)
   */
  private $comment;
}
