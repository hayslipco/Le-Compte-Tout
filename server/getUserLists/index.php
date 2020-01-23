<?php
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    $idUser = $data['idUser'];
    $query = "SELECT lisName FROM `t_list` NATURAL JOIN t_listOwners WHERE t_listOwners.idUser = :idUser";

    $params = array(array("name" => "idUser", "value" => $idUser, "type" => PDO::PARAM_INT));

    $db = new database();

    $db->prepareExecute($query, $params);
    $response = $db->fetchData(PDO::FETCH_ASSOC);
    
} else{
    $response = "noPOST";
}

echo json_encode($response);
exit;

?>