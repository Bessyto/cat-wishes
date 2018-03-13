<?php
/**
 *  This class represents the food object extended from BasicObject
 * and implements the iViewable class method
 *
 * @author Bessy Torres-Miller / Melanie Felton
 * @copyright 2017
 */
class Food extends BasicObject implements iViewable
{
    private $_image;

    /**
     * Food constructor.
     * @param $_image
     */
    public function __construct($id, $name = "Generic Food", $description = "Does nothing.", $recommendations = 0, $_image)
    {
        Parent::__construct($id, $name, $description, $recommendations);
        $this->_image = $_image;
    }


    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

}