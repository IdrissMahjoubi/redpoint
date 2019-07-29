<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pricing
 *
 * @ORM\Table(name="pricing")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\PricingRepository")
 */
class Pricing
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
     * @ORM\Column(name="price", type="string", length=255)
     */
    private $price;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="advantages", type="string", length=255)
     */
    private $advantages;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    private $level;

    /**
     * @var bool
     *
     * @ORM\Column(name="for_enterprise", type="boolean")
     */
    private $forEnterprise;


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
     * Set price
     *
     * @param string $price
     *
     * @return Pricing
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
     * Set name
     *
     * @param string $name
     *
     * @return Pricing
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set advantages
     *
     * @param string $advantages
     *
     * @return Pricing
     */
    public function setAdvantages($advantages)
    {
        $this->advantages = $advantages;

        return $this;
    }

    /**
     * Get advantages
     *
     * @return string
     */
    public function getAdvantages()
    {
        return $this->advantages;
    }

    /**
     * Set level
     *
     * @param integer $level
     *
     * @return Pricing
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return int
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set forEnterprise
     *
     * @param boolean $forEnterprise
     *
     * @return Pricing
     */
    public function setForEnterprise($forEnterprise)
    {
        $this->forEnterprise = $forEnterprise;

        return $this;
    }

    /**
     * Get forEnterprise
     *
     * @return bool
     */
    public function getForEnterprise()
    {
        return $this->forEnterprise;
    }
}

