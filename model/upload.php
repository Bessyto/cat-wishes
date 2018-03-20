<?php
/*
    upload.php
    IT-328
    Cat-Wishes Final Project
    Melanie Felton & Bessy Torres-Miller

    This file checks the image that the user upload when recommends a new item.
    Check if the image file an image, check if it is repeated in the db, checks for the format
    and size of the image. If image name already exists, it modifies the target name.
*/

$image = "";
$target_dir = "./user_images/";
$imageErrorMessages = "";

if ((!empty($_FILES["fileToUpload"]["size"]))) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $imageErrorMessages += "File Upload Error: not an image.<br>";
        $uploadOk = 0;
    }

    // Check if file already exists or add a number if a duplicate
    $duplicateCount = 0;
    if (file_exists($target_file)) {
        $temp_file = $target_file;
        while (file_exists($temp_file)) {
            //strip of last duplicate count attempt by reverting to original
            $temp_file = $target_file;

            //add new duplicate count attempt
            $duplicateCount++;
            $tempParts = explode(".", $temp_file);

            $tempParts[count($tempParts) - 2] = $tempParts[count($tempParts) - 2] . $duplicateCount;

            $temp_file = implode(".",$tempParts);
        }
        $target_file = $temp_file;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $imageErrorMessages += "File Upload Error: image too large.<br>";
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $imageErrorMessages += "File Upload Error: wrong file type.<br>";
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $f3->set('imageErrorMessages',"Sorry, there was an error uploading your image.");
        echo "Sorry, your file was not uploaded.";
    }
    // if everything is ok, try to upload file
    else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            $image = $target_file;
        }
        else {
            $f3->set('imageErrorMessages',"Sorry, there was an error uploading your image.");
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>