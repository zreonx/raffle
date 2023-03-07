<?php include_once 'session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffle</title>
    <link rel="icon" href="../images/ccc_logo-min.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/style.css?v1.1">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/placeholder-loading/dist/css/placeholder-loading.min.css">
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>
</head>
<body>
    <div class="sidenav navbar navbar-expand d-flex flex-column align-items-start sidenav" id="sidenav">
        <div class="d-flex justify-content-center align-items-center w-100 mt-3">
            <a href="#" class=""> 
                <img class="side-logo" src="../images/ccc_logo-min.png" alt="logo">
            </a>
        </div>
        <ul class="navbar-nav d-flex flex-column mt-2 w-100">
            <li id="sidelink" class="nav-item "><a href="../admin/dashboard.php" class="nav-link text-light pl-3"><i class="fas fa-tachometer-slowest space"></i>Dashboard</a></li>
            <li id="sidelink" class="nav-item "><a href="../admin/kiosk.php" class="nav-link text-light pl-3"><i class="fas fa-store-alt space"></i> Kiosk</a></li>
            <li id="sidelink" class="nav-item "><a href="../admin/raffle.php" class="nav-link text-light pl-3"><i class="fas fa-trophy-alt space"></i>Raffle</a></li>
            <li id="sidelink" class="nav-item "><a href="../admin/ticket_generator.php" class="nav-link text-light pl-3"><i class="fas fa-ticket-alt space"></i> Generate Ticket</a></li>       
        </ul>

        <ul class="navbar-nav d-flex flex-column mt-auto w-100">
            <li class="nav-item "><a href="../includes/logout.php" class="nav-link text-light pl-3"><i class="fas fa-sign-out-alt space"></i>Logout</a></li>
        </ul>
        
    </div>
    <section class="my-container p-3">
        <div class="side-header">
            <button class="btn btn-primary d-flex align-items-center icon" id="menu-btn"><span class="material-symbols-outlined icon">menu</span></button>
        </div>
    
