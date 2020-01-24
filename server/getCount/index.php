<?php
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    $idList = $data['idList'];
    $query = "SELECT * FROM `t_count` WHERE `idList` = :idList";

    $params = array(array("name" => "idList", "value" => $idList, "type" => PDO::PARAM_INT));

    $db = new database();

    $db->prepareExecute($query, $params);
    $response = $db->fetchData(PDO::FETCH_ASSOC);
    
} else{
    $response = "noPOST";
}

echo json_encode($response);
exit;

?>