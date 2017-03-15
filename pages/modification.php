<?php

require_once('dao/DaoMateriel.php');
require_once('dao/DaoCategorie.php');


$categorie = new DaoCategorie();
$categories = $categorie->getList();

$materiel = new DaoMateriel();
$item = $materiel->findById($_GET["id"]);

$param = array(
    'materiel' => $item,
    'categories' => $categories
);
//var_dump($item);die();

/*if(isset($_POST['submitImage']))
{*/



    if(isset($_FILES['image']))
    {
        $dossier = 'src/img/Materiel/';
        $fichier = basename($_FILES['image']['name']);
        $taille_maxi = 10000000;
        $taille = filesize($_FILES['image']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg', '.JPG');
        $extension = strrchr($_FILES['image']['name'], '.');
        $erreurs = "";
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            $erreurs[] = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
        }
        if($taille>$taille_maxi)
        {
            $erreurs[] = 'Le fichier est trop gros...';
        }
        if($erreurs == null) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '_', $fichier);
            if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {
                $materielModifie = $materiel->findById($_GET['id']);
                $materielModifie->IMAGE = $dossier . $fichier;
                $materiel->update($materielModifie);
            }
            else //Sinon (la fonction renvoie FALSE).
            {
                $erreurs[] = "Echec de l'upload ! Réessayez !";
            }
        }
    }
/*}
*/

/*if(isset($_POST['submitPDF']))
{*/
    if(isset($_FILES['PDF']))
    {
        $dossier = 'src/pdf';
        $fichier = basename($_FILES['PDF']['name']);
        $taille_maxi = 10000000;
        $taille = filesize($_FILES['PDF']['tmp_name']);
        $extensions = array('.pdf');
        $extension = strrchr($_FILES['PDF']['name'], '.');
        $erreur = "";
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
            //$erreurs[] = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg';
        }
        if($taille>$taille_maxi)
        {
            $erreurs[] = 'Le fichier est trop gros...';
        }
        if($erreurs == null) //S'il n'y a pas d'erreur, on upload
        {
            //On formate le nom du fichier ici...
            $fichier = strtr($fichier,
                'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
                'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
            $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
            if(move_uploaded_file($_FILES['PDF']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {}
            else //Sinon (la fonction renvoie FALSE).
            {
                $erreurs[] = "Echec de l'upload ! Réessayez !";
            }
        }
    }
/*}
*/

if(isset($_POST['modif'])) {
    $materielModifie = $materiel->findById($_GET['id']);
    $materielModifie->NOM = $_POST['nom'];
    $materielModifie->DESCRIPTION = $_POST['description'];
    $materielModifie->IMAGE = $dossier . basename($_FILES['image']['name']);
    $materielModifie->NOMBRE = $_POST['nombre'];
    $materielModifie->QUANTITE = $_POST['quantite'];
    if(isset($_POST['disponibilite'])) {
        $materielModifie->STATUT = 1;
    } else {
        $materielModifie->STATUT = 0;
    }
    $materielModifie->PDF = $dossier . $pdf; //$_POST['pdf'];
    $materielModifie->ID_CAT = $_POST['categorie'];
    $materielModifie->CAUTION = $_POST['caution'];

    $materiel->update($materielModifie);

    header('Location:index.php?page=listeMateriel');

}