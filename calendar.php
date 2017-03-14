<?php 

require_once('dao/DaoEtudiant.php');
require_once('dao/DaoMateriel.php');
require_once('dao/DaoReservation.php');

$reservation = new DaoReservation();
$materiel = new DaoMateriel();
$personne = new DaoEtudiant();

$listeResa = $reservation->getValide();

$lesResa = [];
for($i=0; $i<count($listeResa); $i++) {
	$lesResa[$i]['ID'] = $listeResa[$i]->ID;
	$lesResa[$i]['DATE_DEBUT'] = $listeResa[$i]->DATEDEBUT;
	$lesResa[$i]['DATE_FIN'] = $listeResa[$i]->DATEFIN;
	$lesResa[$i]['PERSONNE'] = $personne->findById($listeResa[$i]->ID_PERSONNE)->getFields()['NOM'].' '.$personne->findById($listeResa[$i]->ID_PERSONNE)->getFields()['PRENOM'];
	$lesResa[$i]['MATERIEL'] = json_decode($listeResa[$i]->ID_MATERIELS);

	for($j=0; $j<count($lesResa[$i]['MATERIEL']); $j++) {
		$matos = $materiel->findById($lesResa[$i]['MATERIEL'][$j])->getFields();
		$lesResa[$i]['MATERIEL'][$j] = $matos['NOM'];
	}
}

$lesResa = json_encode($lesResa);

/*var_dump($lesResa);die();
*/
echo $lesResa;
/*for($i=0;$i<count($listeResa);$i++) {
	$listeResa
}*/

?>