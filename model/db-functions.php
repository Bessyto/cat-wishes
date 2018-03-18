<?php
/**
 *
 * Melanie Felton
 * Bessy Torres-Miller
 * Date: 2/18/2018
 * Time: 1:56 PM
 * IT-328
 * db-functions.php
 *
 * This file has the different functions to communicate with the data base
 */

require ("getConfig.php");

/**
 * Function to connect to data base
 * @return PDO object
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
 * Function to update (do a recommendation) an specific item in the db
 * @param $table
 * @param $id
 * @param $recommendation
 */
function updateRecommendation($table, $id, $recommendation)
{
    //gives access to the variable in index
    global $dbh;

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

    //5. Return the results
    return;
}

/**
 * Function to add an item to the db
 * @param $table
 * @param $name
 * @param $description
 * @param int $recommendation
 * @param string $image
 */
function addItem($table, $name, $description, $recommendation =1, $image = "")
{
    //gives access to the variable in index
    global $dbh;

    //1. Define the query
    $sql = "INSERT INTO ".$table;
    $sql = $sql . " (name, description,";
    $sql = $sql . " recommendation";
    if(strlen( $image) != 0) $sql = $sql . ", image";
    $sql = $sql.") ";

    $sql = $sql . "VALUES ( :name, :description, ";
    $sql = $sql . ":recommendation";
    if(strlen( $image) != 0) $sql = $sql . ", :image";
    $sql = $sql.")";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':name', $name, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':recommendation', $recommendation, PDO::PARAM_INT);
    if(strlen( $image) != 0) $statement->bindParam(':image', $image, PDO::PARAM_STR);

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    return;

}

/**
 * Get One item (a single row) from Database
 * @param $table
 * @param $id
 * @return mixed
 */
function getItem($table, $id)
{
    //gives access to the variable in index
    global $dbh;
    $dbh = connect();
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

    return $result;
}

/**
 * Get items (multiple rows) from Database
 * @param $table
 * @param $numReturn
 * @return array
 */
function getItems($table,$numReturn=0)
{
    //gives access to the variable in index
    global $dbh;

    //1. Define the query
    $sql = "SELECT * FROM " . $table . " ORDER BY recommendation DESC";

    if($numReturn !=0){
        $sql = $sql . " LIMIT 5";
    }

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':table', $table, PDO::PARAM_STR);

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);

    return $result;
}

/**
 * Function to remove an specific item from the db
 * @param $table
 * @param $id
 */
function deleteItem($table, $id)
{
    //gives access to the variable in index
    global $dbh;
    $dbh = connect();

    //Define the query
    $sql = "DELETE FROM " .$table. " WHERE id = :id";

    echo $sql;

    //Prepare the statement
    $statement = $dbh->prepare($sql);

    // Bind parameters
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    //4.Execute statement
    $statement->execute();

}

/**
 * Function to check if the member is in the data base
 * @param $table
 * @param $username
 * @param $password
 * @return int
 */
function checkMember($table, $username, $password)
{
    //gives access to the variable in index
    global $dbh;

    //1. Define the query
    $sql = "SELECT * FROM " . $table. " WHERE username =:username AND password =SHA1(:password)";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetch();

    if(empty($result)){
        return -1;
    }
    else{
        return $result['access'];
    }
}

