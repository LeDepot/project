<?php

require_once 'Dao.php';
require_once ("classes/class.Materiel.php");

class DaoMateriel extends Dao {

    public function findById($id){
        $stmt = $this->pdo->query("SELECT * FROM materiel WHERE id='$id'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Materiel($row);
    }

    public function getList(){
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM materiel ORDER BY nom");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Materiel($row);
        return $res;
    }

    public function getListByCat($idCat){
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM materiel WHERE id_cat='$idCat' ORDER BY nom");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Materiel($row);
        return $res;
    }

    public function delete($id){
        $stmt = $this->pdo->prepare("DELETE FROM materiel WHERE id=?");
        $res = $stmt->execute(array($id));
        return $res;
    }

    public function insert($obj) {
        $stmt =  $this->pdo->prepare("
          INSERT INTO materiel (NOM, DESCRIPTION, IMAGE, NOMBRE, QUANTITE, STATUT, PDF, ID_CAT, CAUTION)
          VALUES (:NOM, :DESCRIPTION, :IMAGE, :NOMBRE, :QUANTITE, :STATUT, :PDF, :ID_CAT, :CAUTION)
          ");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

    public function update($obj) {
        $stmt = $this->pdo->prepare("UPDATE materiel SET NOM=:NOM, DESCRIPTION=:DESCRIPTION, IMAGE=:IMAGE, NOMBRE=:NOMBRE, QUANTITE=:QUANTITE, STATUT=:STATUT, PDF=:PDF, ID_CAT=:ID_CAT, CAUTION=:CAUTION WHERE ID=:ID");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

}

?>