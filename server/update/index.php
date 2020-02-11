<?php

function cors() {

    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }

    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");         

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

        exit(0);
    }

    echo "You have CORS!";
}

//cors();

include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    $name = $data['name'];
    $quant = $data['quant'];
    $mode = $data["mode"];
    $idList = $data["idList"];
    $idUser = $data["idUser"];

    if($mode == "insert"){
        $query = "INSERT INTO `t_count`(`idList`, `idUser`, `couName`, `couCount`, `couDate`) VALUES ($idList, $idUser, :couName, :couCount, CURDATE())";
        $couNameParam = array("name" => "couName", "value" => $name, "type" => PDO::PARAM_STR);
        $couCountParam = array("name" => "couCount", "value" => $quant, "type" => PDO::PARAM_INT);
        $params = array($couNameParam, $couCountParam);
    } elseif ($mode == "update"){
        $query = "UPDATE `t_count` SET `couCount`=:couCount WHERE idList= $idList AND idUser = $idUser";
        $couCountParam = array("name" => "couCount", "value" => $quant, "type" => PDO::PARAM_INT);
        $params = array($couCountParam);
    } elseif ($mode == "delete"){
        $query = "DELETE FROM t_count WHERE idList= $idList AND idUser = $idUser AND couName = :couName";
        $couNameParam = array("name" => "couName", "value" => $name, "type" => PDO::PARAM_STR);
        $params = array($couNameParam);
    }

    $db = new database();
    $response = $db->prepareExecute($query, $params);
    //$response = $query;
    
} else{
    $response = "noPOST";
}

echo json_encode($response);
exit; 

?>