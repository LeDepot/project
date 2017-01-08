<?php

require_once("dao/DaoMateriel.php");

$materiel = new DaoMateriel();

$listeMateriel = $materiel->getList();

$param = array('materiels' => $listeMateriel);

if (isset($_POST["supp"])) {

    $materiel->findById($_POST["idMateriel"]);
    $materiel->delete($_POST["idMateriel"]);

    header('Location:index.php?page=liste');
}