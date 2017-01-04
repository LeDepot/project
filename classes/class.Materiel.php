<?php
//require_once('class.Reservation.php');
//require_once('class.Admin.php');
//require_once('class.Categorie.php');
//require_once('class.Moderateur.php');


class Materiel {

    private $id = 0;
    private $nom = null;
    private $desc = null;
    private $image = null;
    private $nombre = 0;
    private $quantite = 0;
    private $statut = false;
    private $pdf = null;


//    private $laReservation = array();
//    private $lAdmin = null;
//    private $lesCategories = array();
//    private $leModerateur= null;


    public function Materiel($id=0, $nom=null, $desc=null, $image=null, $nombre=0, $quantite=0, $statut=false, $pdf=null){
            $this->id       = $id;
            $this->nom      = $nom;
            $this->desc     = $desc;
            $this->image    = $image;
            $this->quantite = $quantite;
            $this->nombre = $nombre;
            $this->statut   = $statut;
            $this->pdf      = $pdf;
    }

    public function getId() {return $this->id;}
    public function getNom() {return $this->nom;}
    public function getDesc() {return $this->desc;}
    public function getImage() {return $this->image;}
    public function getNombre() {return $this->nombre;}
    public function getQuantite() {return $this->quantite;}
    public function getStatut() {return $this->statut;}
    public function getPdf() {return $this->pdf;}

//    public function getLaReservation() {return $this->laReservation;}
//    public function getLAdmin() {return $this->lAdmin;}
//    public function getLesCategories() {return $this->lesCategories;}
//    public function getLeModerateur() {return $this->leModerateur;}



    public function setId($id)              {$this->id = $id;}
    public function setNom($nom)            {$this->nom = $nom;}
    public function setDesc($desc)          {$this->desc = $desc;}
    public function setImage($image)        {$this->image = $image;}
    public function setNombre($nombre)      {$this->nombre = $nombre;}
    public function setQuantite($quantite)  {$this->quantite = $quantite;}
    public function setStatut($statut)      {$this->statut= $statut;}
    public function setPdf($pdf)            {$this->pdf= $pdf;}

//    public function setLaReservation($laReservation) {$this->laReservation = $laReservation;}
//    public function setLAdmin($lAdmin) {$this->lAdmin = $lAdmin;}
//    public function setLesCategories($lesCategories) {$this->lesCategories = $lesCategories;}
//    public function setLeModerateur($leModerateur) {$this->leModerateur = $leModerateur;}

}

