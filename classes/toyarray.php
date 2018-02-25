<?php

Class ToyArray extends DataObject
{
    private $toys = "none";

    function __construct(){
        $dataObject = new DataObject();
        $dbh = $dataObject->connect();
        $items = $dataObject->getItems('toys');
        $dataObject->close();

        //change all items retrieved into toys
        $i = 0;
        foreach ($items as $item) {
            $id = $item['id'];
            $name = $item['name'];
            $description = $item['description'];
            $recommendations = $item['recommendation'];
            $image = $item['image'];

//            $itemObj = null;
//            if (strcmp($basicObjectType, 'Toy') == 0) {
                $itemObj = new Toy($id, $name, $description, $recommendations, $image);
//            }
//        $itemObj = new Toy($id, $name, $description, $recommendations, $image);
            $this->toys[$i] = $itemObj;
            $i++;
        }
    }

    function getToys(){
        return $this->toys;
    }
}