<?php
$basicObjectType = 'Toy';
$f3->set('basicObjectType', 'Toy');

$table = 'toys';
$itemsArray = getItems($table);
$i = 0;

//    echo '<p style="color:white;"><pre style="color:white;">';
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
echo '<p style="color:white;"><pre style="color:white;">';
var_dump($toys);
echo '</pre></p>';
if (!is_null($toys)) {
    $arrayName = get_class($toys[0]) . 's';
    $f3->set($arrayName, $toys);
}

if (isset($_POST['submit'])) {
    $recommendItems = $_POST['recommends'];
    foreach ($toys as $item) {
        if (in_array($item->getName(), $recommendItems)) {
            $table = strtolower($arrayName);
            $id = $item->getId();
            $recommendation = $item->getRecommendations() + 1;
            updateRecommendation($table, $id, $recommendation);
        }
        $member = true;
        if ($member && in_array('new', $recommendItems) && !empty($_POST['name'])) {
            $name =(empty($_POST['name'])) ? 'Something Went Wrong' : $_POST['name'];
            $description =(empty($_POST['description'])) ? '' : $_POST['description'];
            $recommendations = 1;
            $image =(empty($_POST['image'])) ? '' : $_POST['image'];
            $table = 'Toy';
            if($basicObjectType == 'Toy') $table = 'Toy';
            addItem($table, $name, $description, $recommendations, $image);
        }
    }
    $f3->reroute('/recommend');
}

$template = new Template;
echo $template->render
('views/rank.html');
