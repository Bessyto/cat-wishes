<?php
/* code to insert into an html file
<form action="model/upload.php" method="post" enctype="multipart/form-data">
                        Select image to upload:
                        <input type="file" name="fileToUpload" id="fileToUpload">
                        <input type="submit" value="Upload Image" name="submit">
                    </form>
*/
$image = "";
$target_dir = "./user_images/";
echo '<pre style="color:green">';
var_dump($_FILES);
echo '</pre>';
if ((!empty($_FILES["fileToUpload"]["size"]))) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    echo $target_file;
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
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


            echo '<pre style="color:blue">';
            var_dump($tempParts);
            echo $tempParts[count($tempParts) - 2];
            echo '</pre>';

            $tempParts[count($tempParts) - 2] = $tempParts[count($tempParts) - 2] . $duplicateCount;

            echo '<pre style="color:blue">';
            var_dump($tempParts);
            echo $tempParts[count($tempParts) - 2];
            echo '</pre>';

            $temp_file = implode(".",$tempParts);
        }
        $target_file = $temp_file;
    }

    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
//}
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            $image = $target_file;

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>