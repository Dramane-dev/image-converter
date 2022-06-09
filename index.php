<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">

    <title>Image Converter</title>
</head>
    <body>
        <div class="title-container">
            <h1>Image Converter</h1>
        </div>

        <form class="form-container" action="upload.php" method="post" enctype="multipart/form-data">
            <label for="quality">Sélectionner un pourcentage :</label>
            <select class="select" name="quality" id="quality">
                <option value="10">10%</option>
                <option value="20">20%</option>
                <option value="30">30%</option>
                <option value="40">40%</option>
                <option value="50">50%</option>
                <option value="60">60%</option>
                <option value="70">70%</option>
                <option value="80">80%</option>
                <option value="90">90%</option>
                <option value="100">100%</option>
            </select>

            <input type="hidden" name="MAX_FILE_SIZE" value="300000" />

            <label>Sélectionner une image :</label>

            <!-- <input id="fileToUpload" class="fileToUpload" name="fileToUpload" type="file" data-multiple-caption="{count} files selected" multiple /> -->
            <input id="fileToUpload" class="fileToUpload" type="file" name="fileToUpload" data-multiple-caption="{count} files selected" multiple="">
            <label class="upload-file-input" for="fileToUpload">
                <span>Choisir</span>
            </label>
            <input id="submit-button" class="submit-button" name="submit" type="submit" value="Upload" disabled/>
        </form>

        <script src="js/countFile.js"></script>
    </body>
</html>