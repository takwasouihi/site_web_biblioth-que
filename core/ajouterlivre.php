<?php
include "../entity/Livre.php";
include "livres.php";

if (isset($_POST['ajout']) and isset($_POST['reference']) and isset($_POST['prix']) and isset($_POST['description']) and isset($_POST['categorie']) and isset($_POST['titre']) and isset($_POST['date'])) {
    $target_dir = "../views/livres/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    if (basename($_FILES["fileToUpload"]["name"] != '')) {
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

// Check file size
        if ($_FILES["fileToUpload"]["size"] > 1000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

                $livre = new livre(0, $_POST["reference"], $_POST["titre"], $_POST["date"], $_POST["auteur"], $_POST["categorie"], $_POST["description"], $_POST["stock"], basename($_FILES["fileToUpload"]["name"]), $_POST["prix"]);
                $livres = new livres();
                $livres->ajouterlivre($livre);


                ?>
                <script type=""> location.replace("succes_ajout.html");</script>
                <?php
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }

} else {
    echo "Sorry, there was an error uploading your file.";
}
?>