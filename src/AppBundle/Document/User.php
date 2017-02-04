<?php
// src/AppBundle/Document/User.php

namespace AppBundle\Document;
//User entity for fosuser
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @MongoDB\Document
 */
class User extends BaseUser
{
    /**
     * @MongoDB\Id(strategy="auto")
     */
    protected $id;
/**
     * @MongoDB\Field(type="string")
     */
    protected $name;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $email;
    /**
     * @MongoDB\Field(type="string")
     */
    protected $password;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

 public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
     public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
     public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
     public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}