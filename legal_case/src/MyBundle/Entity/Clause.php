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
  * @ORM\ManyToOne(targetEntity="LegalCode", inversedBy="clauses")
  * @ORM\JoinColumn(name="legalCode_id", referencedColumnName="id")
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

  /**
   * @ORM\ManyToMany(targetEntity="Investigation", mappedBy="clauses")
   */
  private $investigations;

  /**
   * @ORM\ManyToMany(targetEntity="Lawsuit", mappedBy="clauses")
   */
  private $lawsuits;

  public function __construct() {
    $this->investigations = new \Doctrine\Common\Collections\ArrayCollection();
    $this->lawsuits = new \Doctrine\Common\Collections\ArrayCollection();

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
     * Set article
     *
     * @param integer $article
     *
     * @return Clause
     */
    public function setArticle($article)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return integer
     */
    public function getArticle()
    {
        return $this->article;
    }

    /**
     * Set section
     *
     * @param integer $section
     *
     * @return Clause
     */
    public function setSection($section)
    {
        $this->section = $section;

        return $this;
    }

    /**
     * Get section
     *
     * @return integer
     */
    public function getSection()
    {
        return $this->section;
    }

    /**
     * Set point
     *
     * @param string $point
     *
     * @return Clause
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return string
     */
    public function getPoint()
    {
        return $this->point;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Clause
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Clause
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
     * Set legalCode
     *
     * @param \MyBundle\Entity\LegalCode $legalCode
     *
     * @return Clause
     */
    public function setLegalCode(\MyBundle\Entity\LegalCode $legalCode = null)
    {
        $this->legalCode = $legalCode;

        return $this;
    }

    /**
     * Get legalCode
     *
     * @return \MyBundle\Entity\LegalCode
     */
    public function getLegalCode()
    {
        return $this->legalCode;
    }

    /**
     * Add investigation
     *
     * @param \MyBundle\Entity\Investigation $investigation
     *
     * @return Clause
     */
    public function addInvestigation(\MyBundle\Entity\Investigation $investigation)
    {
        $this->investigations[] = $investigation;

        return $this;
    }

    /**
     * Remove investigation
     *
     * @param \MyBundle\Entity\Investigation $investigation
     */
    public function removeInvestigation(\MyBundle\Entity\Investigation $investigation)
    {
        $this->investigations->removeElement($investigation);
    }

    /**
     * Get investigations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInvestigations()
    {
        return $this->investigations;
    }

    /**
     * Add lawsuit
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuit
     *
     * @return Clause
     */
    public function addLawsuit(\MyBundle\Entity\Lawsuit $lawsuit)
    {
        $this->lawsuits[] = $lawsuit;

        return $this;
    }

    /**
     * Remove lawsuit
     *
     * @param \MyBundle\Entity\Lawsuit $lawsuit
     */
    public function removeLawsuit(\MyBundle\Entity\Lawsuit $lawsuit)
    {
        $this->lawsuits->removeElement($lawsuit);
    }

    /**
     * Get lawsuits
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLawsuits()
    {
        return $this->lawsuits;
    }
}
