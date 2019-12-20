<?php
header("Access-Control-Allow-Origin: *");

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With, content-type, origin");
header('Content-Type: text/plain');

require('../vendor/autoload.php');

?>