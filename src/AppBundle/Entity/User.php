<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 * @ApiResource
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=255)
     */
    private $firstname;

    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=255)
     * @Assert\NotBlank(message="Please enter your name.", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="The firstname is too short.",
     *     maxMessage="The firstname is too long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateOfBirth", type="date")
     */
    private $dateOfBirth;

    /**
     * @ORM\ManyToOne(targetEntity="Gender", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="gender_id", referencedColumnName="id")
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\ManyToOne(targetEntity="Currency", cascade={"all"}, fetch="EAGER")
     * @ORM\JoinColumn(name="devise_id", referencedColumnName="id")
     */
    private $currency;

    /**
     * @var string
     *
     * @ORM\Column(name="paypal_account", type="string", length=255)
     */
    private $paypalAccount;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_host", type="boolean")
     */
    protected $isHost;


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
     * Set firstname
     *
     * @param string $firstname
     *
     * @return User
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get firstname
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname
     *
     * @param string $lastname
     *
     * @return User
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get lastname
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return User
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set dateOfBirth
     *
     * @param \DateTime $dateOfBirth
     *
     * @return User
     */
    public function setDateOfBirth($dateOfBirth)
    {
        $this->dateOfBirth = $dateOfBirth;

        return $this;
    }

    /**
     * Get dateOfBirth
     *
     * @return \DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     * Set gender
     *
     * @param integer $gender
     *
     * @return User
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get gender
     *
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set currency
     *
     * @param integer $currency
     *
     * @return User
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set paypalAccount
     *
     * @param string $paypalAccount
     *
     * @return User
     */
    public function setPaypalAccount($paypalAccount)
    {
        $this->paypalAccount = $paypalAccount;

        return $this;
    }

    /**
     * Get paypalAccount
     *
     * @return string
     */
    public function getPaypalAccount()
    {
        return $this->paypalAccount;
    }

    /**
     * Set isHost
     *
     * @param boolean $isHost
     *
     * @return User
     */
    public function setIsHost($isHost)
    {
        $this->isHost = $isHost;

        return $this;
    }

    /**
     * Get isHost
     *
     * @return bool
     */
    public function getIsHost()
    {
        return $this->isHost;
    }
}
