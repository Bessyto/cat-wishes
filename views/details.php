<?php
    $table = $_POST['table'];
    $id = $_POST['id'];
//    echo "Got in details";
    include("../model/db-functions.php");
    $results = getItem(strtolower($table), $id);

//    echo '<pre>';
//
//    var_dump($results);
//    echo '<pre>';
//
//["id"]=>
//  string(1) "1"
//[0]=>
//  string(1) "1"
//["name"]=>
//  string(13) "Laser Pointer"
//[1]=>
//  string(13) "Laser Pointer"
//["description"]=>
//  string(149) "A fun red laser that can be used to give your pets plenty of exercise.  Just point the laser and move it around and watch cats chase and hunt the dot"
//[2]=>
//  string(149) "A fun red laser that can be used to give your pets plenty of exercise.  Just point the laser and move it around and watch cats chase and hunt the dot"
//["recommendation"]=>
//  string(2) "37"
//[3]=>
//  string(2) "37"
//["image"]=>
//  string(23) "images/laserPointer.jpg"
//[4]=>
//  string(23) "images/laserPointer.jpg"
echo '<div class="row">';
echo '<div class="col-md-2"></div>';
echo '<div class="col-md-3">';
echo "<h1>".$results['name']."</h1>";
echo "<p>".$results['description']."</p>";
echo "<p>Recommendations: ".$results['recommendation']."</p>";
echo '</div>';
echo '<div class="col-md-1"></div>';
echo '<div class="col-md-4">';
if(strlen($results['image']) != 0) {
    echo "<img src='../" . $results['image'] . "' class='col-md-12' alt='" . $results['name'] . "'>";
}

echo '<div class="col-md-2"></div>';
echo '</div>';
echo '</div>';
?>