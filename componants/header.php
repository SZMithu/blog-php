

<!DOCTYPE html>
<html lang="en">
<!-- HEADER -->

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DevLogger</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />


  <script src="https://kit.fontawesome.com/dfff6eb483.js" crossorigin="anonymous"></script>
  
<style>
<?php include './css/style.css'; ?>
</style>
  

</head>

<!-- Body -->

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light shadow fixed-top">
    <a class="navbar-brand text-primary" href="index.php"><span class="fas fa-code"></span> DevLogger</a>
    <a class="top-move" href="#">Go top</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-dark"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <?php
      session_start();
      if (isset($_SESSION["name"])) {
        echo '<div class="ml-auto d-flex">
            <a class="nav-link" href="dashboard.php"
              ><span class="fas fa-user-circle pr-2"></span>' . $_SESSION['name'] . '</a>
              <a href="./signout.php" class="btn btn-outline-danger mx-md-1 px-md-4 px-5"><i class="fas fa sign-out-alt pr-2"></i>Logout</a>
          </div>';
      } else {
        echo '<div class="ml-auto d-flex">
          <a href="./signin.php" class="btn btn-primary mx-md-1 px-md-4 px-5"
            ><i class="fas fa-sign-in-alt pr-2"></i>Login</a
          >
          <a href="./signup.php" class="btn btn-primary mx-md-1 px-md-4 px-5"
            ><i class="fas fa-user-plus pr-2"></i>Signup</a
          >
  
          </div>
        ';
      }
      ?>


    </div>
  </nav>