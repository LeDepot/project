<?php

require_once 'Dao.php';
require_once ("classes/class.Categorie.php");

class DaoCategorie extends Dao {

    function findById($id)
    {
        $stmt = $this->pdo->query("SELECT * FROM categorie WHERE id='$id'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Categorie($row);
    }

    function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM categorie WHERE id=?");
        $res = $stmt->execute(array($id));
        return $res;
    }

    function getList()
    {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM categorie ORDER BY nom");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Categorie($row);
        return $res;
    }

    function insert($obj)
    {
        $stmt =  $this->pdo->prepare("INSERT INTO categorie (nom) VALUES (:nom)");
        $res = $stmt->execute($obj->getFields());
        return $res;

    }

    function update($obj)
    {
        $stmt = $this->pdo->prepare("UPDATE categorie SET NOM=:NOM WHERE ID=:ID");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }


}

?>