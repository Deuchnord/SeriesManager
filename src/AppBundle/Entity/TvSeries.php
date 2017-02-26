<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TV Series.
 * 
 * @author Jérôme Deuchnord <deuchnord@outlook.fr>
 * @ORM\Entity
 *
 */
class TvSeries
{
	/**
	 * 
	 * @var string
	 * @ORM\Id()
	 * @ORM\GeneratedValue(strategy="UUID")
	 * @ORM\Column(type="guid")
	 */
	private $id;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $name;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $author;
	
	/**
	 * 
	 * @var \DateTimeInterface
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $releasedAt;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $description;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(type="string", nullable=true)
	 */
	private $image;
	
	

    /**
     * Get id
     *
     * @return guid
     */
    public function getId()
    {
        return $this->id;
    }
    
    public function setId($id)
    {
    	$this->id = $id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return TvSeries
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
     * Set author
     *
     * @param string $author
     *
     * @return TvSeries
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set releasedAt
     *
     * @param \DateTime $releasedAt
     *
     * @return TvSeries
     */
    public function setReleasedAt($releasedAt)
    {
        $this->releasedAt = $releasedAt;

        return $this;
    }

    /**
     * Get releasedAt
     *
     * @return \DateTime
     */
    public function getReleasedAt()
    {
        return $this->releasedAt;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return TvSeries
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
     * @return TvSeries
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
    
    public function __toString()
    {
    	return $this->name;
    }
}
