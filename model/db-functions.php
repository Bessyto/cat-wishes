<?php
/**
 *
 * User: PCC
 * Date: 2/18/2018
 * Time: 1:56 PM
 */

require ("getConfig.php");


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

//    function disconnect($dbh)
//    {
//        $dbh = "";
//    }
    
    function updateRecommendation($table, $id, $recommendation)
    {
        //gives access to the variable in index
        global $dbh;

        //1. Define the query
//    $sql = "UPDATE :table SET recommendation = :recommendation WHERE id = :id";
        $sql = "UPDATE " . $table . " SET recommendation = :recommendation WHERE id = :id";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $idNum = intval($id);
        $recNum = intval($recommendation);
//    $statement->bindValue(':table',$table, PDO::PARAM_STR );
        $statement->bindParam(':id', $idNum, PDO::PARAM_INT);
        $statement->bindParam(':recommendation', $recNum, PDO::PARAM_INT);

        echo "$table $idNum $recNum";

        //4.Execute statement
        $statement->execute();

        //5. Return the results

        return;

    }

    function addItem($table, $name, $description, $recommendation =1, $image = "")
    {
        //gives access to the variable in index
        global $dbh;

        //1. Define the query
        $sql = "INSERT INTO ".$table;
        $sql = $sql . " (name, description,";
        $sql = $sql . " recommendation";
//        if(strlen( $image) != 0) $sql = $sql . ", image";
        $sql = $sql.") ";

//    $sql = $sql."VALUES ( 'Catnip Sock', 'A baby sock filled with catnip', ";
//    $sql = $sql." 1 , '')";
//    echo $sql;
        $sql = $sql . "VALUES ( :name, :description, ";
        $sql = $sql . ":recommendation";
//        if(strlen( $image) != 0) $sql = $sql . ", :image";
        $sql = $sql.")";

        //2. Prepare the statement
        $statement = $dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':name', $name, PDO::PARAM_STR);
        $statement->bindParam(':description', $description, PDO::PARAM_STR);
        $statement->bindParam(':recommendation', $recommendation, PDO::PARAM_INT);
//        if(strlen( $image) != 0) $statement->bindParam(':image', $image, PDO::PARAM_STR);

        //4.Execute statement
        $statement->execute();

        //5. Return the results
        return;

    }

//Get One Toy (a single row) from Database
    function getToy($table, $id)
    {
        //gives access to the variable in index
        global $dbh;

        //1. Define the query
        $sql = "SELECT id, name, description, recommendation, image FROM ". $table ." WHERE id = :id";

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

//Get Toys from Database
    function getItems($table)
    {
        //gives access to the variable in index
        global $dbh;

        //1. Define the query
        $sql = "SELECT * FROM " . $table;
//        $sql = "SELECT * FROM toys";

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

    function deleteItem($table, $id)
    {
        //gives access to the variable in index
        global $dbh;

        //Define the query
        $sql = "DELETE * FROM " .$table. "WHERE id = :id";

        //Prepare the statement
        $statement = $dbh->prepare($sql);

        // Bind parameters
        $statement->bindParam(':id', $id, PDO::PARAM_STR);

        //4.Execute statement
        $statement->execute();
        
    }

//}