<?php
namespace MyBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use EXS\BulkEmailCheckerBundle\Validator\Constraints as ExsAssert;

/**
* @ORM\Entity
* @ORM\Table(name="naturalPersons")
*/

class NaturalPerson extends Person {

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

}
