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
     * @param $imageName
     * @return mixed
     */
    public function setImage($imageName);

    /**
     * @return mixed
     */
    public function getImage();
}