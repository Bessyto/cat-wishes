<?php
/**
 * Class Furniture represents the furniture object that extends BasicObject class
 * and implements the iViewable class method
 *
 * @author Bessy Torres-Miller
 * @copyright 2017
 */
class Furniture extends BasicObject implements iViewable
{
    private $_image;

    /**
     * Toy constructor.
     * @param $_image image of the new furniture
     */
    public function __construct($id, $name = "Generic Furniture", $description = "Does nothing.", $recommendations = 0, $_image)
    {
        Parent::__construct($id, $name, $description, $recommendations);
        $this->_image = $_image;
    }


    /**
     * Getter for the image of the furniture
     * @return mixed image of the furniture
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * Setter of the furniture item
     * @param mixed $image of the furniture
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

}