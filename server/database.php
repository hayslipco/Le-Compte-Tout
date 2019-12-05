<?php

/**
 * Auteur: Corwin H.
 * Date: 05.12.2019
 * Lieu: ETML
 * Description: Page permettant la connexion à une db d'un site de surnoms d'enseignants
 */
$host = 'localhost';
$user = 'compteur';
$password = 'okcool123';
$dbName = 'db_compte_tout';

class database{

    protected $connector;
    protected $req;

    function __construct()
    {
        try {
            $this->connector = new PDO('mysql:host=localhost;dbname=db_compte_tout;charset=utf8', 'compteur', 'okcool123');
        } catch (PDOException $e) {
            print("Erreur: " . $e);
            die('Erreur: ' + $e->getMessage());
        }
    }

    function queryExecute($query){
        $this->closeCursor();
        $this->req = $this->connector->query($query);
        return $this->req;
    }

    function prepareExecute($query, $params){
        $this->closeCursor();
        $this->req = $this->connector->prepare($query);

        //bind des paramètres
        foreach($params as $param){
            $this->req->bindValue($param["name"], $param["value"], $param["type"]);
        }

        $this->req->execute();

    }

    function fetchData($mode){
        $result = $this->req->fetchAll($mode);
        return $result;
    }

    function closeCursor(){
        if(isset($this->req)){
            $this->req->closeCursor();
        }
    }

    function __destruct()
    {
        $this->connector = null;
    }

}

?>