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

    <link rel="stylesheet" href="registration.css">
</head>

<body>

<?php

    include 'dbcon.php';

    if(isset($_POST['Register'])) {
        //$driver_format = mysqli_real_escape_string($con, $_POST['driverFormat']);
        $name = mysqli_real_escape_string($con, $_POST['dname']);
        $address = mysqli_real_escape_string($con, $_POST['addr']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $telephone = mysqli_real_escape_string($con, $_POST['contactNo']);
        $nic = mysqli_real_escape_string($con, $_POST['nic']);
        $dlc = mysqli_real_escape_string($con, $_POST['dlc']);

        //password encrypting
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        //making the email unique in the database, so another acc cant be created using that email.
        $emailquery = "select * from registration where email = '$email' ";
        $query = mysqli_query($con, $emailquery);

        //making sure email is not in multiple rows
        $emailcount = mysqli_num_rows($query); //check if data is present in the db or not.
        if($emailcount > 0) {
            echo "email already exists";
        }
        else {
            if($password === $cpassword) {
                $insertquery = "insert into registration( name, address, email, password, cpassword, telephone, nic, dlc) values('$name','$address','$email','$pass','$cpass','$telephone','$nic','$dlc')";
                $iquery = mysqli_query($con, $insertquery);

                if($iquery) {
                    ?>        
                            <script>
                                alert("Inserted Successfully!");
                            </script>
                    
                    <?php
                        }
                        else {
                    ?>        
                            <script>
                                alert("No Connection!");
                            </script>
                    
                    <?php
                        }
            }
            else {
                ?>        
                <script>
                    alert("Passwords are not matching!");
                </script>
        
                <?php
            }
        }
    }

?>


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
                    <li class="nav-item"><a class="nav-link active" href="registration.php">Drive</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- Body Starts Here -->
    <div class="container">
        <div class="row py-5">
            <!-- Sign In Text Block-->
            <div class="text-box col-lg-6 py-5">
                <div class="text">
                    <div class="blockquote"><i class="fas fa-quote-left"></i></div>
                    <div class="quote">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                    <div class="blockquote" align="right"><i class="fas fa-quote-right"></i></div>
                </div>
                <div class="signin">
                    Already have an Account? Please Sign In.<br>
                    <a href="login.php" class="button button-main">Sign In</a>
                </div>
            </div>

            <!-- Sign Up Form -->
            <div class="col-lg-6 py-5">                
                <form action="#" method="POST" class="form-container py-5">                   
                        <h1 align="center" class="form-header">Sign Up as a <font color=#ffce2c>Driver</font></h1>                    
                        <div class="form-input px-5">
                            <label for="driverFormat" class="inputname">Driver Format</label><br>
                            <div class="form-check ">
                                <input type="radio" class="dformat" name="driverFormat" id="driverFormat"> All island school transport association member<br>
                                <input type="radio" class="dformat" name="driverFormat" id="driverFormat">  AISCTA Registered Driver<br>
                                <input type="radio" class="dformat" name="driverFormat" id="driverFormat">  Freelance Driver (None)<br>
                                <input type="radio" class="dformat" name="driverFormat" id="driverFormat">  None<br>
                            </div>
                        </div>  
                        <div class="form-input px-5">
                            <label for="dname" class="inputname">Name</label>
                            <input type="text" class="form-control" placeholder="Name" name="dname" id="dname" required>
                        </div>
                        <div class="form-input px-5">
                            <label for="addr" class="inputname">Address</label>
                            <input type="text" class="form-control" placeholder="Address" name="addr" id="addr" required>
                        </div>
                        <div class="form-input px-5">
                            <label for="email" class="inputname">Email</label>
                            <input type="text" class="form-control" placeholder="Email" name="email" id="email" required>
                        </div>
                        <div class="form-input px-5">
                            <label for="password" class="inputname">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                        </div>
                        <div class="form-input px-5">
                            <label for="cpassword" class="inputname">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="password" required>
                        </div>
                        <div class="form-input px-5">
                            <label for="contactNo" class="inputname">Contact Number</label>
                            <input type="number" class="form-control" placeholder="Contact Number" name="contactNo" id="contactNo" required>
                        </div>
                        <div class="form-input px-5">
                            <label for="nic" class="inputname">NIC</label>
                            <input type="text" class="form-control" placeholder="NIC" name="nic" id="nic" required>
                        </div>
                        <div class="form-input px-5">
                            <label for="dlc" class="inputname">DLC</label>
                            <input type="text" class="form-control" placeholder="DLC" name="dlc" id="dlc" required>
                        </div>
                        <div class="form-input px-5">
                            <input type="submit" value="Register" class="btn">
                            <input type="reset" value="Cancel" class="btn">
                        </div>
                </form>
            </div>            
        </div>
    </div>
    <!-- Body Ends Here -->


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