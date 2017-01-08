<?php

require_once("dao/DaoMateriel.php");
require_once('dao/DaoEtudiant.php');

$materiel = new DaoMateriel();

$item = $materiel->findById($_GET["id"]);

$images = explode(';', $item->IMAGE);

$param = array(
    'materiel' => $item,
    'images' => $images
);

$etudiant = new DaoEtudiant();


if(isset($_POST["reserver"])) {
    $etudiantModifie = $etudiant->findById($_SESSION['id']);
//    $item = $materiel->findById($_GET['id']);
    if(isset($etudiantModifie->PANIER)) {
        $panier = $etudiantModifie->PANIER;
        $panier = json_decode($panier);
        $panier[] = $_GET['id'];
    }else {
        $panier[] = $_GET['id'];
    }

    $panier = json_encode($panier);

    $etudiantModifie->PANIER = $panier;
    $etudiant->update($etudiantModifie);

    header('Location:index.php?page=materiel&id='.$_GET['id']);
}