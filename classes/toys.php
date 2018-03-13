<?php
/**
 * Class Toys represents a toy objects. Extends from BasicObject class and implements
 * the class IViewable methods
 */

class Toys extends BasicObject implements iViewable
{
    private $_image;

    /**
     * Toy constructor.
     * @param $_image
     */
    public function __construct($id, $name = "Generic Toy", $description = "Does nothing.", $recommendations = 0, $_image)
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