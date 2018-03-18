<?php
/**
 * The basic class for connecting to the database.
 *
 * @author Melanie Felton
 * @copyright  2018
 * @version 0.1
 */

//loads the config data for either Bessy or Melanie or ...
require ("getConfig.php");

/**
 * Class DBObject controls the connection to the the database.
 * Specific types of request should extend this file.
 *
 * @author Melanie Felton
 * @copyright  2018
 */
class DBObject
{
    /**
     * The constructor of the class
     */
    function __contruct(){

    }

    /**
     * Function to connect to db
     * @return PDO
     */
    function connect()
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Function to disconnect from the db
     */
    function disconnect()
    {
        $dbh = "";
    }
}
?>