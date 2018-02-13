<?php
ini_set('display_error' ,1);
error_reporting(E_ALL);
session_start();

require_once('vendor/autoload.php');

$f3 = Base::instance();
$f3->set("DEBUG",3);

$f3->route('GET /', function() {
    $template = new Template;
    echo $template->render
    ('views/home.html');
}
);

$f3->route('GET|POST /recommend', function($f3) {
//    $f3->set("recommend",$_POST['recommend']);
    $f3->set("basicObjectType","Toy");
//    $f3->set("Toys",array(array("Tear-apart Dog","Cat can tear apart dog and then you velcro him back together",5),
//        array("Tear-apart Doggy","Cat can tear apart dog and then you velcro him back together",5),
//        array("Long Dancing Fingers","Cat attacks tips of 'fingers' rather than yours.",6),
//        array("Catnip Ball","Soft ball filled with catnip your cat will chase until he drops",2),
//        array("Add A Toy Toy","Does your cat like something else? Add it here.",0)));
    $f3->set("Toys",array("Tear-apart Dog"=>5,"Tear-apart Doggy"=>6,"Long Dancing Fingers"=>10
            ,"Catnip Ball"=>3,"Add A Toy Toy"=>0));



    $template = new Template;
    echo $template->render
    ('views/rank.html');
}
);

$f3->run();
?>
