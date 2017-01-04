<?php
require_once("TableObject.php");

class Personne extends TableObject{

    //Pas besoin de créer les getters et les setters,
    //ils sont automatiquement créés avec la classe TableObject à partir de la base de donnée

//    private $id         = 0;
//    private $nom        = null;
//    private $prenom     = null;
//    private $image      = null;
//    private $login      = null;
//    private $mdp        = null;
//    private $mail       = null;
//    private $admin      = false;
//    private $moderateur = false;
//
//
//    public function Personne($id=0, $nom=null, $prenom=null, $image=null, $login=null, $mdp=null, $mail=null, $admin=false, $moderateur=false){
//        $this->id           = $id;
//        $this->nom          = $nom;
//        $this->prenom       = $prenom;
//        $this->image        = $image;
//        $this->login        = $login;
//        $this->mdp          = $mdp;
//        $this->mail         = $mail;
//        $this->admin        = $admin;
//        $this->moderateur   = $moderateur;
//    }
//
//
//    public function getId()         {return $this->id;}
//    public function getNom()        {return $this->nom;}
//    public function getPrenom()     {return $this->prenom;}
//    public function getImage()      {return $this->image;}
//    public function getLogin()      {return $this->login;}
//    public function getMdp()        {return $this->mdp;}
//    public function getMail()       {return $this->mail;}
//    public function getAdmin()      {return $this->admin;}
//    public function getModerateur() {return $this->moderateur;}
//
//
//    public function setId($id)                  {$this->id = $id;}
//    public function setNom($nom)                {$this->nom = $nom;}
//    public function setPrenom($prenom)          {$this->prenom = $prenom;}
//    public function setImage($image)            {$this->image = $image;}
//    public function setLogin($login)            {$this->login = $login;}
//    public function setMdp($mdp)                {$this->mdp = $mdp;}
//    public function setMail($mail)              {$this->mail = $mail;}
//    public function setAdmin($admin)            {$this->admin = $admin;}
//    public function setModerateur($moderateur)  {$this->moderateur = $moderateur;}

}
?>