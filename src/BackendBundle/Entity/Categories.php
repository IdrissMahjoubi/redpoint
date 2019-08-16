<?php

namespace BackendBundle\Entity;

use BackendBundle\Entity\SubCategory;
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

    public function __construct()
    {
        $this->subCategory = new ArrayCollection();
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
     */
    private $name;


    /**
     * @ORM\OneToOne(targetEntity="BackendBundle\Entity\Media", cascade={"persist", "remove"})
     */
    private $image;

    /**
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\SubCategory", mappedBy="category",cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $subCategory;



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
     * Add subCategory.
     *
     * @param SubCategory $subCategory
     *
     * @return Categories
     */
    public function addSubCategory(SubCategory $subCategory)
    {
        if (!$this->subCategory->contains($subCategory)) {
            $this->subCategory[] = $subCategory;
            $subCategory->setCategory($this);
        }
        return $this;
    }

    /**
     * Remove subCategory.
     *
     * @param SubCategory $subCategory
     *
     * @return Categories
     */
    public function removeSubCategory(SubCategory $subCategory = null)
    {
        if ($this->subCategory->contains($subCategory)) {
            $this->subCategory->removeElement($subCategory);
        }
        return $this;
    }


    /**
     * Get subCategory.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }
}
