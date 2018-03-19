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
class DBItems extends DBObject
{
    /**
     * Get a specified number/all items (all rows) from a table in the Database
     * @param $table - the table to pull from
     * @param $numReturn - the number of results to return
     * @return mixed
     */
    function getItems($table, $numReturn = 0)
    {
        //gives access to the variable in index
        global $dbh;
        $dbh = Parent::connect();

        //1. Define the query
        $sql = "SELECT * FROM " . $table . " ORDER BY recommendation DESC";

        if ($numReturn != 0) {
            $sql = $sql . " LIMIT :number";
        }

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        if ($numReturn != 0) {
            $statement->bindParam(':number', $numReturn, PDO::PARAM_INT);
        }

        //4.Execute statement
        $statement->execute();

        //5. Return the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        //print_r($result);

        Parent::disconnect();
        return $result;
    }

    /**
     * Function to update (do a recommendation) an specific item in the db
     * @param $table
     * @param $id
     * @param $recommendation
     */
    function updateRecommendation($table, $id, $recommendation)
    {
        //gives access to the variable in index
        global $dbh;
        $dbh = Parent::connect();

        //1. Define the query
        $sql = "UPDATE " . $table . " SET recommendation = :recommendation WHERE id = :id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $idNum = intval($id);
        $recNum = intval($recommendation);
        $statement->bindParam(':id', $idNum, PDO::PARAM_INT);
        $statement->bindParam(':recommendation', $recNum, PDO::PARAM_INT);

        echo "$table $idNum $recNum";

        //4.Execute statement
        $statement->execute();

        Parent::disconnect();

        //5. Return the results
        return;
    }

}
?>