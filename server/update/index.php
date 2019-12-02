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


    $response = $con->query($query);
} else{
    $response = "noPOST";
}

echo json_encode($response);
exit;  

?>