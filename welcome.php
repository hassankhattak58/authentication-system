<?php
session_start();
if (!isset($_SESSION['loggedin']) ||  $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AUTH</title>
</head>

<body>
    <?php include_once('navbar.php'); ?>
    <h1 style="text-align: center;" class="my-4">Welcome <b><?php $name = $_SESSION['username'];
                                                            echo strtoupper($name); ?></b> You are now Loged in..</h1>

    <!-- Footer Starts Here -->
    <section class="contact-area" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="contact-content text-center">
                        <a class="hover-target" target="_blank" href="https://www.youtube.com/@perdev2081"><img src="logo.png" alt="logo"></a>
                        <p>Please Consider subscribing my Channel <a class="hover-target" target="_blank" href="https://www.youtube.com/@perdev2081">PEREV</a> </p>
                        <div class="hr"></div>
                        <div class="contact-social">
                            <ul>
                                <li><a class="hover-target" target="_blank" href="https://www.facebook.com/perdev58"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="hover-target" target="_blank" href="https://github.com/hassankhattak58/"><i class="fab fa-github"></i></a></li>
                                <li><a class="hover-target" target="_blank" href="https://www.youtube.com/@perdev2081"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <footer>
            <p style="margin-bottom: 0px;">Copyright &copy; 2023 <a class="hover-target" target="_blank" href="https://www.youtube.com/@perdev2081"><img src="logo.png" alt="logo"></a> All Rights Reserved.</p>
        </footer>
    </section>

    <!-- Footer Ends Here -->

</body>

</html>