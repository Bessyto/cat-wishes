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


$f3->route('GET /item', function () {
    $template = new Template;
    echo $template->render
    ('views/newItem.html');
}
);


$f3->run();
?>
