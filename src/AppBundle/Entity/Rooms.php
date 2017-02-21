<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Rooms
 * @ApiResource
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
     * @ORM\ManyToOne(targetEntity="User", cascade={"all"}, fetch="EAGER")
     */
    private $host;

    /**
     * @var int
     *
     * @ORM\Column(name="host_id", type="integer")
     */
    // private $hostId;



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
     * @ORM\ManyToOne(targetEntity="RoomsType", cascade={"all"}, fetch="EAGER")
     */
    private $type;

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @var bool
     *
     * @ORM\Column(name="statut", type="boolean")
     */
    private $statut;

    /**
     * @ORM\ManyToOne(targetEntity="Currency", cascade={"all"}, fetch="EAGER")
     */
    private $currency;


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
     * Set host
     *
     * @param int $host
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * Set type
     *
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Set currency
     *
     * @param string $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get host
     *
     */
    public function getHost()
    {
        return $this->host;
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
     * Get curreny
     *
     */
    public function getCurrency()
    {
        return $this->currency;
    }
}
