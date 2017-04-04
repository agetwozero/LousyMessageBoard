<?php
/**
 * Created by PhpStorm.
 * User: wouter
 * Date: 4-4-17
 * Time: 9:59
 */

namespace FrozenAuth\Model;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class User
{
    use \FrozenAuth\Entity\User;

//    private $id;
//    private $name;
//    private $password;
//    private $email;
//
//    function __construct($name, $password, $email)
//    {
//        $this->name = $name;
//        $this->password = $password;
//        $this->email = $email;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getId()
//    {
//        return $this->id;
//    }
//
//    /**
//     * @param mixed $id
//     */
//    public function setId($id)
//    {
//        $this->id = $id;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getName()
//    {
//        return $this->name;
//    }

//    /**
//     * @param mixed $name
//     */
//    public function setName($name)
//    {
//        $this->name = $name;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getPassword()
//    {
//        return $this->password;
//    }
//
//    /**
//     * @param mixed $password
//     */
//    public function setPassword($password)
//    {
//        $this->password = $password;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getEmail()
//    {
//        return $this->email;
//    }
//
//    /**
//     * @param mixed $email
//     */
//    public function setEmail($email)
//    {
//        $this->email = $email;
//    }


}