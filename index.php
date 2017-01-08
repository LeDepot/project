<?php
session_start();

if (!isset($_SESSION['nom']) && $_GET['page'] != "connexion") {
    // On renvoie vers la page de connexion
    header("Location: index.php?page=connexion");
    exit(0);
}

if (isset($_POST['deconnexion']))
{
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
