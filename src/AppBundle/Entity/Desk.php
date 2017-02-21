<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Desk
 *
 * @ORM\Table(name="desk")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DeskRepository")
 */
class Desk
{
    
  /**
  * @ORM\OneToMany(targetEntity="DeskComment", mappedBy="desk", cascade={"remove", "persist"})
  */
  protected $comments;
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="string", length=255)
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;


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
     * Set title
     *
     * @param string $title
     *
     * @return Desk
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     *
     * @return Desk
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Desk
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
     * Constructor
     */
    public function __construct()
    {
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->voteCount = 0;
        $this->createdAt = new \DateTime('now');
        $this->isEnabled = false;
    }

    /**
     * Add comment
     *
     * @param \AppBundle\Entity\DeskComment $comment
     *
     * @return Desk
     */
    public function addComment(\AppBundle\Entity\DeskComment $comment)
    {
        $this->comments[] = $comment;

        return $this;
    }

    /**
     * Remove comment
     *
     * @param \AppBundle\Entity\DeskComment $comment
     */
    public function removeComment(\AppBundle\Entity\DeskComment $comment)
    {
        $this->comments->removeElement($comment);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getComments()
    {
        return $this->comments;
    }
    /**
* Set comments
*
* @param \Doctrine\Common\Collections\Collection $comments
*/
public function setDeskComment(\Doctrine\Common\Collections\Collection $comments)
{
$this->comments = $comments;
}
}
