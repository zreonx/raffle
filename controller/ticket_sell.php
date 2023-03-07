<?php 

    sleep(1);

    $ticket_number = $_POST['ticketNumber'];

    require_once '../config/connection.php';

    unset($_SESSION['ticket_exist'],$_SESSION['ticket_purchased'] );
    if($ticket->ticketExists($ticket_number) > 0) {
       
        if($ticket->checkStatus($ticket_number) == 1) {
            $_SESSION['ticket_purchased'] = 
            "<div class='alert alert-dismissible alert-danger' id='error'>
                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                This ticket has already been purchased.
            </div>";
    
            $response = array(
                'ticket_purchased' => $_SESSION['ticket_purchased']
            );
    
            echo json_encode($response);
        }else {
            unset($_SESSION['ticket_exist'],$_SESSION['ticket_purchased'] );
            $ticket->sellTicket($ticket_number);
        }

    }else {
        $_SESSION['ticket_exist'] = 
        "<div class='alert alert-dismissible alert-danger' id='error'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            The ticket you're trying to sell does not exist.
        </div>";

        $response = array(
            'ticket_exist' => $_SESSION['ticket_exist']
        );

        echo json_encode($response);

    }


?>