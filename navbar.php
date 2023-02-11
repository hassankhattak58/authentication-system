
<?php
$loginsucesstabs = false;
$signuptabsonsucess = false;

if (!isset( $_SESSION['loggedin']) ||  $_SESSION['loggedin'] != true) {
 $loginsucesstabs = false;
 $signuptabsonsucess = true;
}
else{
  $loginsucesstabs = true;
}


?>

<!-- Style.CSS Link -->
<link rel="stylesheet" href="style.css">
<!-- Style.CSS Link -->

<!-- fontawesome Link -->
<script src="https://kit.fontawesome.com/0bd3a7a619.js" crossorigin="anonymous"></script>
<!-- fontawesome Link -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">AUTH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <?php 
        if ($signuptabsonsucess) {
          echo'<li class="nav-item">
          <a class="nav-link active" aria-current="page" href="signup.php">Sign Up</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>';
        }
        
        ?>
        <?php
        if ($loginsucesstabs) {
          echo'<li class="nav-item">
          <a class="nav-link" href="welcome.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>