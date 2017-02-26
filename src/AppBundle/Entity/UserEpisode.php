<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class UserEpisode {
	
	/**
	 * 
	 * @var User
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="User")
	 * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
	 */
	private $user;
	
	/**
	 * 
	 * @var Episode
	 * @ORM\Id
	 * @ORM\ManyToOne(targetEntity="Episode")
	 * @ORM\JoinColumn(name="episode_id", referencedColumnName="id")
	 */
	private $episode;
	
	/**
	 * 
	 * @var boolean
	 * @ORM\Column(type="boolean")
	 */
	private $current;
	
	/**
	 * The date the Entity has been watched, or <code>null</code> if the episode has not been watched.
	 * @var \DateTime
	 * @ORM\Column(type="datetime", nullable=true)
	 */
	private $watchedAt;
	

    /**
     * Set current
     *
     * @param boolean $current
     *
     * @return UserEpisode
     */
    public function setCurrent($current)
    {
        $this->current = $current;

        return $this;
    }

    /**
     * Get current
     *
     * @return boolean
     */
    public function getCurrent()
    {
        return $this->current;
    }

    /**
     * Set watchedAt
     *
     * @param \DateTime $watchedAt
     *
     * @return UserEpisode
     */
    public function setWatchedAt($watchedAt)
    {
        $this->watchedAt = $watchedAt;

        return $this;
    }

    /**
     * Get watchedAt
     *
     * @return \DateTime
     */
    public function getWatchedAt()
    {
        return $this->watchedAt;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return UserEpisode
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set episode
     *
     * @param \AppBundle\Entity\Episode $episode
     *
     * @return UserEpisode
     */
    public function setEpisode(\AppBundle\Entity\Episode $episode)
    {
        $this->episode = $episode;

        return $this;
    }

    /**
     * Get episode
     *
     * @return \AppBundle\Entity\Episode
     */
    public function getEpisode()
    {
        return $this->episode;
    }
}
