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
    function __contruct(){

    }

    function connect()
    {
        try {
            $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//        echo "<p>Connected to database!</p>";
            return $dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function disconnect()
    {
        $dbh = "";
    }
}
?>