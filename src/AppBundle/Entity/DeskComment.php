<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DeskComment
 *
 * @ORM\Table(name="desk_comment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeskCommentRepository")
 */
class DeskComment
{
  /**
  * @ORM\ManyToOne(targetEntity="Desk", inversedBy="comments", cascade={"remove"})
  * @ORM\JoinColumn(name="desk_id", referencedColumnName="id")
  */
protected $desk;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="submissionIp", type="string", length=32)
     */
    private $submissionIp;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return DeskComment
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set submissionIp
     *
     * @param string $submissionIp
     *
     * @return DeskComment
     */
    public function setSubmissionIp($submissionIp)
    {
        $this->submissionIp = $submissionIp;

        return $this;
    }

    /**
     * Get submissionIp
     *
     * @return string
     */
    public function getSubmissionIp()
    {
        return $this->submissionIp;
    }

    /**
     * Set desk
     *
     * @param \AppBundle\Entity\Desk $desk
     *
     * @return DeskComment
     */
    public function setDesk(\AppBundle\Entity\Desk $desk = null)
    {
        $this->desk = $desk;

        return $this;
    }

    /**
     * Get desk
     *
     * @return \AppBundle\Entity\Desk
     */
    public function getDesk()
    {
        return $this->desk;
    }
}
