<?PHP
include "categories.php";

$c = new categories();
if (isset($_GET["id"]) and isset($_GET["name"])) {

    $c->supprimer_livres($_GET["name"]);
    $c->supprimer($_GET["id"]);

    echo '<script type=""> location.replace("supprimer_categorie.html");</script>';


    echo '</script>';

} else {
    echo "cannot get this page";
}
?>