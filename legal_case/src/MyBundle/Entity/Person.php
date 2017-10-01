<?php

namespace MyBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
* @ORM\Entity
* @ORM\Table(name="persons")
* @ORM\InheritanceType("SINGLE_TABLE")
* @ORM\DiscriminatorColumn(name="type", type="string")
* @ORM\DiscriminatorMap( {"naturalPerson" = "NaturalPerson", "juridicalPerson" = "JuridicalPerson"} )
*/
abstract class Person {

  /**
  * @ORM\Id
  * @ORM\Column(type="integer")
  * @ORM\GeneratedValue
  */
  private $id;

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
