<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeSon = $materiel->getListByCat(3); // Id de sons = 3

$template = $twig->loadTemplate('son.html.twig');
echo $template->render(array(
'sons' => $listeSon,
));