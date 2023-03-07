<?php 
    
    sleep(3);

    if(!isset($_POST['key'])) {
        header("HTTP/1.0 404 Not Found");
    }else {
        require_once '../config/connection.php';
        $winner = $raffle->getWinner();

        $raffle->setActiveWinner($winner[1]);

        $jsonData = json_encode($winner);
        echo $jsonData;
    }

?>