<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeEclairage = $materiel->getListByCat(4); // Id de eclairages = 4

$param = array('eclairages' => $listeEclairage);