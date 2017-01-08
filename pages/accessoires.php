<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeAccessoire = $materiel->getListByCat(5); // Id de accessoires = 5

$param = array('accessoires' => $listeAccessoire);