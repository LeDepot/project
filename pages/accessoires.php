<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeAccessoire = $materiel->getListByCat(5); // Id de accessoires = 5

$template = $twig->loadTemplate('accessoires.html.twig');
echo $template->render(array(
    'accessoires' => $listeAccessoire,
));