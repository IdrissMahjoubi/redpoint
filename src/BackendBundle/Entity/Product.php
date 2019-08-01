<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;


/**
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ProductRepository")
 */
class Product
{

    function __construct() {
        $this->images = new ArrayCollection();
    }

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
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\Media", mappedBy="product", cascade={"persist"})
     */
    private $images;


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
     * Add image
     *
     * @param Media $image
     *
     * @return Product
     */
    public function addImage(Media $image)
    {
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param Media$image
     */
    public function removeImage(Media $image)
    {
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getImages()
    {
        return $this->images;
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
