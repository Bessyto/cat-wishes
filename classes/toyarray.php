<?php

Class ToyArray extends DataObject
{
    private $toys = "none";

    function __construct(){
        $dataObject = new DataObject();
        $dbh = $dataObject.connect();
        $this->toys = $dataObject.getItems('toys');
        $dataObject.close();
    }

    function getToys(){
        return $this->toys;
    }
}