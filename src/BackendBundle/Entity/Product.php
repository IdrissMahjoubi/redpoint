<?php

namespace BackendBundle\Entity;

use BackendBundle\Entity\Categories;
use BackendBundle\Entity\SubCategory;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;


/**
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\ProductRepository")
 */
class Product
{

    public function __construct() {
        $this->images = new ArrayCollection();
        $this->wishlistUsers = new ArrayCollection();

    }

    /**
     * @ORM\ManyToMany(targetEntity="UserBundle\Entity\User", mappedBy="productWishlist")
     */
    private $wishlistUsers;

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
     * @var SubCategory
     * @ORM\OneToOne(targetEntity="BackendBundle\Entity\SubCategory")
     * @ORM\JoinColumn(name="subCategory_id",referencedColumnName="id")
     *
     */
    private $subCategory;

    /**
     * @var ArrayCollection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\Media", mappedBy="product", cascade={"persist","remove"}, orphanRemoval=true)
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
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User",cascade={"persist"} )
     * @ORM\JoinColumn(name="user_id",referencedColumnName="id")
     *
     */
    private $user;


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
        $image->setProduct($this);
        $this->images[] = $image;

        return $this;
    }

    /**
     * Remove image
     *
     * @param Media $image
     */
    public function removeImage(Media $image)
    {
        $image->setProduct(null);
        $this->images->removeElement($image);
    }

    /**
     * Get images
     *
     * @return ArrayCollection
     */
    public function getImages()
    {
        return $this->images;
    }

    /**
     * Set categorie.
     *
     * @param Categories|null $categorie
     *
     * @return Product
     */
    public function setCategorie(Categories $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie.
     *
     * @return Categories|null
     */
    public function getCategorie()
    {
        return $this->categorie;
    }



    /**
     * Set user.
     *
     * @param \UserBundle\Entity\User|null $user
     *
     * @return Product
     */
    public function setUser(\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }


    /**
     * Get user.
     *
     * @return \UserBundle\Entity\User|null
     */
    public function getUser()
    {
        return $this->user;
    }



    /**
     * Add wishlistUser.
     *
     * @param \UserBundle\Entity\User $wishlistUser
     *
     * @return Product
     */
    public function addWishlistUser(\UserBundle\Entity\User $wishlistUser)
    {
        if (!$this->wishlistUsers->contains($wishlistUser)) {
            $this->wishlistUsers[] = $wishlistUser;
            $wishlistUser->addProductWishlist($this);
        }
        return $this;
    }

    /**
     * Remove wishlistUser.
     *
     * @param \UserBundle\Entity\User $wishlistUser
     *
     * @return Product
     */
    public function removeWishlistUser(\UserBundle\Entity\User $wishlistUser)
    {
        if ($this->wishlistUsers->contains($wishlistUser)) {
             $this->wishlistUsers->removeElement($wishlistUser);
            $wishlistUser->removeProductWishlist($this);
        }
        return $this;
    }

    /**
     * Get wishlistUsers.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getWishlistUsers()
    {
        return $this->wishlistUsers;
    }

    /**
     * Set subCategory.
     *
     * @param SubCategory|null $subCategory
     *
     * @return Product
     */
    public function setSubCategory(SubCategory $subCategory = null)
    {
        $this->subCategory = $subCategory;

        return $this;
    }

    /**
     * Get subCategory.
     *
     * @return SubCategory|null
     */
    public function getSubCategory()
    {
        return $this->subCategory;
    }
}
