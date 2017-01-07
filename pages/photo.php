<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listePhotos = $materiel->getListByCat(1); // Id de photos = 1

$param = array('photos' => $listePhotos);