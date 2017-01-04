<?php

require_once 'Dao.php';
require_once ("classes/class.Categorie.php");

class DaoCategorie extends Dao {

    public function DaoCategorie() {
        parent::__construct();
        $this->bean = new Categorie();
    }

    public function find($id) {
        $donnees = $this->findById("categorie", "ID", $id);

        $this->bean->setId($donnees['ID']);
        $this->bean->setNom($donnees['NOM']);
        //$this->bean->setLesMateriels($donnees['LESMATERIELS']);
    }

    public function getListe() {
        $sql = "SELECT *
                FROM categorie 
                ORDER BY NOM";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $categorie = new Categorie(
                    $donnees['ID'],
                    $donnees['NOM']
//                    $donnees['LESMATERIELS']
                );
                $liste[] = $categorie;
            }
        }

        return $liste;
    }


}

?>