<?php

require_once 'Dao.php';
require_once ("classes/class.Personne.php");

class DaoPersonne extends Dao {

    function findById($id){
        $stmt = $this->pdo->query("SELECT * FROM personne WHERE id='$id'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Personne($row);
    }

    function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM personne WHERE id=?");
        $res = $stmt->execute(array($id));
        return $res;
    }

    function getList() {
        $res = array();
        $stmt = $this->pdo->query("SELECT * FROM personne ORDER BY nom");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row)
            $res[] = new Personne($row);
        return $res;
    }

    function insert($obj)
    {
        $stmt =  $this->pdo->prepare("INSERT INTO personne (nom, prenom, login, mdp, mail, admin, moderateur) VALUES (:nom, :prenom, :login, :mdp, :mail, :admin, :moderateur)");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

    function update($obj)
    {
        $stmt = $this->pdo->prepare("UPDATE personne SET NOM=:NOM, PRENOM=:PRENOM, LOGIN=:LOGIN, MDP=:MDP, MAIL=:MAIL, ADMIN=:ADMIN, MODERATEUR=:MODERATEUR WHERE ID=:ID");
        $res = $stmt->execute($obj->getFields());
        return $res;
    }

    // Vérification qu'un couple (login, mdp) est bien dans la base
    // Retourne l'utilisateur trouvé ou null
    public function checkUser($login, $mdp) {
        $stmt = $this->pdo->prepare("SELECT * FROM personne WHERE login=? AND mdp=?");
        $stmt->execute(array($login, $mdp));
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row === false)
            return null;
        return new Personne($row);
    }
}

?>