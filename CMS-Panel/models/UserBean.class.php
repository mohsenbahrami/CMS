<?php

/**
 * User Bean
 * Class standardize our data ... to make sure that the same class is being passed everywhere
 * @author Mohammadreza Tabatabaei <mohamadtus@gmail.com>
 * @date  July 02 2020
 */
class UserBean
{
    private $id;
    private $name;
    private $email;
    private $username;
    private $password;
    private $status;

    public function __construct($userArray)
    {
        $this->id = isset($userArray['id'])? $userArray['id'] : null;
        $this->name = $userArray['name'];
        $this->email = $userArray['email'];
        $this->username = $userArray['username'];
        $this->password = md5($userArray['password']);
        $this->status = isset($userArray['status'])? $userArray['status'] : 0;
    }

    /**
     * @return mixed|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return int|mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param int|mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }



}