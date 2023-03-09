<?php

sleep(3);


if(!isset($_POST['key'])) {
    header("HTTP/1.0 404 Not Found");
}else {
    
    require_once '../config/connection.php';
    unset($_SESSION['sold'], $_SESSION['sell_failed']);
    if($ticket->sellAllTicket() > 0) {
        $_SESSION['sold'] = 
            '<div class="alert alert-dismissible alert-success">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              All tickets has been sold.
            </div>';

            $response = array(
                'sold' => $_SESSION['sold'],
            );
        
            echo json_encode($response);
    }else {
        $_SESSION['sell_failed'] = 
            '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                Selling failed.
            </div>';

            $response = array(
                'sell_failed' => $_SESSION['sell_failed']
            );
        
            echo json_encode($response);
    }

   
}

?>