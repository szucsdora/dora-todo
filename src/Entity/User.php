<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User implements UserInterface, \Serializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
     /**
      * @ORM\Column(type="string", length=128, name="full_name")
      */
     private $fullName;
     public function getFullName()
    {
        return $this->full_name;
    }

    public function setFullName($full_name)
    {
        $this->fullName = $full_name;
    }
    /**
    * @ORM\Column(type="string", length=32, name="user_name")
    */
     private $username;
     public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }
   /**
    * @ORM\Column(type="string", length=128, name="e_mail_address")
    */
     private $eMailAddress;
     public function geteMailAddress()
    {
        return $this->e_mail_address;
    }

    public function seteMailAddress($e_mail_address)
    {
        $this->$eMailAddress = $e_mail_address;
    }
   /**
    * @ORM\Column(type="string", length=64, name="password")
    */
     private $password;
     public function getpassword()
    {
        return $this->password;
    }

    public function setpassword($password)
    {
        $this->password = $password;
    }


    public function getSalt()
    {
        // you *may* need a real salt depending on your encoder
        // see section on salt below
        return null;
    }
    public function getRoles()
     {
         return array('ROLE_USER');
     }

     public function eraseCredentials()
     {
     }

    /** @see \Serializable::serialize() */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            // $this->salt,
        ));
    }

    /** @see \Serializable::unserialize() */
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->password,
            // $this->salt
        ) = unserialize($serialized);
    }
}
