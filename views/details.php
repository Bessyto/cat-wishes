<?php
/*
 *  details.php
 *  Cat-Wishes Final Project
 *  IT-328
 *  Melanie Felton
 *
 *  This file is called by the AJAX and retrieves a single item, returns with the HTML formatting
 */
    $table = $_POST['table'];
    $id = $_POST['id'];

    include("../model/db-object.php");
    include("../model/db-item.php");

    $dbItem = new DBItem();
    $results = $dbItem->get(strtolower($table), $id);

    echo '<div class="row">';
    echo '<div class="col-md-2"></div>';
    echo '<div class="col-md-3">';
    echo "<h1>" . $results['name'] . "</h1>";
    echo "<p>" . $results['description'] . "</p>";
    echo "<p>Recommendations: " . $results['recommendation'] . "</p>";
    echo '</div>';
    echo '<div class="col-md-1"></div>';
    echo '<div class="col-md-4">';
    if (strlen($results['image']) != 0) {
        echo "<img src='../" . $results['image'] . "' class='col-md-12' alt='" . $results['name'] . "'>";
    }

    echo '<div class="col-md-2"></div>';
    echo '</div>';
    echo '</div>';
?>