<?php
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    //get the corresponding user
    $username = $data['username'];
    $pwd = $data['pwd'];
    $authentic = false;
    $query = "SELECT * FROM `t_user` WHERE useUsername = :username";

    $params = array(array("name" => "username", "value" => $username, "type" => PDO::PARAM_STR));
    
    $db = new database();

    $db->prepareExecute($query, $params);
    $result = $db->fetchData(PDO::FETCH_ASSOC);

    //if the user exists
    if(!empty($result) && count($result) == 1){
        //compare hashed passwords
        if(hash('sha256', $pwd) == $result[0]["usePassword"]){
            $authentic = true;
        }
    }

    
} else{
    $authentic = "noPOST";
}

if($authentic){
    $response = array("username" => $result[0]["useUsername"], "idUser" => $result[0]["idUser"]);
} else{
    $response = array("username" => "","idUser" => -1);
}

echo json_encode($response);
exit;

?>