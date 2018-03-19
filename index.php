<?php
/*
 * Cat-Wishes Final Project
 * IT-328
 * index.php
 * Melanie Felton
 * Bessy Torres-Miller
 *
 * This is the index file that defines the different routes using Fat-Free
 */

ini_set('display_error', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');
session_start();

$f3 = Base::instance();
$f3->set("DEBUG", 3);

require('userLogin.php');

//Defines the array that contains the images of the carousel
$f3->set("Carousel", array("Toys" => "images/carouselToys.jpg", "Food" => "images/carouselFood.jpg",
    "Furniture" => "images/carouselFurniture.jpg", "Vets" => "images/carouselVet.jpg"));

//home page route
$f3->route('GET|POST /', function ($f3, $params) {

    require('top5toys.php');

    $template = new Template;
    echo $template->render
    ('views/home.html');
}
);

//Route to recommend items, passing the item as a param
$f3->route('GET|POST /recommend/@item', function ($f3, $params) {

    require('recommendBuilder.php');

    $template = new Template;
    echo $template->render
    ('views/rank.html');

}
);

//Route to search page, where the cat API is used
$f3->route('GET /search', function () {
    $template = new Template;
    echo $template->render
    ('views/cat-api.html');
}
);

$f3->run();
?>
