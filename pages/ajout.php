<?php

//PAGE DE TEST DES DAO

//CODE A SUPPRIMER QUAND TOUT A ETE TESTE

require_once("dao/DaoMateriel.php");
require_once("dao/DaoCategorie.php");


$categorie = new DaoCategorie();
$listeCategorie = $categorie->getList();
$param = array('listeCategories' => $listeCategorie);


$materiel = new DaoMateriel();

if(isset($_POST['submitImage']))
{
    if(isset($_FILES['image']))
    {
        $dossier = 'src/img/imageMateriel';
        $fichier = basename($_FILES['image']['name']);
        $taille_maxi = 10000000;
        $taille = filesize($_FILES['image']['tmp_name']);
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['image']['name'], '.');
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
            if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
            {}
            else //Sinon (la fonction renvoie FALSE).
            {
                $erreurs[] = "Echec de l'upload ! Réessayez !";
            }
        }
    }
}


if(isset($_POST['submitPDF']))
{
    if(isset($_FILES['PDF']))
    {
        $dossier = '../../pdf';
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
}

if(isset($_POST["ajouter"])) {
    $nouveauMateriel = new Materiel(
        array(
            'NOM' => $_POST["nom"],
            'DESCRIPTION' => $_POST["description"],
            'IMAGE' => $_POST["image"],
            'NOMBRE' => $_POST["nombre"],
            'QUANTITE' => $_POST["qte"],
            'STATUT' => $_POST["disponibilite"],
            'PDF' => $_POST["pdf"],
            'ID_CAT' => $_POST["categorie"],
            'CAUTION' => $_POST["caution"],
        )
    );
    var_dump($nouveauMateriel);die();
    $materiel->insert($nouveauMateriel);

    header('Location:index.php?page=listeMateriel');
}



