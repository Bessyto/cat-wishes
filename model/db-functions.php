<?php
/**
 *
 * User: PCC
 * Date: 2/18/2018
 * Time: 1:56 PM
 */

require("/home/btorresm/config.php");

function connect()
{
    try
    {
        $dbh = new PDO("DBDSN", "DBUSERNAME", "DBPASSWORD");
        echo "<p>Connected to database!</p>";
        return $dbh;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}

//Get One Toy (a single row) from Database
function getToy($id)
{
    //gives access to the variable in index
    global  $dbh;

    //1. Define the query
    $sql = "SELECT id, name, description, recommendation, image FROM toys WHERE id = :id";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':id',$id, PDO::PARAM_STR );

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetch();

    return $result;
}

//Get Toys from Database
function getToys()
{
    //gives access to the variable in index
    global  $dbh;

    //1. Define the query
    $sql = "SELECT * FROM toys ";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);

    return $result;
}

