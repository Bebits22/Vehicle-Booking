<?php
session_start();
    include("connection.php");
    include("functions.php");

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        //something was posted
        $contactno = $_POST['contactNo'];
        $password = $_POST['password'];

        if(!empty($contactno) && !empty($password)) {
            //read from database
            $user_id = random_num(20);
            $query = "select * from registration where contact_number = '$contactno' limit 1";

            mysqli_query($con, $query);

            if($result) {
                if($result &&  mysqli_num_rows($result) > 0) {
                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password) {

                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: driver-dashboard.php");
                        die;
                    }
                }
            }
        }
    
        else {
            echo "Please enter valid login details";
        }
    }
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

    <link rel="stylesheet" href="login.css">
</head>

<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
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
                    <li class="nav-item"><a class="nav-link active" href="login.php">Drive</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Body Starts Here -->
    <div class="container">
        <div class="row py-5">
            <!-- Sign Up Text Block-->
            <div class="text-box col-lg-6 py-5">
                <div class="text">
                    <div class="blockquote"><i class="fas fa-quote-left"></i></div>
                    <div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    <div class="blockquote" align="right"><i class="fas fa-quote-right"></i></div>
                </div>
                <div class="signup">
                    Don't Have An Account? Please Sign Up<br>
                    <a href="registration.php" class="button button-main">Sign Up</a>
                </div>
            </div>

            <!-- Sign In Form -->
            <div class="form-box col-lg-6">                
                <form action="#" method="POST" class="form-container py-5">                   
                        <h1 align="center" class="form-header">Driver <font color=#ffce2c>Login</font></h1>                      
                        <div class="form-input px-5">
                            <label for="contactNo" class="inputname">Contact Number</label>
                            <input type="number" class="form-control" placeholder="Contact Number" name="contactNo" id="contactNo">
                        </div>
                        <div class="form-input px-5">
                            <label for="password" class="inputname">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="psw">
                        </div>    
                        <div class="form-input px-5">
                            <input type="submit" value="Login" class="btn">
                            <input type="reset" value="Cancel" class="btn">
                        </div> 
                </form>
            </div>            
        </div>
    </div>



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