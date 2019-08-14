<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Company
 * @ORM\Entity(repositoryClass="UserBundle\Repository\CompanyRepository")
 */
class Company extends User
{
    public function loadFromParentObj( $parentObj )
    {
        $objValues = get_object_vars($parentObj); // return array of object values
        foreach($objValues AS $key=>$value)
        {
            $this->$key = $value;
        }
    }

    /**
     * @var string
     *
     * @ORM\Column(name="companyName", type="string", length=255)
     */
    private $companyName;

    /**
     * @var string
     *
     * @ORM\Column(name="about", type="string", length=255)
     */
    private $about;

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
     * Set companyName
     *
     * @param string $companyName
     *
     * @return Company
     */
    public function setCompanyName($companyName)
    {
        $this->companyName = $companyName;

        return $this;
    }

    /**
     * Get companyName
     *
     * @return string
     */
    public function getCompanyName()
    {
        return $this->companyName;
    }

    /**
     * Set about
     *
     * @param string $about
     *
     * @return Company
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string
     */
    public function getAbout()
    {
        return $this->about;
    }

}
