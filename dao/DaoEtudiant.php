
<?php

require_once 'Dao.php';
require_once ("classes/class.Etudiant.php");

class DaoEtudiant extends Dao {

    public function DaoEtudiant() {
        parent::__construct();
        $this->bean = new Etudiant();
    }

    public function find($id) {
        $donnees = $this->findById("personne", "ID", $id);

        $this->bean->setId($donnees['ID']);
        $this->bean->setNom($donnees['NOM']);
        $this->bean->setPrenom($donnees['PRENOM']);
        $this->bean->setLogin($donnees['LOGIN']);
        $this->bean->setMdp($donnees['MDP']);
        $this->bean->setBlacklist($donnees['BLACKLIST']);
        $this->bean->setImage($donnees['IMAGE']);
        $this->bean->setPromo($donnees['PROMO']);
        $this->bean->setGroupe($donnees['GROUPE']);
        $this->bean->setMail($donnees['MAIL']);
        $this->bean->setAdmin($donnees['ADMIN']);
        $this->bean->setModerateur($donnees['MODERATEUR']);
        //$this->bean->setLesReservations($donnees['LESRESERVATIONS']);

    }

    public function getListe() {
        $sql = "SELECT *
                FROM personne
                ORDER BY NOM PRENOM";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $personne = new Personne(
                    $donnees['ID'],
                    $donnees['NOM'],
                    $donnees['PRENOM'],
                    $donnees['LOGIN'],
                    $donnees['BLACKLIST'],
                    $donnees['IMAGE'],
                    $donnees['PROMO'],
                    $donnees['GROUPE'],
                    $donnees['MAIL'],
                    $donnees['ADMIN'],
                    $donnees['MODERETEUR']
//                    $donnees['LESRESERVATIONS']
                );
                $liste[] = $personne;
            }
        }

        return $liste;
    }


}

?>