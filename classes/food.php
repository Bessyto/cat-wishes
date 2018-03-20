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
     * @param $_image image of the new food
     */
    public function __construct($id, $name = "Generic Food", $description = "Does nothing.", $recommendations = 0, $_image)
    {
        Parent::__construct($id, $name, $description, $recommendations);
        $this->_image = $_image;
    }


    /**
     * Getter for the image
     * @return image
     */
    public function getImage()
    {
        return $this->_image;
    }

    /**
     * Setter for the image
     * @param mixed $image image of the item
     */
    public function setImage($image)
    {
        $this->_image = $image;
    }

}