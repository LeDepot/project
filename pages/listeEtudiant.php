<?php

require_once("dao/DaoEtudiant.php");

$etudiant= new DaoEtudiant();

$listeEtudiant = $etudiant->getList();

$param = array('etudiants' => $listeEtudiant);

if (isset($_POST["blacklist"])) {

    $etudiantModifie = $etudiant->findById($_POST["idEtudiant"]);
    $etudiantModifie->BLACKLIST = 1;
    $etudiant->update($etudiantModifie);

    header('Location:index.php?page=listeEtudiant');
}

if (isset($_POST["permit"])) {

    $etudiantModifie = $etudiant->findById($_POST["idEtudiant"]);
    $etudiantModifie->BLACKLIST = 0;
    $etudiant->update($etudiantModifie);

    header('Location:index.php?page=listeEtudiant');
}