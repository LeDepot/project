<?php

require_once 'Dao.php';
require_once ("classes/class.personnes.php");

class DaoPersonnes extends Dao {

    public function DaoPersonnes() {
        parent::__construct();
        $this->bean = new Personnes();
    }

    public function find($id) {
        $donnees = $this->findById("personnes", "ID_PERSONNES", $id);

        $this->bean->setId($donnees['ID_PERSONNES']);
        $this->bean->setNom($donnees['NOM_PERSONNES']);
        $this->bean->setPrenom($donnees['PRENOM_PERSONNES']);
        $this->bean->setLogin($donnees['LOGIN_PERSONNES']);
        $this->bean->setBlacklist($donnees['BLACKLIST_PERSONNES']);
        $this->bean->setPromo($donnees['PROMO_PERSONNES']);
        $this->bean->setGroupe($donnees['GROUPE_PERSONNES']);
        $this->bean->setMail($donnees['MAIL_PERSONNES']);
        $this->bean->setAdmin($donnees['ADMIN_PERSONNES']);
        $this->bean->setModerateur($donnees['MODERATEUR_PERSONNES']);
        $this->bean->setLesReservations($donnees['LESRESERVATIONS_PERSONNES']);

    }

    public function getListe() {
        $sql = "SELECT *
                FROM personnes 
                ORDER BY NOM_PERSONNES PRENOM_PERSONNES";
        $requete = $this->pdo->prepare($sql);
        $liste = array();
        if ($requete->execute()) {
            while ($donnees = $requete->fetch()) {
                $personnes = new Personnes(
                    $donnees['ID_PERSONNES'], $donnees['NOM_PERSONNES'], $donnees['PRENOM_PERSONNES'], $donnees['LOGIN_PERSONNES'], $donnees['BLACKLIST_PERSONNES'], $donnees['PROMO_PERSONNES'], $donnees['GROUPE_PERSONNES'], $donnees['MAIL_PERSONNES'], $donnees['ADMIN_PERSONNES'], $donnees['MODERETEUR_PERSONNES'], $donnees['LESRESERVATIONS_PERSONNES']
                );
                $liste[] = $personnes;
            }
        }

        return $liste;
    }


}

?>