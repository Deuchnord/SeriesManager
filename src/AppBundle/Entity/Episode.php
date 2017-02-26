<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * 
 * @author Jérôme Deuchnord <deuchnord@outlook.fr>
 * @ORM\Entity
 */
class Episode {
	
	/**
	 * 
	 * @var string
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="UUID")
	 * @ORM\Column(type="guid")
	 */
	private $id;
	
	/**
	 * The title of the episode
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $name;
	
	/**
	 * The number of the episode
	 * @var integer
	 * @ORM\Column(type="integer")
	 */
	private $episodeNumber = 1;
	
	/**
	 * 
	 * @var \DateTime
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $datePublished;
	
	/**
	 * The TV series the episode belongs to
	 * @var TvSeries
	 * @ORM\ManyToOne(targetEntity="TvSeries")
	 * @ORM\JoinColumn(name="tvSeries_id", referencedColumnName="id")
	 */
	private $tvSeries;
	
	/**
	 * The season of the $tvSeries the episode belongs to
	 * @var integer
	 * @ORM\Column(type="integer")
	 * @Assert\Range(
	 * 		min = 1,
	 * 		minMessage = "The season number cannot be less than 1. If there is no season, type 1."
	 * )
	 */
	private $season = 1;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $description;
	
	/**
	 * An URL to the image 
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $image;
	
	public function __construct()
	{
		$this->datePublished = new \DateTime();
	}

    /**
     * Get id
     *
     * @return guid
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Episode
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set episodeNumber
     *
     * @param integer $episodeNumber
     *
     * @return Episode
     */
    public function setEpisodeNumber($episodeNumber)
    {
        $this->episodeNumber = $episodeNumber;

        return $this;
    }

    /**
     * Get episodeNumber
     *
     * @return integer
     */
    public function getEpisodeNumber()
    {
        return $this->episodeNumber;
    }

    /**
     * Set datePublished
     *
     * @param \DateTime $datePublished
     *
     * @return Episode
     */
    public function setDatePublished($datePublished)
    {
        $this->datePublished = $datePublished;

        return $this;
    }

    /**
     * Get datePublished
     *
     * @return \DateTime
     */
    public function getDatePublished()
    {
        return $this->datePublished;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Episode
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
     * Set image
     *
     * @param string $image
     *
     * @return Episode
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set tvSeries
     *
     * @param \AppBundle\Entity\TvSeries $tvSeries
     *
     * @return Episode
     */
    public function setTvSeries(\AppBundle\Entity\TvSeries $tvSeries = null)
    {
        $this->tvSeries = $tvSeries;

        return $this;
    }

    /**
     * Get tvSeries
     *
     * @return \AppBundle\Entity\TvSeries
     */
    public function getTvSeries()
    {
        return $this->tvSeries;
    }
    
    public function __toString()
    {
    	return $this->name;
    }
	public function getSeason() {
		return $this->season;
	}
	public function setSeason($season) {
		$this->season = $season;
		return $this;
	}
	
}
