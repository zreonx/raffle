<?php include_once 'session.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raffle</title>
    <link rel="icon" href="../images/ccc_logo-min.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?v1.1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        document.addEventListener('contextmenu', event => event.preventDefault());
    </script>

    <link rel="stylesheet" href="css/confetti.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
   <div class="d-flex justify-content-center">
      <a href="index.php"><img class="logo px-2" src="images/ccc_logo-min.png" alt="logo"></a>
   </div>
    <a class="navbar-brand" href="#">  Raffle</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Home
            <span class="visually-hidden">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">About</a>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
      </ul>
    </div>
    
  </div>
</nav>
<div class="container">
