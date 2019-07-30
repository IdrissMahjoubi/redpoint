<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ProductRepository")
 * @UniqueEntity(fields="nom", message="Ce projuit existe déjà avec ce nom.")
 */
class Product
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
     * @ORM\Column(name="name", type="string", length=125)
     * @Assert\NotBlank()
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\Length(min=2)
     */
    private $description;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     *
     * @ORM\OneToOne(targetEntity="BackendBundle\Entity\Media", cascade={"persist","remove"})
     * @ORM\JoinColumn(name="image_id",referencedColumnName="id")
     *
     */
    private $image;


    /**
     *
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\Categories",cascade={"persist"} )
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id")
     *
     */
    private $categorie;


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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }



    /**
     * Set image.
     *
     * @param \BackendBundle\Entity\Media|null $image
     *
     * @return Product
     */
    public function setImage(\BackendBundle\Entity\Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image.
     *
     * @return \BackendBundle\Entity\Media|null
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set categorie.
     *
     * @param \BackendBundle\Entity\Categories|null $categorie
     *
     * @return Product
     */
    public function setCategorie(\BackendBundle\Entity\Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie.
     *
     * @return \BackendBundle\Entity\Categories|null
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}
