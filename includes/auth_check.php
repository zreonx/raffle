<?php

// session_start();

// $_SESSION['user_id'] = "11111";

if(!isset($_SESSION['user_id'])) {
    header("location: ../index.php");
}

?>