<?php

require_once 'Dao.php';
require_once ("classes/class.Reservation.php");

class DaoReservation extends Dao {

    function findById($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM reservation WHERE id='$id'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Reservation($row);
    }

    function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM reservation WHERE id=?");
        $res = $stmt->execute(array($id));
        return $res;
    }

    function getList()
    {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM reservation ORDER BY id");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Reservation($row);
        return $res;
    }

    function getNonValide()
    {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM reservation WHERE VALIDE=0 ORDER BY id");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Reservation($row);
        return $res;
    }

    function getValide()
    {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM reservation WHERE VALIDE=1 ORDER BY id");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Reservation($row);
        return $res;
    }

    function insert($obj)
    {
        $stmt =  $this->pdo->prepare("INSERT INTO reservation (DATEDEBUT, DATEFIN, VALIDE, ID_MATERIELS, ID_PERSONNE) VALUES (:DATEDEBUT, :DATEFIN, :VALIDE, :ID_MATERIELS, :ID_PERSONNE)");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

    function update($obj)
    {
        $stmt = $this->pdo->prepare("UPDATE reservation SET DATEDEBUT=:DATEDEBUT, DATEFIN=:DATEFIN, VALIDE=:VALIDE, ID_MATERIELS=:ID_MATERIELS, ID_PERSONNE=:ID_PERSONNE WHERE ID=:ID");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

    function valide($obj)
    {
        $stmt = $this->pdo->prepare("UPDATE reservation SET VALIDE=:VALIDE WHERE ID=:ID");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

}

?>