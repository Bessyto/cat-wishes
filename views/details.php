<?php
    $table = $_POST['table'];
    $id = $_POST['id'];
    //    echo "Got in details";
//    include("../model/db-functions.php");
//    $results = getItem(strtolower($table), $id);

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