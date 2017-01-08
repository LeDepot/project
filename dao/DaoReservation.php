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

    function insert($obj)
    {
        $stmt =  $this->pdo->prepare("INSERT INTO reservation (datedebut, datefin, valide) VALUES (:datedebut, :datefin, :valide)");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

    function update($obj)
    {
        $stmt = $this->pdo->prepare("UPDATE reservation SET DATEDEBUT=:DATEDEBUT, DATEFIN=:DATEFIN, VALIDE=:VALIDE WHERE ID=:ID");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

}

?>