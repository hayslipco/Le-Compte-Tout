<?php

/**
 * Auteur: Corwin H.
 * Date: 05.12.2019
 * Lieu: ETML
 * Description: Page permettant la connexion à une db d'un site de surnoms d'enseignants
 */

 //with cleardb
 /* $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$host = $url["host"];
$user = $url["user"];
$password = $url["pass"];
$dbName = substr($url["path"], 1); */




header("Access-Control-Allow-Origin: *");

class database{
    
    protected $connector;
    protected $req;
    
    //with remotesql.com
    protected $host = 'remotemysql.com:3306';
    protected $user = 'LAGvAwusu3';
    protected $password = 'sun4XhAhp6';
    protected $dbName = 'LAGvAwusu3';

    function __construct()
    {
        try {
            $this->connector = new PDO("mysql:host=$this->host;dbname=$this->dbName;charset=utf8", $this->user, $this->password);
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