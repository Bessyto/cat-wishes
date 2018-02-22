<?php
$basicObjectType = 'Toy';
//    $basicObjectType = $params['basicObjectType'];
echo "$basicObjectType";
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
if(strcmp($basicObjectType,'Toy') == 0) {
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
}
$f3->reroute('/recommend');
}

$template = new Template;
echo $template->render
('views/rank.html');
