<?php
ini_set('display_error', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
session_start();

require_once 'model/db-functions.php';

$f3 = Base::instance();
$f3->set("DEBUG", 3);

//Connect to the database
$dbh = connect();
/*
 * Maybe this will work to kill that annowing session!
 * <?php
    session_start();
    session_unset();
    session_destroy();
    session_write_close();
    setcookie(session_name(),'',0,'/');
    session_regenerate_id(true);
?>
 */
require('userLogin.php');

$f3->set("Carousel", array("Toys" => "images/carouselToys.jpg", "Food" => "images/carouselFood.jpg",
    "Furniture" => "images/carouselFurniture.jpg", "Vets" => "images/carouselVet.jpg"));

$f3->route('GET|POST /', function () {
    $template = new Template;
    echo $template->render
    ('views/home.html');
}
);

$f3->route('GET|POST /recommend/@item', function ($f3, $params) {


    require('recommendBuilder.php');

}
);


$f3->route('GET /search', function () {
    $template = new Template;
    echo $template->render
    ('views/cat-api.html');
}
);

$f3->run();
?>
