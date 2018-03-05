<?php

class Vets extends BasicObject
{
    private $_address;
    private $_link;
    private $_phone;

    /**
     * Vets constructor.
     * @param $id
     * @param string $name
     * @param int $recommendations
     * @param $address
     * @param $link
     * @param $phone
     */
    public function __construct($id, $name = "Generic Vet", $recommendations = 0, $address = "", $link = "", $phone = "")
    {
        Parent::__construct($id, $name, $address, $recommendations);
        $this->_address = $address;
        $this->_link = $link;
        $this->_phone = $phone;

    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->_address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->_address = $address;
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->_link;
    }

    /**
     * @param mixed $link
     */
    public function setLink($link)
    {
        $this->_link = $link;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->_phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->_phone = $phone;
    }


}