<?php
/**
 * Class Toys represents a toy objects. Extends from BasicObject class and implements
 * the class IViewable methods
 */

/**
 * Class Toys
 * @author Bessy Torres-Miller
 * @author Melanie Felton
 * @copyright 2017
 */
class Toys extends BasicObject implements iViewable
{
    private $_image;

    /**
     * Toy constructor.
     * @param $_image of the object
     */
    public function __construct($id, $name = "Generic Toy", $description = "Does nothing.", $recommendations = 0, $_image)
    {
        Parent::__construct($id, $name, $description, $recommendations);
        $this->_image = $_image;
    }


    /**
     * Getter for image
     * @return mixed image of the item
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * Setter for image
     * @param mixed $image of the object
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

}