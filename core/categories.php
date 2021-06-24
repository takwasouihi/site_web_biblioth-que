<?php
include_once "config.php";

class categories
{

    function ajoutercategorie($categorie)
    {
        $sql = "insert into categories(name) values (:name)";
        $db = config::getConnexion();
        try {
            $req = $db->prepare($sql);
            $name = $categorie->getName();


            $req->bindValue(':name', $name);

            $req->execute();

        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();
        }

    }


    function modifiercategorie($id, $nom)
    {
        $sql = "UPDATE categories SET name=:nom where id= :id";

        $db = config::getConnexion();

        $req = $db->prepare($sql);


        $req->bindValue(':id', $id);
        $req->bindValue(':nom', $nom);
        try {
            $req->execute();

        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function affichercategorie($id)
    {

        $query = "SELECT * FROM categories where id='$id' ";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }

    function afficher($var)
    {

        $query = "SELECT * FROM categories LIMIT $var,6";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }


    function supprimer($id)
    {

        $sql = "DELETE FROM categories WHERE 	id ='" . $id . "'";
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

    function supprimer_livres($categorie)
    {

        $sql = "DELETE FROM livres WHERE 	categorie='" . $categorie . "'";
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
        $sql = "SELECT * FROM  categories";
        $db = config::getConnexion();
        try {
            $S = $db->query($sql);
            return $S->rowCount();
        } catch (Exception $err) {
            die('Erreur: ' . $err->getMessage());
        }
    }


    function selectcategorie()
    {

        $query = "SELECT * FROM categories ";

        $db = config::getConnexion();
        try {

            return ($db->query($query));
        } catch (Exception $err) {
            echo 'Erreur: ' . $err->getMessage();

        }

    }


}