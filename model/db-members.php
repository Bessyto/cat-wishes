<?php
/**
 * The basic class for connecting to the database and getting member information.
 *
 * @author Melanie Felton & Bessy Torres-Miller
 * @copyright  2018
 * @version 0.1
 */


/**
 * Class DBMembers extends DBObject adding the ability to check if a member
 * exists.
 *
 * @author Melanie Felton & Bessy Torres-Miller
 * @copyright  2018
 */
class DBMembers extends DBObject
{
    /**
     * Function to check if the member is in the data base
     * @param $table - table in database that item should be added to
     * @param $username - username to check for existence
     * @param $password - password to check if it matches
     * @return int - which indicates the access level of the member or -1 if not a member
     */
    function checkMember($table, $username, $password)
    {
        //gives access to the variable in index
        global $dbh;
        $dbh = Parent::connect();

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

        $dbh = Parent::disconnect();

        if(empty($result)){
            return -1;
        }
        else{
            return $result['access'];
        }
    }
}
?>