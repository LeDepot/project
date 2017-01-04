<?php

require_once 'Dao.php';
require_once ("classes/class.Reservation.php");

class DaoReservation extends Dao {

    public function DaoReservation() {
        parent::__construct();
        $this->bean = new Reservation();
    }

    public function find($id) {
        $donnees = $this->findById("reservation", "ID", $id);

        $this->bean->setId($donnees['ID']);
        $this->bean->setDateDebut($donnees['DATEDEBUT']);
        $this->bean->setDateFin($donnees['DATEFIN']);
        $this->bean->setValide($donnees['VALIDE']);
        //$this->bean->setLesPersonnes($donnees['LESPERSONNES']);
    }

    public function getListe() {
        $sql = "SELECT *
                FROM reservation 
                ORDER BY DATEDEBUT";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $reservation = new Reservation(
                    $donnees['ID'],
                    $donnees['DATEDEBUT'],
                    $donnees['DATEFIN'],
                    $donnees['VALIDE']
//                    $donnees['LESPERSONNES']
                );
                $liste[] = $reservation;
            }
        }

        return $liste;
    }


}

?>