<?php

if(!isset($_POST['key'])){
    header("HTTP/1.0 404 Not Found");
}else {

    require_once '../config/connection.php';
    $winnerData = $raffle->selectIndex();

    $result = array_values($winnerData['result']);
    $jsonData = json_encode($result);
    echo $jsonData;

}