<?php
/**
 *
 * User: PCC
 * Date: 2/18/2018
 * Time: 1:56 PM
 */

    //require("/home/mfeltong/config_files/config.php");
    require("/home/btorresm/config.php");


    function connect()
{
    try
    {
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
//        echo "<p>Connected to database!</p>";
        return $dbh;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}

function updateRecommendation($table, $id, $recommendation){
    //gives access to the variable in index
    global  $dbh;

    //1. Define the query
//    $sql = "UPDATE :table SET recommendation = :recommendation WHERE id = :id";
    $sql = "UPDATE ". $table . " SET recommendation = :recommendation WHERE id = :id";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $idNum = intval($id);
    $recNum = intval($recommendation);
//    $statement->bindValue(':table',$table, PDO::PARAM_STR );
    $statement->bindParam(':id', $idNum, PDO::PARAM_INT );
    $statement->bindParam(':recommendation', $recNum, PDO::PARAM_INT );

    echo "$table $idNum $recNum";

    //4.Execute statement
    $statement->execute();

    //5. Return the results

    return;

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
function getItems($table)
{
    //gives access to the variable in index
    global  $dbh;

    //1. Define the query
    $sql = "SELECT * FROM ".$table;

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters
    $statement->bindParam(':table',$table, PDO::PARAM_STR );

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($result);

    return $result;
}

