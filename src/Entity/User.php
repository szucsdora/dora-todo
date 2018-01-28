<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 * @ORM\Table(name="users")
 */
class User
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
     public function getfullName()
    {
        return $this->full_name;
    }

    public function setfullName($full_name)
    {
        $this->fullName = $full_name;
    }
    /**
    * @ORM\Column(type="string", length=32, name="user_name")
    */
     private $userName;
     public function getuserName()
    {
        return $this->user_name;
    }

    public function setuserName($user_name)
    {
        $this->userName = $user_name;
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
}
