<?php

require_once 'Dao.php';
require_once ("classes/class.Materiel.php");

class DaoMateriel extends Dao {

    public function DaoMateriel() {
        parent::__construct();
        $this->bean = new Materiel();
    }

    public function find($id) {
        $donnees = $this->findById("materiel", "ID_MATERIEL", $id);

        $this->bean->setId($donnees['ID_MATERIEL']);
        $this->bean->setNom($donnees['NOM_MATERIEL']);
        $this->bean->setDesc($donnees['DESC_MATERIEL']);
        $this->bean->setDesc($donnees['DESC_MATERIEL']);
        $this->bean->setImage($donnees['IMAGE_MATERIEL']);
        $this->bean->setNombre($donnees['NOMBRE_MATERIEL']);
        $this->bean->setStatut($donnees['STATUT_MATERIEL']);
      //  $this->bean->setLesReservations($donnees['LESRESERVATIONS_MATERIEL']);
    }

    public function getListe() {
        $sql = "SELECT *
                FROM materiel 
                ORDER BY NOM_MATERIEL";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $materiel = new Materiel(
                    $donnees['ID_MATERIEL'], $donnees['NOM_MATERIEL'], $donnees['DESC_MATERIEL'], $donnees['IMAGE_MATERIEL'], $donnees['NOMBRE_MATERIEL'], $donnees['STATUT_MATERIEL'], $donnees['LESRESERVATIONS_MATERIEL']
                );
                $liste[] = $materiel;
            }
        }

        return $liste;
    }


}

?>