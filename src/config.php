<?php

$host = 'localhost';
$user = 'root';
$password = 'root';
$dbName = 'db_compte_tout';

try
{
   $con = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8' , $user, $password");
}
catch (PDOException $e)
{
   die('Erreur : ' . $e->getMessage());
}

?>