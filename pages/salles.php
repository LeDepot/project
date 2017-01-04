<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeSalles = $materiel->getListByCat(6); // Id de salles = 6

$template = $twig->loadTemplate('salles.html.twig');
echo $template->render(array(
    'salles' => $listeSalles,
));