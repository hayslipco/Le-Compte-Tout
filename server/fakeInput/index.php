<?php
include_once('../database.php');
require_once './faker/src/autoload.php';
$faker = Faker\Factory::create();
$db = new database();

/* INSERT INTO table_name (column_list)
VALUES
(value_list_1),
(value_list_2),
...
(value_list_n); */

function fakeUsers(){
    $query = "INSERT INTO t_user (useUsername, usePassword) \r\n VALUES";
    
    for($i = 0; $i < 10; $i++){
        $query .= "\r\n('$faker->userName', '$faker->lastName'),";
    }
    
    $query = trim($query, ",");
    $query .= ";";
    
    $response = $db->queryExecute($query);
    
    echo $query . "\r\n\r\n" . $response->queryString;

}

function fakeList($faker, $db){
    $query = "INSERT INTO t_list (lisName) \r\n VALUES";
    
    for($i = 0; $i < 20; $i++){
        $query .= "\r\n('$faker->word'),";
    }
    
    $query = trim($query, ",");
    $query .= ";";
    
    $response = $db->queryExecute($query);
    
    echo $response->queryString;
}


//idList 	idUser 	couName 	couCount 	couDate 

function fakeCount($faker, $db){
    $query = "INSERT INTO t_count (idList, idUser, couName, couCount) \r\n VALUES";
    
    for($i = 0; $i < 20; $i++){
        $query .= "\r\n(" . rand(0,20) . ", ". rand(0,20) . ", '$faker->word', " . rand(-1000, 1000) . "),";
    }
    
    $query = trim($query, ",");
    $query .= ";";
    
    $response = $db->queryExecute($query);
    
    echo $query;
}

fakeCount($faker, $db);