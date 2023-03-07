<?php

    sleep(3);


    if(!isset($_POST['number'])) {
        header("HTTP/1.0 404 Not Found");
    }else {

    $number = $_POST['number'];
    $prefix = $_POST['prefix'];

    $response = array();
    unset($_SESSION['negative_number'], $_SESSION['prefix_notfound'], $response['success_ticket']);

    if($number <= 0) {

        $_SESSION['negative_number'] = 
        "<div class='alert alert-dismissible alert-danger' id='error'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            Invalid number of tickets.
        </div>";

        $response['negative_number'] = $_SESSION['negative_number'];

        echo json_encode($response);
        header("../admin/ticket_generator.php");   
        exit();

    }
    if($prefix == 0) {
       $_SESSION['prefix_notfound'] = 
        "<div class='alert alert-dismissible alert-danger' id='error'>
            <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
            Please select some prefix.
        </div>";

        $response['prefix_notfound'] = $_SESSION['prefix_notfound'];

        echo json_encode($response);
        header("../admin/ticket_generator.php");   
        exit(); 
    }else {

            date_default_timezone_set('Asia/Manila');
            $date_time = date('Y-m-d H:i:s');

            //generate numbers
            require_once '../config/connection.php';

            $selectPrefix = $ticket->selectPrefix($prefix);
        
            if($selectPrefix['row_count'] > 0) {
                while($prefix_row = $selectPrefix['result']->fetch(PDO::FETCH_ASSOC)) {
                    $last_ticket = intval(substr($prefix_row['ticket_id'], 1));
            
                    $count = 0;
                    for($i = $last_ticket + 1 ; $i <= $number + $last_ticket; $i++) {
                        $pad_number = str_pad($i, 4, '0', STR_PAD_LEFT);
                        $ticket_id = $prefix . "" . $pad_number;
                        echo $ticket_id . "\n";
                        $count++;
                        $ticket->generateTicket($ticket_id);
                    }
            
                    echo "<h1>$count</h1>";
                    
                }
            }else {
                for($i = 1; $i <= $number; $i++) {
                    $pad_number = str_pad($i, 4, '0', STR_PAD_LEFT);
                    $ticket_id = $prefix . "" . $pad_number;
                    echo $ticket_id . "\n";
                    $count++;
                    $ticket->generateTicket($ticket_id);
                }
            }
        }
    }

?>

