<?php

    $ticket_list = array();

    if(isset($_POST['suggestion'])) {
        $ticketId = $_POST['suggestion'];

        require_once '../config/connection.php';

        $ticketdata = $ticket->getAllTickets();

        $ticketIndex = 0;
        while($ticket_row = $ticketdata->fetch(PDO::FETCH_ASSOC)) {
            $ticket_list[$ticketIndex] = $ticket_row['ticket_id'];
            $ticketIndex++;
        }
        
        foreach($ticket_list as $myTicket) {
            if(strpos($myTicket, $ticketId) !== false) {
                echo '<button type="button" class="list-group-item list-group-item-action">'.$myTicket.'</button>';
            }   
        }
    }
?>