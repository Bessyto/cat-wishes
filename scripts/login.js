/*
    login.js
    Cat-Wishes Final Project
    IT-328
    Bessy Torres-Miller
    Melanie Felton
    This file has the JQuery code for the user to Login and Logout in the site
 */


user = jQuery('<li class="list-inline-item"><input class="form-control form-control-sm" type="text" name="username" id="username" placeholder="username"></li>');
pass = jQuery('<li class="list-inline-item"><input class="form-control form-control-sm" type="password" name="password" id="password" placeholder="password"></li>');
submit = jQuery ('<li class="list-inline-item"><button id="submit" type="submit" name="login" class="btn btn-warning" href="./">Submit</button></li>');

$('button').click(function() {
        $('#login').hide("slow");
        $('.member').append(user);
        $('.member').append(pass);
        $('.member').append(submit);
    }
);