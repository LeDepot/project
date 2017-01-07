<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$item = $materiel->findById($_GET["id"]);

$images = explode(';', $item->IMAGE);

$param = array(
    'materiel' => $item,
    'images' => $images
);