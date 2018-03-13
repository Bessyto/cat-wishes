<?php
/**
 * This class is the normal member
 * User: Bessy Torres-Miller
 * Date: 2/12/2018
 * Time: 5:05 PM
 */

/**
 * Class Member will create a normal member for the dating site with general information
 * @author Bessy Torres-Miller
 * @copyright 2017
 *
 */
class Member
{
    //variables
    protected $username;
    protected $password;
    protected $access;

    /**
     * Member constructor of the class
     * @param $username
     * @param $password
     * @param $access
     */
    function __construct($username, $password, $access)
    {
        $this->username = $username;
        $this->password = $password;
        $this->access = $access;
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
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Password should be at 8 characters
     * @param mixed $password
     */
    public function setPassword($password)
    {
        if(preg_match('[A-Za-z]{8}', $password)){
            $this->password = $password;
         }

        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * @param mixed $access
     */
    public function setLevel($access)
    {
        $this->access = $access;
    }
}