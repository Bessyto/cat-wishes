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
 * The Basic class representa a Basic Object with a name,
 * description and a count of the number of recommendations
 *
 * @author Melanie Felton (mfelton@mail.greenriver.edu)
 * @copyright 2017
 *
 */
class BasicObject
{
    protected $name;
    protected $description;
    protected $recommendations;

    /**
     * BasicObject constructor.
     * @param $name
     * @param $description
     * @param $recommendations
     */
    public function __construct($name = "Generic Toy", $description = "Does nothing.", $recommendations = 0)
    {
        $this->name = $name;
        $this->description = $description;
        $this->recommendations = $recommendations;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
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