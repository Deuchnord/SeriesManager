<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\EquatableInterface;

/**
 * @author Jérôme Deuchnord <contact@deuchnord.fr>
 * @ORM\Entity
 */
class User implements UserInterface, EquatableInterface
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
	 * 
	 * @var array
	 * @ORM\Column(type="array")
	 * @Required
	 */
	private $roles;

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

	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\UserInterface::getRoles()
	 */
	public function getRoles() {
		return $this->roles;
	}
	
	/**
	 * Sets the user's roles
	 * @param array $roles
	 */
	public function setRoles(array $roles) {
		$this->roles = $roles;
	}

	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\UserInterface::getSalt()
	 */
	public function getSalt() {
		return null;
	}

	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\UserInterface::eraseCredentials()
	 */
	public function eraseCredentials() {
		$this->password = "";
	}

	/**
	 * {@inheritDoc}
	 * @see \Symfony\Component\Security\Core\User\EquatableInterface::isEqualTo()
	 */
	public function isEqualTo(UserInterface $user) {
		return ($this->id == $user->getId());
	}

}