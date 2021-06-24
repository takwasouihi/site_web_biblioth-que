<?PHP
include "categories.php";


$c = new categories();

$c->modifiercategorie($_POST["ID"], $_POST["name"]);

sleep(5);

echo '<script type=""> location.replace("succes_modification_categorie.html");</script>';


echo '</script>';


?>















