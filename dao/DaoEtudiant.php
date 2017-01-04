<?php

require_once 'Dao.php';
require_once ("classes/class.Etudiant.php");

class DaoEtudiant extends Dao  {

    function findById($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM etudiant WHERE id='$id'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Etudiant($row);
    }

    function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM etudiant WHERE id=?");
        $res = $stmt->execute(array($id));
        return $res;
    }

    function getList()
    {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM etudiant ORDER BY nom");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Etudiant($row);
        return $res;
    }

    function insert($obj)
    {
        $stmt =  $this->pdo->prepare("INSERT INTO etudiant (nom, prenom, login, mdp, mail, promo, groupe, blacklist) VALUES (:nom, :prenom, :login, :mdp, :mail, :promo, :groupe, :blacklist)");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

    function update($obj)
    {
        $stmt = $this->pdo->prepare("UPDATE etudiant SET NOM=:NOM, PRENOM=:PRENOM, LOGIN=:LOGIN, MDP=:MDP, MAIL=:MAIL, PROMO=:PROMO, GROUPE=:GROUPE, BLACKLIST=:BLACKLIST WHERE ID=:ID");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }
}

?>