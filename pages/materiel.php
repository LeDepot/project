<?php

require_once('dao/DaoMateriel.php');
require_once 'dao/DaoCategorie.php';

$daoMateriel = new DaoMateriel();
$liste = $daoMateriel->getListe();

for($i=0;$i<count($liste);$i++){
    $daoMateriel = new DaoMateriel();
    $daoMateriel->find($liste[$i]->getId());

    $listeMateriel[$i] = $daoMateriel->bean;
}
//   var_dump($listeMateriel);die();
$param = array('listeMateriel' => $liste);
