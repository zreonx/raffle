<?php 
    // define('DB_HOST', 'localhost');
    // define('DB_USER', 'root');
    // define('DB_PASS', '');
    // define('DB_NAME', 'raffle_db');
    // define('DB_CHARSET', 'utf8mb4');

    define('DB_HOST', 'sql101.epizy.com');
    define('DB_USER', 'epiz_33724816');
    define('DB_PASS', 'zxRD4DpNF8uIwd');
    define('DB_NAME', 'epiz_33724816_raffle_db');
    define('DB_CHARSET', 'utf8mb4');


    include_once '../includes/autoloader.inc.php';
    

    $db = new Connection();
    $conn = $db->conn();

    $raffle = new Raffle($conn);
    $ticket = new Ticket($conn);
    $dashboard = new Dashboard($conn);
    $user = new User($conn);

    include_once '../includes/session.php';

    




    


