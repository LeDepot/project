<?php

require_once('dao/DaoEtudiant.php');
require_once('dao/DaoMateriel.php');

$user = new DaoEtudiant();
$materiel = new DaoMateriel();

$user = $user->findById($_GET['id']);

$listIdMateriel = $user->PANIER;
$listId = json_decode($listIdMateriel);
//echo $listIdMateriel;

$panier = [];
foreach ($listId as $id){
    $panier[] = $materiel->findById($id)->getFields();
}

$panier = json_encode($panier);

echo $panier;

