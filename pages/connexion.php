<?php
require_once("dao/DaoEtudiant.php");
require_once("dao/DaoPersonne.php");

$etudiant = new DaoEtudiant();
$personne = new DaoPersonne();

// Préparation des paramètres
$form['login'] = isset($_POST['login'])?trim($_POST['login']):"";
$form['password'] = isset($_POST['password'])?trim($_POST['password']):"";
$form['erreur'] = false;
$form['message'] = "";

if (isset($_POST['submit'])) {
    // le formulaire a été soumis
    // Recherche de l'identification dans la base
    $user = $etudiant->checkUser($form['login'], $form['password']);
    $userPers = $personne->checkUser($form['login'], $form['password']);
    //a faire
    if ($user == null && $userPers == null) {
        $form['erreur'] = true;
        $form['message'] = "Erreur d'authentification.";
    }
    elseif ($user != null) {
        $_SESSION['nom'] = $user->NOM;
        $_SESSION['prenom'] = $user->PRENOM;
        $_SESSION['id'] = $user->ID;
        header("Location: index.php");
        exit(0);
    }
    elseif ($userPers != null) {
        if($userPers->ADMIN == 1){
            $_SESSION['admin'] = 1;
        }
        $_SESSION['nom'] = $userPers->NOM;
        $_SESSION['prenom'] = $userPers->PRENOM;
        $_SESSION['id'] = $userPers->ID;

        header("Location: index.php");
        exit(0);
    }



}
$msg = '';
if ($form['erreur']){
    $msg = $form['message'];
}

$param = array("msg" => $msg);