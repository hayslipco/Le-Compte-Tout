<?php
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    //create log file
    $file = "registerlog.txt";
    $current = file_get_contents($file);

    //get the corresponding user
    $username = $data['username'];
    $pwd = $data['pwd'];
    $registered = false;
    $userExists = false;

    $current .= "\n username: $username, password: $pwd";
    file_put_contents($file, $current);
    
    //fetch users from db
    $query = "SELECT * FROM `t_user` WHERE useUsername = :username";
    $params = array(array("name" => "username", "value" => $username, "type" => PDO::PARAM_STR));
    $db = new database();
    $db->prepareExecute($query, $params);
    $result = $db->fetchData(PDO::FETCH_ASSOC);

    //if the user exists
    if(!empty($result) && count($result) == 1){
        $userExists = true;
        $registered = false;

        $current .= "\n user exists !, variable: usr: $userExists / reg: $registered";
        file_put_contents($file, $current);
    } else{
        //hash the users password before storing
        $pwd = hash('sha256', $pwd);

        //register user
        $query = "INSERT INTO t_user (useUsername, usePassword) VALUES(:username, :pwd)";
        $usrnameParam = array("name" => "username", "value" => $username, "type" => PDO::PARAM_STR);
        $pwdParam = array("name" => "pwd", "value" => $pwd, "type" => PDO::PARAM_STR);
        $params = array($usrnameParam, $pwdParam);
        $db->prepareExecute($query, $params);
        $result = $db->fetchData(PDO::FETCH_ASSOC);

        $responseArray = json_encode($result);
        $current .= "\n user 'inserted', response: $responseArray";
        file_put_contents($file, $current);

        $registered = true;
    }

    
} else{
    $response = "noPOST";
}

if($registered){
    $response = array("username" => $username, "registered" => 201);
} elseif($userExists){
    $response = array("username" => "", "registered" => -1);
} else{
    $response = array("username" => "", "registered" => -2);
}



echo json_encode($response);
exit;

?>