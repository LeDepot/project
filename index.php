<?php

require_once('dao/DaoEtudiant.php');
require_once('dao/DaoMateriel.php');
require_once('dao/DaoReservation.php');

session_start();

/*=================================
=            CODE RESA            =
=================================*/

if(isset($_POST['validresa'])) {

    $user = new DaoEtudiant();
    $reservation = new DaoReservation();

    $user = $user->findById($_SESSION['id']);
    $listIdMateriel = $user->PANIER; 
    /*$listIdMateriel = json_decode($listIdMateriel);
    $listIdMateriel = implode(',', $listIdMateriel);
    var_dump($listIdMateriel);die();
*/
    // Au click sur le bouton de validation du panier, on crée une nouvelle réservation en BDD
    
    $datedebut = $_POST['dateDebut'];
    $datefin = $_POST['dateDebut'];
    $datefin = explode('-', $datefin);
    $jour = $datefin[2];
    $jour = $datefin[2] + 3;
    if($jour <= 9) {
        $jour = '0'.$jour;
    } else {
        $jour = $jour;
    }
    $datefin = $datefin[0].'-'.$datefin[1].'-'.$jour;

    $nouvelleReservation = new Reservation(
        array(
            'DATEDEBUT' => $_POST['dateDebut'],
            'DATEFIN' => $datefin,
            'VALIDE' => 0,
            'ID_MATERIELS' => $listIdMateriel,
            'ID_PERSONNE' => $_SESSION['id'],
        )
    );
    $reservation->insert($nouvelleReservation);

    // Puis on vide la colonne PANIER de la table étudiant
    $user = new DaoEtudiant();
    $userModif = $user->findById($_SESSION['id']);
    $userModif->PANIER = '';
    $user->update($userModif);

//    header('Location:index.php');
}

/*=====  End of CODE RESA  ======*/

if(isset($_POST['suppPanier'])) {

    $user = new DaoEtudiant();
    $etudiant = $user->findById($_SESSION['id']);

    $panier = json_decode($etudiant->PANIER);

    $key = array_search($_POST['id-materiel'], $panier);
    array_splice($panier, $key, 1);

    if(!isset($panier)) {
        $panier = json_encode($panier);
        $etudiant->PANIER = $panier;
        $user->update($etudiant);
    } else {
        $etudiant->PANIER = '';
        $user->update($etudiant);
    }


    header('Location: index.php');
}

if (!isset($_SESSION['nom']) && $_GET['page'] != ("connexion" || "inscription")) {
    header("Location: index.php?page=connexion");
    exit(0);
}

if (isset($_POST['deconnexion']))
{
    session_unset();
    session_destroy();
    header("Location: index.php?page=connexion");
    exit(0);
}

// Appel de la classe de chargement du moteur
include_once('Twig/Autoloader.php');

define("RACINE", __DIR__);

// registration de Twig
Twig_Autoloader::register();

// Definition du repertoire des templates
$loader = new Twig_Loader_Filesystem('templates'); // Dossier contenant les templates

// Utilisation du repertoire des tamplates sans cache
$twig = new Twig_Environment($loader, array(!'cache' => false));



// routage des pages
// Par defaut la page d'accueil
$uriDemandee = "accueil";
// Parsing du fichier des routes
$routes = parse_ini_file("param/routes.ini", true);
// Si une URI est demandée
if(isset($_GET["page"])){
    $uriDemandee = $_GET["page"];
}

// Vérification si uri demandée existe
if(isset($routes[$uriDemandee])){
    $page = $routes[$uriDemandee]["page"];
    $template = $routes[$uriDemandee]["template"];
}else{
    echo "<script>alert('Page non trouvee, vous etes redirigé sur la page d\'accueil')</script>";
    // Si pas de page trouvée retour accueil
    $page = $routes["accueil"]["page"];
    $template = $routes["accueil"]["template"];
}

// Tableau de paramètres
$param = array();

// Inclusion du fichier de traitement
if($page != null){
    include($page);
}
// Chargement du template
$template = $twig->loadTemplate($template);

if(isset($_SESSION['nom'])){
    $res = array_merge($_SESSION, $param);
}
else{
    $res = $param;
}

// Affichage de la page concernée Avec passage d'un tableau de paramètre fournit par les programmes de traitement
echo $template->render($res);



// routage des pages, par défaut index.php
/*
    $template   = 'index.html.twig';
    $page       = "";
    $param      = array();

//    $template="";
    // Si une page est demandée
    if(isset($_GET["page"])){
	// Ouverture du fichier des routes
	$routes = parse_ini_file("param/routes.ini", true);
	$page = $routes[$_GET["page"]]["page"];
	$template = $routes[$_GET["page"]]["template"];
	include($page);
    }

    // Chargement du template
    $template = $twig->loadTemplate($template);

    // Ajout de la session au tableau de paramètre
    $param["session"] = $_SESSION;

    // Affichage de la page concernee et paramètres passés
    echo $template->render($param);
*/


