<?php

namespace Adoptez\AnimalsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pictures
 *
 * @ORM\Table(name="pictures")
 * @ORM\Entity(repositoryClass="Adoptez\AnimalsBundle\Repository\PicturesRepository")
 */
class Pictures
{
    /**
     * @ORM\ManyToOne(targetEntity="Adoptez\AnimalsBundle\Entity\Advert")
     * @ORM\JoinColumn(nullable=false)
     */

    private $advert;

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
     * @ORM\Column(name="url", type="string", length=255)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="alt", type="string", length=255)
     */
    private $alt = "Adopter un animal";

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=true)
     */
    private $position;

    public function setAdvert(Advert $advert)
    {
        $this->advert = $advert;

        return $this;
    }

    public function getAdvert()
    {
        return $this->advert;
    }

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
     * Set url
     *
     * @param string $url
     *
     * @return Pictures
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set alt
     *
     * @param string $alt
     *
     * @return Pictures
     */
    public function setAlt($alt)
    {
        $this->alt = $alt;

        return $this;
    }

    /**
     * Get alt
     *
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Pictures
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer
     */
    public function getPosition()
    {
        return $this->position;
    }



}
