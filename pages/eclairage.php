<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeEclairage = $materiel->getListByCat(4); // Id de eclairages = 4

$template = $twig->loadTemplate('eclairage.html.twig');
echo $template->render(array(
    'eclairages' => $listeEclairage,
));