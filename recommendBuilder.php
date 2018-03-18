<?php

$basicObjectType = $params['item'];

$routeItem= $params['item'];
$f3->set('item', $basicObjectType);
$f3->set('basicObjectType', ucfirst($basicObjectType));

$table = strtolower($basicObjectType);

if(isset($_POST['submit']) && (strpos($_POST['submit'],'Delete') === 0)){
    $idName = preg_replace('/[^\da-z]/i', '',trim(substr($_POST['submit'],7)));
    echo $idName."<br>";
    $id = $_POST[$idName];

    $table = strtolower($basicObjectType);
    echo $id."  ".$table."<br>";
    deleteItem($table,$id);
//        $f3->reroute('');
}

//getting 0 items makes no sense, so if ask for 0, returns all items
$itemsArray = getItems($table,0);
$i = 0;

foreach ($itemsArray as $item) {
    $id = $item['id'];
    $name = $item['name'];
    $description = $item['description'];
    $recommendations = $item['recommendation'];
    $image = $item['image'];

    $itemObj = null;
    if (strcmp($basicObjectType, 'toys') == 0) {
        $itemObj = new Toys($id, $name, $description, $recommendations, $image);
    }
    if (strcmp($basicObjectType, 'vets') == 0) {
        $itemObj = new Vets($id, $name , $description, $recommendations, "", "");
    }
    if (strcmp($basicObjectType, 'food') == 0) {
        $itemObj = new Food($id, $name , $description, $recommendations, "", "");
    }
    if (strcmp($basicObjectType, 'furniture') == 0) {
        $itemObj = new Furniture($id, $name , $description, $recommendations, "", "");
    }


    $catObjects[$i] = $itemObj;
    $i++;
}

if (!is_null($catObjects)) {
    $f3->set('catObjects', $catObjects);
}

if (isset($_POST['submit'])) {

    if (isset($_POST['recommends'])) {
        $recommendItems = $_POST['recommends'];

        foreach ($catObjects as $item) {
            if (in_array($item->getName(), $recommendItems)) {
//                $table = strtolower($arrayName);
                $id = $item->getId();
                $recommendation = $item->getRecommendations() + 1;
                updateRecommendation($table, $id, $recommendation);
            }
        }
    }
    $member = true;
    if ($member && !empty($_POST['itemName'])) {

        $name = (empty($_POST['itemName'])) ? 'Something Went Wrong' : $_POST['itemName'];
        $description = (empty($_POST['description'])) ? '' : $_POST['description'];
        $recommendations = 1;
        if(isset($_FILES[fileToUpload])) {
            require("model/upload.php");
        }
//        $image = (empty($_POST['image'])) ? '' : $_POST['image'];

        //sets a default for them to display
//        $table = 'toys';
        $table = $basicObjectType;
        $dbItem = new DBItem();
        $results = $dbItem->addItem(strtolower($table), $name, $description, $recommendations, $image);
    }

    unset($_POST);
    $f3->reroute('/recommend/'.$routeItem);
}

$template = new Template;
echo $template->render
('views/rank.html');
