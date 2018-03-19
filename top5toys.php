<?php
/*
 * Cat-Wishes Final Project
 * IT-328
 * top5toys.php
 * Melanie Felton
 * Bessy Torres-Miller
 *
 * This file call the function get items from the db-functions to get the 5 most recommended toys.
 * Put the images in an array, then pass it to the hive
 *
 */

$dbitems = new DBItems();
$itemsArray = $dbitems->getItems(toys, 5);

foreach ($itemsArray as $item) {
    $name = $item['name'];
    $image = $item['image'];

    $pics[$name] = $image;
}

if (!is_null($pics)) {
    $f3->set('pics', $pics);

}

