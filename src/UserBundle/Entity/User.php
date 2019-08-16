<?php

namespace UserBundle\Entity;



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
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="upated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\ManyToMany(targetEntity="BackendBundle\Entity\Product", inversedBy="wishlistUsers")
     */
    private $productWishlist;

    public function __construct()
    {
        parent::__construct();

        $this->createdAt    = new \DateTime();
        $this->updatedAt    = $this->createdAt;
        $this->productWishlist = new ArrayCollection();
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
    public function __toString(){
        return $this->getUsername();
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
}
