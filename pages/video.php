<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeSon = $materiel->getListByCat(2); // Id de vidéos = 2

$template = $twig->loadTemplate('video.html.twig');
echo $template->render(array(
    'videos' => $listeSon,
));