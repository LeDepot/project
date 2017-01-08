<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeSon = $materiel->getListByCat(2); // Id de vidéos = 2

$param = array('videos' => $listeSon);