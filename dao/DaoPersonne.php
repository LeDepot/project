<?php

require_once 'Dao.php';
require_once ("classes/class.Personne.php");

class DaoPersonne extends Dao {

    public function DaoPersonne() {
        parent::__construct();
        $this->bean = new Personne();
    }

    public function find($id) {
        $donnees = $this->findById("personne", "ID_PERSONNE", $id);

        $this->bean->setId($donnees['ID_PERSONNE']);
        $this->bean->setNom($donnees['NOM_PERSONNE']);
        $this->bean->setPrenom($donnees['PRENOM_PERSONNE']);
        $this->bean->setLogin($donnees['LOGIN_PERSONNE']);
        $this->bean->setMdp($donnees['MDP_PERSONNE']);
        $this->bean->setBlacklist($donnees['BLACKLIST_PERSONNE']);
        $this->bean->setPromo($donnees['PROMO_PERSONNE']);
        $this->bean->setGroupe($donnees['GROUPE_PERSONNE']);
        $this->bean->setMail($donnees['MAIL_PERSONNE']);
        $this->bean->setAdmin($donnees['ADMIN_PERSONNE']);
        $this->bean->setModerateur($donnees['MODERATEUR_PERSONNE']);
        //$this->bean->setLesReservations($donnees['LESRESERVATIONS_PERSONNE']);

    }

    public function getListe() {
        $sql = "SELECT *
                FROM personne
                ORDER BY NOM_PERSONNE PRENOM_PERSONNE";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $personne = new Personne(
                    $donnees['ID_PERSONNE'], $donnees['NOM_PERSONNE'], $donnees['PRENOM_PERSONNE'], $donnees['LOGIN_PERSONNE'], $donnees['BLACKLIST_PERSONNE'], $donnees['PROMO_PERSONNE'], $donnees['GROUPE_PERSONNE'], $donnees['MAIL_PERSONNE'], $donnees['ADMIN_PERSONNE'], $donnees['MODERETEUR_PERSONNE'], $donnees['LESRESERVATIONS_PERSONNE']
                );
                $liste[] = $personne;
            }
        }

        return $liste;
    }


}

?>