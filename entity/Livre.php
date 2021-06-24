<?php

class livre
{
    private $id;
    private $reference;
    private $titre;
    private $date;
    private $nomAuteur;
    private $categorie;
    private $description;
    private $stock;
    private $image;
    private $prix;


    public function __construct($id, $reference, $titre, $date, $nomAuteur, $categorie, $description, $stock, $image, $prix)
    {
        $this->id = $id;
        $this->reference = $reference;
        $this->titre = $titre;
        $this->date = $date;
        $this->nomAuteur = $nomAuteur;
        $this->categorie = $categorie;
        $this->description = $description;
        $this->stock = $stock;
        $this->image = $image;
        $this->prix = $prix;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getReference()
    {
        return $this->reference;
    }


    public function setReference($reference)
    {
        $this->reference = $reference;
    }


    public function getTitre()
    {
        return $this->titre;
    }


    public function setTitre($titre)
    {
        $this->titre = $titre;
    }


    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }


    public function getNomAuteur()
    {
        return $this->nomAuteur;
    }

    public function setNomAuteur($nomAuteur)
    {
        $this->nomAuteur = $nomAuteur;
    }

    public function getCategorie()
    {
        return $this->categorie;
    }


    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }


    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }


    public function getStock()
    {
        return $this->stock;
    }


    public function setStock($stock)
    {
        $this->stock = $stock;
    }


    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getPrix()
    {
        return $this->prix;
    }


    public function setPrix($prix)
    {
        $this->prix = $prix;
    }


}