<?PHP
include_once "config.php";
include "livres.php";
session_start();
$idc = $_GET['id'];
$note = $_GET['note'];
$livres = $_GET['livre'];
if (isset($_GET['id'])) {

    $sql = " SELECT * from note where (id_client='$idc' and  id_livre=$livres)";
    $db = config::getConnexion();
    $listnote = $db->query($sql);
    if ($listnote->rowCount() == 0) {
        $l = new livres();
        $l->note($note, $idc, $livres);
        $l->AVG($livres);
        header("location:" . $_SERVER['HTTP_REFERER']);
    } else {


        $l = new livres();
        $l->updatenote($note, $idc, $livres);
        $l->AVG($livres);

        header("location:" . $_SERVER['HTTP_REFERER']);

    }
}
?>