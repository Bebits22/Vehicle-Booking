<?php
session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Rental</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- Font Awesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <style>
        <?php include 'driver-dashboard.css'; ?>
    </style>
    <script type="text/javascript" src="index.js" type="text/javascript"></script>
</head>

<body>
  
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="index.html">LOGO</a>
            <!-- Collapse Button -->
            <button class="navbar-toggler second-button" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Ride</a></li>
                    <li class="nav-item"><a class="nav-link active" href="#">Drive</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>



    <h1>Hello World</h1>
    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Praesentium dignissimos ea delectus consequuntur culpa. Dolor perferendis modi iste illum placeat ut quis earum labore quisquam soluta, suscipit accusamus molestiae fugiat!</p>
    
    <a href="logout.php">Log out</a>

    <!-- Sidebar -->
    <!--
    <div id="wrapper">
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="#">Vehicles</a></li>
        </ul>
    </div>
-->
    <!-- Page Content -->
    <!--
    <div id="page-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <a href="#" class="btn btn-success" id="menu-toggle">Toggle Menu</a>
                    <h1>Hello World</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi excepturi, provident aliquid doloribus, nulla delectus nostrum accusamus corrupti, sunt fuga assumenda porro. Sint molestias laboriosam amet explicabo quas fuga nihil.</p>
                </div>
            </div>
        </div>
    </div>


    </div>
    -->
    <!-- START SOCKET-->
    <div class="socket text-light text-center py-3">
        <p>All Rights Reserved © 2021</p>
    </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="scripts.js" type="text/javascript"></script>
    

</body>
</html>