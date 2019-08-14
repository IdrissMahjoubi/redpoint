<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="Categories")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\CategoriesRepository")
 */
class Categories
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
     */
    private $name;


    /**
     * @ORM\OneToOne(targetEntity="BackendBundle\Entity\Media", cascade={"persist", "remove"})
     */
    private $image;


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
     * Set nom
     *
     * @param string $name
     *
     * @return Categories
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set image
     *
     * @param Media $image
     *
     * @return Categories
     */
    public function setImage(Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return Media
     */
    public function getImage()
    {
        return $this->image;
    }

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * One product has many features. This is the inverse side.
     * @ORM\OneToMany(targetEntity="SubCategory", mappedBy="category")
     */
    private $sub_categories;

    public function __construct() {
        $this->sub_categories = new ArrayCollection();
    }
}
