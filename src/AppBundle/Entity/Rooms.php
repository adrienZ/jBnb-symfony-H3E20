<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Rooms
 *
 * @ORM\Table(name="rooms")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RoomsRepository")
 */
class Rooms
{
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
     * @ORM\Column(name="LDK", type="string", length=100)
     */
    private $lDK;

    /**
     * @var int
     *
     * @ORM\Column(name="host_id", type="integer")
     */
    private $hostId;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="string", length=255)
     */
    private $localisation;

    /**
     * @var string
     *
     * @ORM\Column(name="price", type="decimal", precision=10, scale=2)
     */
    private $price;

    /**
     * @var int
     *
     * @ORM\Column(name="surface", type="integer")
     */
    private $surface;

    /**
     * @var string
     *
     * @ORM\Column(name="equipements", type="text")
     */
    private $equipements;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=1000)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="type_id", type="integer")
     */
    private $typeId;

    /**
     * @var bool
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;

    /**
     * @var int
     *
     * @ORM\Column(name="devise_id", type="integer")
     */
    private $deviseId;


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
     * @return Rooms
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
     * Set lDK
     *
     * @param string $lDK
     *
     * @return Rooms
     */
    public function setLDK($lDK)
    {
        $this->lDK = $lDK;

        return $this;
    }

    /**
     * Get lDK
     *
     * @return string
     */
    public function getLDK()
    {
        return $this->lDK;
    }

    /**
     * Set hostId
     *
     * @param integer $hostId
     *
     * @return Rooms
     */
    public function setHostId($hostId)
    {
        $this->hostId = $hostId;

        return $this;
    }

    /**
     * Get hostId
     *
     * @return int
     */
    public function getHostId()
    {
        return $this->hostId;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Rooms
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Rooms
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set surface
     *
     * @param integer $surface
     *
     * @return Rooms
     */
    public function setSurface($surface)
    {
        $this->surface = $surface;

        return $this;
    }

    /**
     * Get surface
     *
     * @return int
     */
    public function getSurface()
    {
        return $this->surface;
    }

    /**
     * Set equipements
     *
     * @param string $equipements
     *
     * @return Rooms
     */
    public function setEquipements($equipements)
    {
        $this->equipements = $equipements;

        return $this;
    }

    /**
     * Get equipements
     *
     * @return string
     */
    public function getEquipements()
    {
        return $this->equipements;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Rooms
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
     * Set typeId
     *
     * @param integer $typeId
     *
     * @return Rooms
     */
    public function setTypeId($typeId)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return int
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     *
     * @return Rooms
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return bool
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set deviseId
     *
     * @param integer $deviseId
     *
     * @return Rooms
     */
    public function setDeviseId($deviseId)
    {
        $this->deviseId = $deviseId;

        return $this;
    }

    /**
     * Get deviseId
     *
     * @return int
     */
    public function getDeviseId()
    {
        return $this->deviseId;
    }
}

