<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listePhotos = $materiel->getListByCat(1); // Id de photos = 1

$template = $twig->loadTemplate('photo.html.twig');
echo $template->render(array(
    'photos' => $listePhotos,
));