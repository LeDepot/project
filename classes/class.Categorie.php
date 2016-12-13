<?php

class Categorie{

    private $id   = 0;
    private $nom  = null;


    public function Reservation($id=0, $nom=null){
        $this->id    = $id;
        $this->nom   = $nom;
    }


    public function getId()          {return $this->id;}
    public function getNom()         {return $this->nom;}


    public function setId($id)       {$this->id = $id;}
    public function setNom($nom)     {$this->nom = $nom;}

}
?>