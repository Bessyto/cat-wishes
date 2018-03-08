<?php
//    echo "<pre>";
//    var_dump($_POST);
//    echo "</pre>";

    if (!empty($_POST['username'] && $_POST['password'])) {

        $username = (empty($_POST['username'])) ? 'Something Went Wrong' : $_POST['username'];
        $password = (empty($_POST['password'])) ? '' : $_POST['password'];
        $table = "cat_members";

        if (checkMember($table, $username, $password))
        {
            //passing username to session
            $_SESSION['username']=$username;
        }
        else{
//
            session_destroy();
        }

    }

    if (!empty($_POST['logout']))
    {
        unset($_SESSION['username']);
        $_POST['username'] ='';
        session_destroy();
        $f3->reroute('http://www.amazon.com');

    }




?>