<?php
include_once "config.php";

class livres
{

    function ajouterlivre($livre)
    {
        $sql = "insert into livres(reference ,titre,dateS ,nomAuteur,categorie,description,stock,prix ,image) values (:reference,:titre,:dateS,:nomAuteur,:categorie,:description,:stock,:prix,:image)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $req->bindValue(':reference', $livre->getReference());
            $req->bindValue(':titre', $livre->getTitre());
            $req->bindValue(':dateS', $livre->getDate());
            $req->bindValue(':nomAuteur', $livre->getNomAuteur());
            $req->bindValue(':description', $livre->getDescription());
            $req->bindValue(':image', $livre->getImage());
            $req->bindValue(':categorie', $livre->getCategorie());
            $req->bindValue(':prix', $livre->getPrix());
            $req->bindValue(':stock', $livre->getStock());

            $req->execute();

        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();
        }

    }

    function afficher($var)
    {

        $query = "SELECT * FROM livres LIMIT $var,6";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function afficherlivre($id)
    {

        $query = "SELECT * FROM livres where ID='$id' ";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }


    function modifierLivre($livre)
    {
        $sql = "UPDATE livres SET reference=:reference,titre=:titre, dateS=:dateS,nomAuteur=:nomAuteur,description=:description,image=:image,categorie=:categorie,prix=:prix,stock=:stock where ID= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':id', $livre->getId());
        $req->bindValue(':reference', $livre->getReference());
        $req->bindValue(':titre', $livre->getTitre());
        $req->bindValue(':dateS', $livre->getDate());
        $req->bindValue(':nomAuteur', $livre->getNomAuteur());
        $req->bindValue(':description', $livre->getDescription());
        $req->bindValue(':image', $livre->getImage());
        $req->bindValue(':categorie', $livre->getCategorie());
        $req->bindValue(':prix', $livre->getPrix());
        $req->bindValue(':stock', $livre->getStock());
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierLivre2($livre)
    {
        $sql = "UPDATE livres SET reference=:reference,titre=:titre, dateS=:dateS,nomAuteur=:nomAuteur,description=:description,categorie=:categorie,prix=:prix,stock=:stock where ID= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);

        $req->bindValue(':id', $livre->getId());
        $req->bindValue(':reference', $livre->getReference());
        $req->bindValue(':titre', $livre->getTitre());
        $req->bindValue(':dateS', $livre->getDate());
        $req->bindValue(':nomAuteur', $livre->getNomAuteur());
        $req->bindValue(':description', $livre->getDescription());
        $req->bindValue(':categorie', $livre->getCategorie());
        $req->bindValue(':prix', $livre->getPrix());
        $req->bindValue(':stock', $livre->getStock());
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimer($id)
    {

        $sql = "DELETE FROM livres WHERE 	ID ='" . $id . "'";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);

            $req->execute();
            return ("ok");
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();
            return ("no");
        }

    }

    function count()
    {
        $sql = "SELECT * FROM  livres";
        $db = config::getConnexion();
        try {
            $S = $db->query($sql);
            return $S->rowCount();
        } catch (Exception $err) {
            die('Erreur: ' . $err->getMessage());
        }
    }


    function afficherlivreparcategorie($categorie, $var)
    {

        $query = "SELECT * FROM livres where categorie='$categorie' LIMIT $var,6";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function top5()
    {

        $query = "SELECT * FROM livres ORDER BY note DESC LIMIT 5";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function note($note, $idc, $id_livre)
    {

        $query = "insert into  note (note,id_client,id_livre) values ($note,'$idc',$id_livre)";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function updatenote($note, $idc, $id_livre)
    {

        $query = "UPDATE note set NOTE=$note where (id_client='$idc' && id_livre=$id_livre)";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function AVG($id_livre)
    {

        $query = " UPDATE livres SET note=(select AVG (note) from  note where (id_livre='$id_livre')) where  ID=$id_livre";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function countbycategorie($categorie)
    {
        $sql = "SELECT * FROM  livres where categorie ='" . $categorie . "'";
        $db = config::getConnexion();
        try {
            $S = $db->query($sql);
            return $S->rowCount();
        } catch (Exception $err) {
            die('Erreur: ' . $err->getMessage());
        }
    }


}