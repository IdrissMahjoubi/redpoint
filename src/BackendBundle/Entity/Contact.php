<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contact
 *
 * @ORM\Table(name="Contact")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ContactRepository")
 */
class Contact
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
     * @ORM\Column(name="location", type="string", length=255)
     */
    private $location;
    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255)
     */
    private $adress;

    /**
     * @return string
     */
    public function getAdress()
    {
        return $this->adress;
    }

    /**
     * @param string $address
     */
    public function setAdress($address)
    {
        $this->adress = $address;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="numberone", type="string", length=255)
     */
    private $numberone;

    /**
     * @var string
     *
     * @ORM\Column(name="numbertwo", type="string", length=255)
     */
    private $numbertwo;

    /**
     * @var string
     *
     * @ORM\Column(name="map", type="text")
     */
    private $map;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;


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
     * Set location
     *
     * @param string $location
     *
     * @return Contact
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
     * Set numberone
     *
     * @param string $numberone
     *
     * @return Contact
     */
    public function setNumberone($numberone)
    {
        $this->numberone = $numberone;

        return $this;
    }

    /**
     * Get numberone
     *
     * @return string
     */
    public function getNumberone()
    {
        return $this->numberone;
    }

    /**
     * Set numbertwo
     *
     * @param string $numbertwo
     *
     * @return Contact
     */
    public function setNumbertwo($numbertwo)
    {
        $this->numbertwo = $numbertwo;

        return $this;
    }

    /**
     * Get numbertwo
     *
     * @return string
     */
    public function getNumbertwo()
    {
        return $this->numbertwo;
    }

    /**
     * Set map
     *
     * @param string $map
     *
     * @return Contact
     */
    public function setMap($map)
    {
        $this->map = $map;

        return $this;
    }

    /**
     * Get map
     *
     * @return string
     */
    public function getMap()
    {
        return $this->map;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Contact
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
}

