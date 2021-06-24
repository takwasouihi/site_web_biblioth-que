<?PHP
include "livres.php";

$p = new livres();
if (isset($_GET["id"])) {
    $p->supprimer($_GET["id"]);

    echo '<script type=""> location.replace("supprimer.html");</script>';


    echo '</script>';
} else {
    echo "cannot get this page";
}
?>