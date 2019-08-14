<?php

namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SubCategory
 *
 * @ORM\Table(name="sub_category")
 * @ORM\Entity(repositoryClass="BackendBundle\Repository\SubCategoryRepository")
 */
class SubCategory
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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name.
     *
     * @param string $name
     *
     * @return SubCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set category.
     *
     * @param int $category
     *
     * @return SubCategory
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return int
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Categories", inversedBy="sub_categories")
     * @ORM\JoinColumn(name="category", referencedColumnName="id")
     */
    private $category;


}
