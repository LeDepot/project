<?php

require_once 'Dao.php';
require_once ("classes/class.Reservation.php");

class DaoReservation extends Dao {

    public function DaoReservation() {
        parent::__construct();
        $this->bean = new Reservation();
    }

    public function find($id) {
        $donnees = $this->findById("reservation", "ID_RESERVATION", $id);

        $this->bean->setId($donnees['ID_RESERVATION']);
        $this->bean->setDateDebut($donnees['DATEDEBUT_RESERVATION']);
        $this->bean->setDateFin($donnees['DATEFIN_RESERVATION']);
        $this->bean->setValide($donnees['VALIDE_RESERVATION']);
        //$this->bean->setLesPersonnes($donnees['LESPERSONNES_RESERVATION']);
    }

    public function getListe() {
        $sql = "SELECT *
                FROM reservation 
                ORDER BY DATEDEBUT_RESERVATION DATEFIN_RESERVATION";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $reservation = new Reservation(
                    $donnees['ID_RESERVATION'], $donnees['DATEDEBUT_RESERVATION'], $donnees['DATEFIN_RESERVATION'], $donnees['VALIDE_RESERVATION'], $donnees['LESPERSONNES_RESERVATION']
                );
                $liste[] = $reservation;
            }
        }

        return $liste;
    }


}

?>