<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeSalles = $materiel->getListByCat(6); // Id de salles = 6

$param = array('salles' => $listeSalles);