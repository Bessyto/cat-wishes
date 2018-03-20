<?php
/**
 * Contains the Basic Object Class
 *
 * This class is the base for all cat wishes objects.
 *
 * @author Melanie Felton (mfelton@mail.greenriver.edu)
 * @version 0.1
 */

/**
 * Class "BasicObject" represents any object on the cat wishes website.
 *
 * The Basic class representa a Basic Object with an id, a name,
 * description and a count of the number of recommendations
 *
 * @author Melanie Felton (mfelton@mail.greenriver.edu)
 * @copyright 2017
 *
 */
class BasicObject
{
    protected $id;
    protected $name;
    protected $description;
    protected $recommendations;

    /**
     * BasicObject constructor.
     * @param $id id of the item
     * @param $name name of the item to construct
     * @param $description description of the item to create
     * @param $recommendations the number of recommendations, starts at 1
     */
    public function __construct($id = 0, $name = "Generic Item", $description = "Does nothing.", $recommendations = 0)
    {
        $this->id = $id;
        if(strlen($name) != 0) {
            $this->name = $name;
        } else {
            $name = "Unknown Item";
        }
        $this->description = $description;
        $this->recommendations = $recommendations;
    }

    /**
     * Getter for the id of the item
     * @return returns the id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the id of the item
     * @param id of the item
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Getter for the item name
     * @return string the name of the item if there is one
     */
    public function getName()
    {
        if(strlen($this->name) != 0) {
            return $this->name;
        } else {
            return "Unknown Item";
        }
    }

    /**
     * Set the name of the item
     * @param string name of the item
     */
    public function setName($name)
    {
        if(strlen($name) != 0) {
            $this->name = $name;
        } else {
            $name = "Unknown Item";
        }
    }

    /**
     * Get the description of the item
     * @return string description of the new item
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the description of the item
     * @param string $description of the item
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Getter for number of recommendations
     * @return int number of recommendations
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }

    /**
     * Set the number of recommendations in the item
     * @param int $recommendations of the item
     */
    public function setRecommendations($recommendations)
    {
        $this->recommendations = $recommendations;
    }
}