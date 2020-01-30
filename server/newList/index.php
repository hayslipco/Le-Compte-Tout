<?php
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    //create log file
    $file = "newListlog.txt";
    $current = file_get_contents($file);

    //get the corresponding user and list name
    $idUser = $data['idUser'];
    $listName = $data['listName'];
    $listCreated = false;
    $listExists = false;

    $current .= "\n idUser: $idUser, listName: $listName";
    file_put_contents($file, $current);
    
    //fetch lists for the user from db
    $query = "SELECT lisName FROM t_list NATURAL JOIN t_listOwners WHERE t_listOwners.idUser = :idUser AND t_list.lisName = :listName";
    $idUserParam = array("name" => "idUser", "value" => $idUser, "type" => PDO::PARAM_INT);
    $listNameParam = array("name" => "listName", "value" => $listName, "type" => PDO::PARAM_STRING);
    $params = array($idUserParam, $listNameParam);
    $db = new database();
    $db->prepareExecute($query, $params);
    $result = $db->fetchData(PDO::FETCH_ASSOC);

    //if the list exists
    if(!empty($result) && count($result) == 1){
        $listExists = true;

        $current .= "\n list exists !";
        file_put_contents($file, $current);
    } else{
        //create new list for user

        //create list in t_list and add entry to t_listOwners
        $query = "BEGIN;
                INSERT INTO `t_list`(`lisName`) VALUES (:listname);
                INSERT INTO t_listOwners (idList, idUser) VALUES((SELECT LAST_INSERT_ID()), :idUser);
                COMMIT;";
        $db->prepareExecute($query, $params);
        $result = $db->fetchData(PDO::FETCH_ASSOC);

        $responseArray = json_encode($result);
        $current .= "\n list and user inserted, response: $responseArray";
        file_put_contents($file, $current);

        $listCreated = true;
    }

    
} else{
    $response = "noPOST";
}

if($listCreated){
    $response = 201;
} elseif($listExists){
    $response = -1;
} else{
    $response = -2;
}



echo json_encode($response);
exit;

?>