<?php
include_once('../database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $data = json_decode(file_get_contents('php://input'), true)["data"];

    $name = $data['name'];
    $quant = $data['quant'];
    $mode = $data["mode"];

    if($mode == "insert"){
        $query = "INSERT INTO `t_list`(`lisName`, `lisNum`) VALUES ('$name', $quant)"; 
    } elseif ($mode == "update"){
        $query = "UPDATE `t_list` SET `lisNum`=$quant WHERE lisName='$name'";
    } elseif ($mode == "delete"){
        $query = "DELETE FROM t_list WHERE lisName='$name'";
    }

    $db = new database();
    $response = $db->queryExecute($query);
    
} else{
    $response = "noPOST";
}

echo json_encode($response);
exit;  

?>