<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeSon = $materiel->getListByCat(3); // Id de sons = 3

$param = array('sons' => $listeSon);