<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login System</title>
</head>

<body>
    <?php
    $login = false;
    $errorlogin = false;
    $usernotregiterederr = false;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['login'])) {
            require('dbconnect.php');
            $username = $_POST['username'];
            $password = $_POST['password'];
            // $select = "Select * from login WHERE username = '$username' AND password = '$verfypass'";
            $select = "SELECT * FROM `login` WHERE username='$username'";
            $query = mysqli_query($con, $select);
            $loginsucess = mysqli_num_rows($query);
            if ($loginsucess == 1) {
                $fetchrow = mysqli_fetch_assoc($query);
                if (password_verify($password, $fetchrow['password'])) {
                    $login = true;
                    session_start();
                    $_SESSION['loggedin'] = true;
                    $_SESSION['username'] = $username;
                    header("location: welcome.php");
                } else {
                    $errorlogin = true;
                }
            } else {
                $usernotregiterederr = true;
            }
        }
    }
    ?>

    <?php include_once('navbar.php'); ?>
    <?php if ($usernotregiterederr) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>User Not Registered</strong> The user name was not found in the database. Please try again with a right username or <a href='signup.php'> Click here</a> to register. Thanks!!..
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>
    <?php
    if ($errorlogin) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Invalid Passwrod</strong> Please Enter valid Password... Thanks!!
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>";
    }
    ?>
    <h1 style="text-align:center;" class="my-4">Login</h1>
    <form class="w-75 m-auto mt-6" method="POST" action="login.php">
        <div class="mb-3">
            <label for="username" class="form-label">User Name</label>
            <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <button type="submit" class="btn btn-primary" name="login">Login Now</button>
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