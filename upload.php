<?php
    $upload_directory = "uploads/";
    $upload_file = $upload_directory . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($upload_file, PATHINFO_EXTENSION));

    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".\n\r";
            $uploadOk = 1;
        } else {
            echo "File is not an image.\n\r";
            $uploadOk = 0;
        }
    }

    if(file_exists($upload_file)) {
        echo "Sorry, file already exists.\n\r";
        $uploadOk = 0;
    }

    echo $_FILES["fileToUpload"];

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.\n\r";
    } else { 
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $upload_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.\n\r";
        } else {
            echo "Sorry, there was an error uploading your file.\n\r";
            print_r($_FILES);
        }
    }
?>