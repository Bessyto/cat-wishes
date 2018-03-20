<?php
/**
 * Interface iViewable
 *
 * @author Melanie Felton
 * @copyright 2017
 */
interface iViewable
{
    /**
     * Setter for image item
     * @param $imageName
     * @return mixed
     */
    public function setImage($imageName);

    /**
     * Getter for image item
     * @return mixed image
     */
    public function getImage();
}