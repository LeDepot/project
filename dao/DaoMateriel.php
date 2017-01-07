<?php

require_once ('Dao.php');
require_once ('classes/class.Materiel.php');
require_once ('classes/class.Categorie.php');

class DaoMateriel extends Dao {

    public function DaoMateriel() {
        parent::__construct();
        $this->bean = new Materiel();
    }

    public function find($id) {
        $donnees = $this->findById("materiel", "ID", $id);

        $this->bean->setId($donnees['ID']);
        $this->bean->setNom($donnees['NOM']);
        $this->bean->setDesc($donnees['DESC']);
        $this->bean->setImage($donnees['IMAGE']);
        $this->bean->setNombre($donnees['NOMBRE']);
        $this->bean->setQuantite($donnees['QUANTITE']);
        $this->bean->setStatut($donnees['STATUT']);
        $this->bean->setPdf($donnees['PDF']);
      //  $this->bean->setLesReservations($donnees['LESRESERVATIONS']);
    }

    public function getListe($id=0) {
        if($id == 0){
            $sql = "SELECT *
                FROM materiel
                ORDER BY NOM";
        }else{
            $sql = "SELECT *
                FROM materiel, cat_mat
                WHERE materiel.ID = cat_mat.ID_MATERIEL
                AND cat_mat.ID_CATEGORIE = ".$id."
                ORDER BY NOM ASC";
        }
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $materiel = new Materiel(
                    $donnees['ID'],
                    $donnees['NOM'],
                    $donnees['DESC'],
                    $donnees['IMAGE'],
                    $donnees['NOMBRE'],
                    $donnees['STATUT'],
                    $donnees['PDF']
//                    $donnees['LESRESERVATIONS']
                );
                $liste[] = $materiel;
            }
        }

        return $liste;
    }

    public function setLesCategories()
    {
        $sql = "SELECT *
                FROM cat_mat, categorie
                WHERE
                cat_mat.ID_MATERIEL = " . $this->bean->getId() . "
                AND cat_mat.ID_CATEGORIE = type.ID_CATEGORIE
                ORDER BY NOM";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $type = new Categorie($donnees['ID_CATEGORIE'], $donnees['NOM']);
                $liste[] = $type;
            }
            $this->bean->setLesCategories($liste);
        }

    }

    public function create(){
        $sql = "INSERT INTO client(NOM, DESC, IMAGE, NOMBRE, QUANTITE, STATUT, PDF,)
           VALUES(?, ?, ?, ?, ?, ?, ?)";

        $requete = $this->pdo->prepare($sql);

        $requete->bindValue(1, $this->bean->getNom());
        $requete->bindValue(2, $this->bean->getDesc());
        $requete->bindValue(3, $this->bean->getImage());
        $requete->bindValue(4, $this->bean->getNombre());
        $requete->bindValue(5, $this->bean->getQuantite());
        $requete->bindValue(6, $this->bean->getStatut());
        $requete->bindValue(7, $this->bean->getPdf());

        $requete->execute();
    }
}

?>