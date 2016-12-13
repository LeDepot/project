<?php

class Reservation{

    private $id          = 0;
    private $date_debut  = null;
    private $date_fin    = null;
    private $valide      = null;


    public function Reservation($id=0, $date_debut=null, $date_fin=null, $valide=null){
        $this->id           = $id;
        $this->date_debut   = $date_debut;
        $this->date_fin     = $date_fin;
        $this->valide       = $valide;
    }


    public function getId()          {return $this->id;}
    public function getDateDebut()   {return $this->date_debut;}
    public function getDateFin()     {return $this->date_fin;}
    public function getValide()      {return $this->valide;}


    public function setId($id)                    {$this->id = $id;}
    public function setDateDebut($date_debut)     {$this->date_debut = $date_debut;}
    public function setDateFin($date_fin)         {$this->date_fin = $date_fin;}
    public function setValide($valide)            {$this->valide = $valide;}

}
?>