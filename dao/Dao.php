<?php

abstract class Dao{

    public $bean=null;
    public $pdo=null; // Objet pdo pour l'accès à la table

    public function Dao() {
        // Instanciation pdo
        $parametres = parse_ini_file("param/param.ini");
        // connexion à la bdd avec fichier de paramètres
        $this->pdo = new PDO(
            $parametres['dsn'],
            $parametres['user'],
            $parametres['psw'],
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
        );
    }

    // Récupération d'un objet dont on donne l'identifiant
    abstract function findById($id);

    // Suppression d'un objet dont on donne l'identifiant
    abstract function delete($id);

    // Récupération de tous les objets dans une table
    abstract function getList();

    // Ajout de l'objet $obj dans la base
    abstract function insert($obj);

    // Mise à jour de l'objet $obj dans la base
    abstract function update($obj);

}