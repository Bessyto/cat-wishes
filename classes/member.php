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
     * Constructor of the class
     * Member constructor of the class
     * @param $username name of the member
     * @param $password password to login
     * @param $access level access
     */
    function __construct($username, $password, $access)
    {
        $this->username = $username;
        $this->password = $password;
        $this->access = $access;
    }

    /**
     * Getter for the username
     * @return mixed username of the member
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Setter for the username
     * @param mixed $username for the member
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Getter for password
     * @return mixed password used to login
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Password should be at 8 characters
     * @param mixed $password used to login
     */
    public function setPassword($password)
    {
        if(preg_match('[A-Za-z]{8}', $password)){
            $this->password = $password;
         }

        $this->password = $password;
    }

    /**
     * Getter for access level
     * @return mixed access level of the user
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Setter for access level
     * @param mixed $access level
     */
    public function setLevel($access)
    {
        $this->access = $access;
    }
}