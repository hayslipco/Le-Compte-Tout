<?php
include_once('../database.php');

$db = new database();

$db->queryExecute("SELECT * FROM t_list");
$response = $db->fetchData(PDO::FETCH_ASSOC);

echo json_encode($response);
exit;

?>