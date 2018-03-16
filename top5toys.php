<?php
ini_set('display_error', 1);
error_reporting(E_ALL);

session_start();

require_once 'model/db-functions.php';

$itemsArray = getItems($toys,5);

foreach ($itemsArray as $item) {
    $image = $item['image'];
}
