<?php
    class WebpConverter
    {
        protected string $uploadDirectory;
        protected array $files;
        protected string $uploadFile;

        public function __construct(string $uploadDirectory, array $files, string $uploadFile) {
            $this->uploadDirectory = $uploadDirectory;
            $this->files = $files;
            $this->uploadFile = $uploadFile;
        }

        public function uploadFile() {
            $uploadFilePath = $this->uploadDirectory . basename($this->files["fileToUpload"]["name"]);
            $uploadFileIsOk = 1;

            if (isset($_POST["submit"])) {
                $check = getimagesize($this->files["fileToUpload"]["tmp_name"]);

                if($check !== false) {
                    echo "Le fichier est une image - " . $check["mime"] . ".\n\r";
                    $uploadFileIsOk = 1;
                } else {
                    echo "Le fichier n'est pas une image.\n\r";
                    $uploadFileIsOk = 0;
                }
            }


            if(file_exists($uploadFilePath)) {
                echo "Désolé, l'image existe déjà.\n\r";
                $uploadFileIsOk = 0;
            }

            if ($uploadFileIsOk == 0) {
                echo "Désolé, votre image n'a pu être upload.\n\r";
            } else { 
                if (move_uploaded_file($this->files["fileToUpload"]["tmp_name"], $uploadFilePath)) {
                    echo "Le fichier " . htmlspecialchars(basename($this->files["fileToUpload"]["name"])) . " a été upload.\n\r";
                } else {
                    echo "Désolé, une erreur est survenue lors de l'upload du fichier.\n\r";
                    print_r($this->files);
                }
            }
            return $uploadFilePath;
        }

        public function convertImage($source, $quality = 100, $removeOld = false) {
            $directory = pathinfo($source, PATHINFO_DIRNAME);
            $name = pathinfo($source, PATHINFO_FILENAME);
            $destination = $directory . DIRECTORY_SEPARATOR . $name . ".webp";
            $info = getimagesize($source);
            $isAlpha = false;
            $image = ($info["mime"] == "image/jpeg") ? imagecreatefromjpeg($source) : ($info["mime"] == "image/gif" ? imagecreatefromgif($source) : imagecreatefrompng($source));
            $isAlpha = ($info["mime"] == "image/jpeg") ? false : true;

            if ($isAlpha) {
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
            }

            imagewebp($image, $destination, $quality);

            if (removeOld) {
                unlink($source);
            }
            return $destination;
        }
    }
?>