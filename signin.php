<?php
include './componants/header.php';
include './database/configer.php';

if(isset($_SESSION['name'])){
  header("Location: index.php");
  exit();
}
?>

<!-- Body -->
<div class="container-fluid h-100 signUpTreeImageFix mt-5 pt-5">
  <div class="row bgLightBlue">
    <div class="col-md-6 d-flex align-items-end height100">
      <img src="./img/loginImg.svg" alt="Tree swing image" style="transform :scale(-1,1);" class="w-100" />
    </div>
    <div class="offset-md-1 col-md-4 signUpContent my-3">
      <div class="card">
        <div class="card-body shadow rounded">
          <h2 class="text-center textBlue">Login</h2>
          <hr class="w-50 mx-auto bgLightBlue" />
          <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = stripslashes($_POST['email']);
            $email = mysqli_real_escape_string($conn, $email);

            $password = stripslashes($_POST['password']);
            $password = mysqli_real_escape_string($conn, $password);

            $query = "SELECT * FROM `users` WHERE email='$email' AND password='" . md5($password) . "'";
            $results = mysqli_query($conn, $query);
            $rows = mysqli_num_rows($results);

            if ($rows == 1) {
              $name = "";
              $id = "";
              while ($rows = mysqli_fetch_assoc($results)) {
                $name = $rows["name"];
                $id = $rows["id"];
              }


              session_start();
              $_SESSION["name"] = $name;
              $_SESSION["id"] = $id;
              header("Location: index.php");
            } else {
              echo "<div class='alert alert-danger' role='alert'>Email or password is incorrect</div>";
            }
          }
          ?>

          <form action="#" method="POST">
            <div class="form-group">
              <label for="email">
                <i class="fas fa-envelope textBlue"></i> Email
              </label>
              <input type="text" class="form-control" id="email" required name="email" />
            </div>
            <div class="form-group">
              <label for="password">
                <i class="fas fa-lock textBlue"></i> Password
              </label>
              <input type="text" class="form-control" id="password" required name="password" />
            </div>
            <div class="form-group d-flex justify-content-center">
              <input type="submit" value="Login Now" class="btn btn-primary w-50" />
            </div>
            <div class="form-group d-block">
              <div class="row">
                <div class="col-6">
                  <input type="checkbox" name="rememberMe" id="rememberMe">
                  <label for="rememberMe" class="textBlue">Remember me</label>
                </div>
                <div class="col-6">
                  <span class="text-right d-block">
                    <a href="#">Forget password</a>
                  </span>
                </div>
              </div>
            </div>
          </form>
          <h6 class="text-center pb-3">
            Don't have an account. <a href="./signup.php">Sign Up now</a>
          </h6>
          <hr>
          <div class="text-center py-2">
            <h5 class="textBlue lead">Login with social account</h5>
            <div class="d-flex justify-content-center">
              <a href="#"><i class="fab fa-facebook sizeSocialIcon pr-4"></i></a>
              <a href="#"><i class="fab fa-twitter sizeSocialIcon pr-4"></i></a>
              <a href="#"><i class="fab fa-linkedin sizeSocialIcon"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



<?php
include './componants/footer.php';
?>