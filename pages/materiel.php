<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$item = $materiel->findById($_GET["id"]);

$template = $twig->loadTemplate('materiel.html.twig');
echo $template->render(array(
    'materiel' => $item,
));