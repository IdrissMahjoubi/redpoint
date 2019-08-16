<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Gallery
 *
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\GalleryRepository")
 */
class Gallery
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text",type="text",nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="description2", type="text",type="text",nullable=true)
     */
    private $description2;

    /**
     * @return string
     */
    public function getDescription2()
    {
        return $this->description2;
    }

    /**
     * @param string $description2
     */
    public function setDescription2($description2)
    {
        $this->description2 = $description2;
    }

    /**
     * @var Media
     * @ORM\OneToOne(targetEntity="BackendBundle\Entity\Media", cascade={"persist"}, orphanRemoval=true)
     * @ORM\JoinColumn(name="image_id",referencedColumnName="id")
     *
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

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
     * Set description
     *
     * @param string $description
     *
     * @return Gallery
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }



    /**
     * Set type
     *
     * @param string $type
     *
     * @return Gallery
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
     * Set image
     *
     * @param Media|null $image
     *
     * @return Gallery
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
}
