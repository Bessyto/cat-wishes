<?php

$basicObjectType = 'Toy';

$routeItem= $params['item'];
$f3->set('item', $params['item']);
$f3->set('basicObjectType', 'Toy');

$table = 'toys';
//create default
//$array = new ToyArray;
//$itemsArray = $array->getToys();
//
////create special cases
//if(strcmp(@basicObjectType, 'Toy') == 0) {
//    $array = new ToyArray;
//    $itemsArray = $array->getToys();
//}
$itemsArray = getItems($table);
$i = 0;

//    echo '<p style="color:green;"><pre style="color:white;">';
//    var_dump($itemsArray);
//    echo '</pre></p>';

foreach ($itemsArray as $item) {
    $id = $item['id'];
    $name = $item['name'];
    $description = $item['description'];
    $recommendations = $item['recommendation'];
    $image = $item['image'];

    $itemObj = null;
    if (strcmp($basicObjectType, 'Toy') == 0) {
        $itemObj = new Toy($id, $name, $description, $recommendations, $image);
    }
//        $itemObj = new Toy($id, $name, $description, $recommendations, $image);
    $toys[$i] = $itemObj;
    $i++;
}
//echo '<p style="color:red;"><pre style="color:white;">';
//var_dump($toys);
//echo '</pre></p>';
if (!is_null($toys)) {
    $arrayName = get_class($toys[0]) . 's';
    $f3->set($arrayName, $toys);
}

if (isset($_POST['submit'])) {

    if (isset($_POST['recommends'])) {
        $recommendItems = $_POST['recommends'];
//    echo '<p style="color:white;"><pre style="color:white;">';
//    var_dump($recommendItems);
//    echo '</pre></p>';
        foreach ($toys as $item) {
            if (in_array($item->getName(), $recommendItems)) {
                $table = strtolower($arrayName);
                $id = $item->getId();
                $recommendation = $item->getRecommendations() + 1;
                updateRecommendation($table, $id, $recommendation);
            }
        }
    }
    $member = true;
    if ($member && !empty($_POST['itemName'])) {

        echo '<p style="color:white;"><pre style="color:white;">';
        var_dump($_POST);
        echo '</pre></p>';
        $name = (empty($_POST['itemName'])) ? 'Something Went Wrong' : $_POST['itemName'];
        $description = (empty($_POST['description'])) ? '' : $_POST['description'];
        $recommendations = 1;
        $image = (empty($_POST['image'])) ? '' : $_POST['image'];
        $table = 'Toy';
        if ($basicObjectType == 'Toy') $table = 'toys';
        addItem($table, $name, $description, $recommendations, $image);
    }

    if(strpos($_POST['submit'],'Delete') === 0){
        $f3->reroute('/');
    }

    $f3->reroute('/recommend/'.$routeItem);
}

$template = new Template;
echo $template->render
('views/rank.html');
