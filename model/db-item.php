<?php
/**
 * Class DBItem extends DBObject adding the ability to get an item.
 *
 * @author Melanie Felton & Bessy Torres-Miller
 * @copyright  2018
 * @version 0.1
 */


/**
 * Class DBItem extends DBObject adding the ability to get an item.
 *
 * @author Melanie Felton & Bessy Torres-Miller
 * @copyright  2018
 */
class DBItem extends DBObject
{
    /**
     * Function to add an item to the db
     *
     * @param $table - table in database that item should be added to
     * @param $name - name of item to add
     * @param $description - description of item to add
     * @param int $recommendation - number of recommendations to add, starts at 1
     * @param string $image - image path associated with the item (optional)
     */
    function addItem($table, $name, $description, $recommendation = 1, $image = "")
    {
        //gives access to the variable in index
        global $dbh;
        $dbh = Parent::connect();

        //1. Define the query
        $sql = "INSERT INTO " . $table;
        $sql = $sql . " (name, description,";
        $sql = $sql . " recommendation";
        if (strlen($image) != 0) $sql = $sql . ", image";
        $sql = $sql . ") ";

        $sql = $sql . "VALUES ( :name, :description, ";
        $sql = $sql . ":recommendation";
        if (strlen($image) != 0) $sql = $sql . ", :image";
        $sql = $sql . ")";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':recommendation', $recommendation, PDO::PARAM_INT);
        if (strlen($image) != 0) $statement->bindParam(':image', $image, PDO::PARAM_STR);

        //4.Execute statement
        $statement->execute();

        // Disconnect from the database
        Parent::disconnect();

        //5. Return the results
        return;

    }

    /**
     * Get One item (a single row) from Database
     *
     * @param $table - table in database that item should be added to
     * @param $id - id number of the item to get
     * @return mixed - the result array containing information about the item
     */
    function get($table, $id)
    {
        //gives access to the variable in index
        global $dbh;
        $dbh = Parent::connect();
        //1. Define the query
        $sql = "SELECT * FROM " . $table . " WHERE id = :id";

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


    /**
     * Function to remove an specific item from the db
     *
     * @param $table - table in database that item should be added to
     * @param $id - id number of the item to get
     */
    function deleteItem($table, $id)
    {
        //gives access to the variable in index
        global $dbh;
        $dbh = Parent::connect();

        //Define the query
        $sql = "DELETE FROM " . $table . " WHERE id = :id";

        echo $sql;

        //Prepare the statement
        $statement = $dbh->prepare($sql);

        // Bind parameters
        $statement->bindParam(':id', $id, PDO::PARAM_INT);

        //4.Execute statement
        $statement->execute();

        Parent::disconnect();
    }
}
?>