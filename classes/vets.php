<?php
/*
 * This class represents the Vet object that extends from the BasicObject
 *
 */

/**
 * Class Vets represents a vet object
 * @author Bessy Torres-Miller
 * @author Melanie Felton
 * @copyright 2017
 */
class Vets extends BasicObject
{
     /**
     * Vets constructor.
     * @param $id id of the vet object
     * @param string $name of the vet
     * @param string $description of the vet
     * @param int $recommendations number of recommendations of the vet object, starts in 1
     *
     */
    public function __construct($id, $name = "Generic Vet", $description = "Does nothing." , $recommendations = 0)
    {
        Parent::__construct($id, $name, $description, $recommendations);

    }

}