<?php 

require_once("dao/DaoReservation.php");
require_once("dao/DaoMateriel.php");
require_once("dao/DaoEtudiant.php");

$reservation = new DaoReservation();
$materiel = new DaoMateriel();
$personne = new DaoEtudiant();

$listeResa = $reservation->getNonValide();
$listeInscriptions = $personne->getNonValide();

$resaAvalider = [];
for($i=0; $i<count($listeResa); $i++) {
	$resaAvalider[$i] = $reservation->findById($listeResa[$i]->ID)->getFields();
	$resaAvalider[$i]['personne'] = $personne->findById($listeResa[$i]->ID_PERSONNE)->getFields();
	$resaAvalider[$i]['materiel'] = json_decode($listeResa[$i]->ID_MATERIELS);

	for($j=0; $j<count($resaAvalider[$i]['materiel']); $j++) {
		$matos = $materiel->findById($resaAvalider[$i]['materiel'][$j])->getFields();
		$resaAvalider[$i]['materiel'][$j] = $matos['NOM'];
	}
}
if(isset($_POST['validateResa'])) {
	$aValider = $reservation->findById($_POST['idResa']);
	$aValider->VALIDE = 1;
	$reservation->update($aValider);
	header('Location:index.php');
}

if(isset($_POST['validateInscr'])) {
	$aValider = $personne->findById($_POST['idEtudiant']);
	$aValider->VALIDE = 1;
	$personne->update($aValider);
	header('Location:index.php');
}

// BUG MATERIEL ET PERSONNE RESA

$param = array(
	'listeResa' => $resaAvalider,
	'listeInscription' => $listeInscriptions
);


?>