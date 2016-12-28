<?php

require_once 'Dao.php';
require_once ("classes/class.Categorie.php");

class DaoCategorie extends Dao {

    public function DaoCategorie() {
        parent::__construct();
        $this->bean = new Categorie();
    }

    public function find($id) {
        $donnees = $this->findById("categorie", "ID_CATEGORIE", $id);

        $this->bean->setId($donnees['ID_CATEGORIE']);
        $this->bean->setNom($donnees['NOM_CATEGORIE']);
        //$this->bean->setLesMateriels($donnees['LESMATERIELS_CATEGORIE']);
    }

    public function getListe() {
        $sql = "SELECT *
                FROM categorie 
                ORDER BY NOM_CATEGORIE";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $categorie = new Categorie(
                    $donnees['ID_CATEGORIE'], $donnees['NOM_CATEGORIE'], $donnees['LESMATERIELS_CATEGORIE']
                );
                $liste[] = $categorie;
            }
        }

        return $liste;
    }


}

?>