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
     * @param $id
     * @param $name
     * @param $description
     * @param $recommendations
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
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
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
     * @param string $name
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
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getRecommendations()
    {
        return $this->recommendations;
    }

    /**
     * @param int $recommendations
     */
    public function setRecommendations($recommendations)
    {
        $this->recommendations = $recommendations;
    }
}