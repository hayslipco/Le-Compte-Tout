<?php
$host = 'localhost';
$user = 'root';
$password = 'root';
$dbName = 'db_compte_tout';

try
{
   $con = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8" , $user, $password);
}
catch (PDOException $e)
{
   die('Erreur : ' . $e->getMessage());
}

$req = $con->query("SELECT * FROM t_list");
$response = $req->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($response);
exit;

?>