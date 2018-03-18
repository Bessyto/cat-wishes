<?php
/**
 * The basic class for connecting to the database.
 *
 * @author Melanie Felton
 * @copyright  2018
 * @version 0.1
 */


/**
 * Class DBItem extends DBObject adding the ability to get an item.
 *
 * @author Melanie Felton
 * @copyright  2018
 */
class DBItem extends DBObject
{
    //Get One item (a single row) from Database
    function get($table, $id)
    {
        //gives access to the variable in index
        global $dbh;
        $dbh = Parent::connect();
        //1. Define the query
        $sql = "SELECT * FROM ". $table ." WHERE id = :id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        //4.Execute statement
        $statement->execute();

        //5. Return the results
        $result = $statement->fetch();

        Parent::disconnect();

        return $result;
    }
}
?>