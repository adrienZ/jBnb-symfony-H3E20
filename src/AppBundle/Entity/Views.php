<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Views
 *
 * @ORM\Table(name="views")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ViewsRepository")
 */
class Views
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
     * @var int
     *
     * @ORM\Column(name="room_id", type="integer")
     */
    private $roomId;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_adress", type="string", length=100)
     */
    private $ipAdress;


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
     * Set roomId
     *
     * @param integer $roomId
     *
     * @return Views
     */
    public function setRoomId($roomId)
    {
        $this->roomId = $roomId;

        return $this;
    }

    /**
     * Get roomId
     *
     * @return int
     */
    public function getRoomId()
    {
        return $this->roomId;
    }

    /**
     * Set ipAdress
     *
     * @param string $ipAdress
     *
     * @return Views
     */
    public function setIpAdress($ipAdress)
    {
        $this->ipAdress = $ipAdress;

        return $this;
    }

    /**
     * Get ipAdress
     *
     * @return string
     */
    public function getIpAdress()
    {
        return $this->ipAdress;
    }
}

