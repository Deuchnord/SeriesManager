<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Jérôme Deuchnord <contact@deuchnord.fr>
 * @ORM\Entity
 */
class User
{
	/**
	 * 
	 * @var string
	 * @ORM\Id
	 * @ORM\GeneratedValue(strategy="UUID")
	 * @ORM\Column(type="guid")
	 */
	private $id;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $username;
	
	/**
	 * 
	 * @var string
	 * @ORM\Column(type="string")
	 */
	private $password;

    /**
     * id
     * @return string
     */
    public function getId(){
        return $this->id;
    }

    /**
     * username
     * @return string
     */
    public function getUsername(){
        return $this->username;
    }

    /**
     * username
     * @param string $username
     * @return User
     */
    public function setUsername($username){
        $this->username = $username;
        return $this;
    }

    /**
     * password
     * @return string
     */
    public function getPassword(){
        return $this->password;
    }

    /**
     * password
     * @param string $password
     * @return User
     */
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

}