<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {

    $username = (empty($_POST['username'])) ? 'Something Went Wrong' : $_POST['username'];
    $password = (empty($_POST['password'])) ? '' : $_POST['password'];
    $table = "cat_members";

    $access = checkMember($table, $username, $password);
    $_SESSION['access'] = $access;

    if ($access >= 0) {
        $_SESSION['username'] = $username;
    }
}
if (isset($_POST['logout'])) {

    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(), '', 0, '/');

}


?>