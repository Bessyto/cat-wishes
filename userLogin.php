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

    if (isset($_POST['logout']))
    {
//        unset($_SESSION['username']);
//        $_POST['username'] ='';
//        session_destroy();


                session_unset();
                $f3->clear('SESSION');
                session_destroy();
                session_write_close();
                setcookie(session_name(),'',0,'/');
                session_regenerate_id(true);




        $f3->reroute('http://www.amazon.com');

    }




?>