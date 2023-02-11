<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>AUTH</title>
</head>

<body>
    <?php
    $signup = false;
    $error = false;
    $existerr = false;
    require('dbconnect.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['signupbtn'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];
            $cpassword = $_POST['confirmpassword'];
            $mysqliexiest = "SELECT * FROM `login` WHERE username='$username'";
            $existrowcheck = mysqli_query($con, $mysqliexiest);
            $rowconsit = mysqli_num_rows($existrowcheck);
            if ($rowconsit == 1) {
                $existerr = true;
            } else {
                if ($password == $cpassword) {
                    $passhash = password_hash($password, PASSWORD_DEFAULT);
                    $insert = "INSERT INTO `login`.`login`(`id`, `username`, `password`, `datetime`) VALUES ('[value-1]','$username','$passhash',current_timestamp())";
                    $query = mysqli_query($con, $insert);
                    if ($query) {
                        // echo"Sucess";
                        $signup = true;
                    } else {
                        echo "Error";
                    }
                } else {
                    $error = true;
                }
            }
        }
    }
    ?>
    <?php include_once('navbar.php'); ?>
    <?php if ($existerr) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
         <strong>Error!</strong>User Name Exits... Please try with a different one. Thanks!!!!
         <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
          </div>";
    } ?>
    <?php if ($signup) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Registered Sucessfully!</strong> You have Registered Sucessfully. Now you can Login using your Credieantials. Thanks!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    } ?>
    <?php
    if ($error) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Password Does Not Mathces</strong> Please try again... Thanks!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>
    <h1 style="text-align:center;" class="my-4">Sign Up</h1>
    <form class="w-75 m-auto" method="POST" action="signup.php">
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" name="username" id="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="mb-3">
            <label for="confirmpassword" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required>
        </div>
        <button type="submit" class="btn btn-primary" name="signupbtn">Sign Up</button>
    </form>


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