<?php
include "../entity/categorie.php";
include "categories.php";

if (isset($_POST['ajout']) and isset($_POST['name'])) {

    $categorie = new Categorie($_POST["name"]);
    $categories = new categories();
    $categories->ajoutercategorie($categorie);

    ?>
    <script type=""> location.replace("succes_ajout_categorie.html");</script>
    <?php

} else {
    echo "Sorry, there was an error ";
}


?>