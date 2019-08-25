<?php

namespace UserBundle\Entity;



use BackendBundle\Entity\Media;
use BackendBundle\Entity\Pricing;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="UserBundle\Repository\UserRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="type" ,type="text")
 * @ORM\DiscriminatorMap({"user" = "User", "member" = "Member","company" = "Company"})
 * @ORM\Table(name="app_user")
 */

class User extends BaseUser
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="string", length=255,nullable=true)
     */
    protected $address;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="upated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="BackendBundle\Entity\Product", inversedBy="wishlistUsers")
     */
    protected $productWishlist;

    public function __construct()
    {
        parent::__construct();

        $this->createdAt    = new \DateTime();
        $this->updatedAt    = $this->createdAt;
        $this->productWishlist = new ArrayCollection();
    }
    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="BackendBundle\Entity\Media", cascade={"persist"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="image_id",referencedColumnName="id")
     *
     */
    protected $image;

    /**
     * Set image
     *
     * @param Media|null $image
     *
     * @return User
     */
    public function setImage(Media $image = null)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return \BackendBundle\Entity\Media|null
     */
    public function getImage()
    {
        return $this->image;
    }

    public function setCreatedAt()
    {
        // never used
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @ORM\PreUpdate()
     *
     * @return User
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \DateTime();
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    protected $type;


    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */

    public function setType($type)
    {
        $this->type = $type;
    }



    /**
     * Add productWishlist.
     *
     * @param \BackendBundle\Entity\Product $productWishlist
     *
     * @return User
     */
    public function addProductWishlist(\BackendBundle\Entity\Product $productWishlist)
    {
        if (!$this->productWishlist->contains($productWishlist)) {
            $this->productWishlist[] = $productWishlist;
        }
        return $this;
    }

    /**
     * Remove productWishlist.
     *
     * @param \BackendBundle\Entity\Product $productWishlist
     *
     * @return User
     */
    public function removeProductWishlist(\BackendBundle\Entity\Product $productWishlist)
    {
        if ($this->productWishlist->contains($productWishlist)) {
             $this->productWishlist->removeElement($productWishlist);
        }
        return $this;
    }

    /**
     * Get productWishlist.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductWishlist()
    {
        return $this->productWishlist;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }


    /**
     * @var Pricing
     * Many Images have one (the same) Product
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\Pricing", inversedBy="users")
     * @ORM\JoinColumn(name="pricing_id", referencedColumnName="id")
     */
    protected $package;




    /**
     * Set package.
     *
     * @param \BackendBundle\Entity\Pricing|null $package
     *
     * @return User
     */
    public function setPackage(\BackendBundle\Entity\Pricing $package = null)
    {
        $this->package = $package;

        return $this;
    }

    /**
     * Get package.
     *
     * @return \BackendBundle\Entity\Pricing|null
     */
    public function getPackage()
    {
        return $this->package;
    }


}
