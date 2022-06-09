<?php
    require_once("classes/WebpConverter.php");
    $webpConverter = new WebpConverter("uploads/", $_FILES, $_FILES["fileToUpload"]["tmp_name"]);
    $uploadeFilePath = $webpConverter->uploadFile();
    $webpConverter->convertImage($uploadeFilePath);
?>