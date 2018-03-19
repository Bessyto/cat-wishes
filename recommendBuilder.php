<?php

$basicObjectType = $params['item'];
$accessLevel = $_SESSION['access'];

$routeItem= $params['item'];
$f3->set('item', $basicObjectType);
$f3->set('basicObjectType', ucfirst($basicObjectType));

$table = strtolower($basicObjectType);

if(($accessLevel==2) && isset($_POST['submit']) && (strpos($_POST['submit'],'Delete') === 0)){
    $idName = preg_replace('/[^\da-z]/i', '',trim(substr($_POST['submit'],7)));
    echo $idName."<br>";
    $id = $_POST[$idName];

    $table = strtolower($basicObjectType);
    echo $id."  ".$table."<br>";
    deleteItem($table,$id);
    unset($_POST);
    $f3->reroute('/recommend/'.$routeItem);
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

    if (($accessLevel>=0) && !empty($_POST['itemName'])) {
        $addItemValid  = false;
        $name = (empty($_POST['itemName'])) ? 'Something Went Wrong' : $_POST['itemName'];
        $description = (empty($_POST['description'])) ? '' : $_POST['description'];

        // makes sure the string contains only common characters
        function validateString($string)
        {
            $newString = preg_replace('/[^\da-z,. -]/i', '',$string);
            return strcmp($string,$newString)==0;
        }

        // makes sure the name contains some digits or letters and is a valid string
        function validateName($string){
            $letters = preg_replace('/[^\da-z]/i', '',$string);
            return strlen($letters)!= 0 && validateString($string);
        }


        if(validateName($name) && validateString($description))
        {
            $addItemValid= true;
        }


        //If name and description are valids, add them to the db
        if($addItemValid)
        {
            $recommendations = 1;
            if(isset($_FILES[fileToUpload])) {
                require("model/upload.php");
            }

            $table = $basicObjectType;
            $dbItem = new DBItem();
            $results = $dbItem->addItem(strtolower($table), $name, $description, $recommendations, $image);

        }
        else
        {
            echo "Invalid name or description";
        }

    }

    unset($_POST);

    if(!(strlen($f3->get('imageErrorMessages') > 1))){
        $f3->reroute('/recommend/' . $routeItem);
    }
}

$template = new Template;
echo $template->render
('views/rank.html');
