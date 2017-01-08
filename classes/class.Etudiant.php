<?php

require_once("class.Personne.php");


class Etudiant extends Personne  {

    //Pas besoin de créer les getters et les setters,
    //ils sont automatiquement créés avec la classe TableObject à partir de la base de donnée

//    private $promo      = null;
//    private $groupe     = null;
//    private $blacklist  = false;
//
//
//    public function Etudiant($id=0, $nom=null, $prenom=null, $image=null, $login=null, $mdp=null, $mail=null, $admin=false, $moderateur=false, $promo=null, $groupe=null, $blacklist=false){
//        parent::__construct($id, $nom, $prenom, $image, $login, $mdp, $mail, $admin, $moderateur);
//        $this->promo        = $promo;
//        $this->groupe       = $groupe;
//        $this->blacklist    = $blacklist;
//    }
//
//
//    public function getPromo()      {return $this->promo;}
//    public function getGroupe()     {return $this->groupe;}
//    public function getBlacklist()  {return $this->blacklist;}
//
//
//    public function setPromo($promo)            {$this->promo = $promo;}
//    public function setGroupe($groupe)          {$this->groupe = $groupe;}
//    public function setBlacklist($blacklist)    {$this->blacklist = $blacklist;}

}
?>