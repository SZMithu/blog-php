<?php
include './componants/header.php';
include './database/configer.php';


if (isset($_SESSION['name'])) {
  header("Location: index.php");
}
?>

<!-- Body -->
<div class="container-fluid h-100 signUpTreeImageFix mt-5 pt-5">
  <div class="row bgLightBlue">
    <div class="col-md-6 d-flex align-items-end height100">
      <img src="./img/signupImg.svg" alt="Tree swing image" class="w-100" />
    </div>
    <div class="offset-md-1 col-md-4 signUpContent my-3">
      <div class="card">
        <div class="card-body shadow rounded">
          <h2 class="text-center textBlue">Create Account</h2>
          <hr class="w-50 mx-auto bgLightBlue" />


          <!-- Functionalities -->
          <?php
          if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $name = stripslashes($_POST['name']);
            $name = mysqli_real_escape_string($conn, $name);

            $email = stripslashes($_POST['email']);
            $email = mysqli_real_escape_string($conn, $email);

            $password = stripslashes($_POST["password"]);
            $password = mysqli_real_escape_string($conn, $password);

            $password2 = stripslashes($_POST["password2"]);
            $password2 = mysqli_real_escape_string($conn, $password2);

            $create_at = date("Y-m-d H:i:s");

            $sql = "SELECT * FROM `users` WHERE email = '$email'";
            $res = mysqli_query($conn, $sql);

            $row = mysqli_num_rows($res);

            if ($row == 0) {
              $query = "INSERT INTO `users` (name, email, phone, password, image, created_at) VALUES('$name', '$email', '', '" . md5($password) . "', '', '$create_at')";

              if ($password == $password2) {
                $result = mysqli_query($conn, $query);
                if ($result) {
                  header("Location: signin.php");
                } else {
                  echo "<div class='alert alert-danger' role='alert'>Registration Failed</div>";
                }
              } else {
                echo "<div class='alert alert-danger' role='alert'>Password not match</div>";
              }
            } else {
              echo "Email already exist";
            }
          }


          ?>

          <form action="#" method="POST">
            <div class="form-group">
              <label for="name">
                <i class="fas fa-user textBlue"></i> Name
              </label>
              <input type="text" class="form-control" id="name" name="name" required />
            </div>
            <div class="form-group">
              <label for="email">
                <i class="fas fa-envelope textBlue"></i> Email
              </label>
              <input type="text" class="form-control" id="email" name="email" required />
            </div>
            <div class="form-group">
              <label for="password">
                <i class="fas fa-lock textBlue"></i> Password
              </label>
              <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="form-group">
              <label for="password2">
                <i class="fas fa-lock textBlue"></i> Retype Password
              </label>
              <input type="password" class="form-control" id="password2" name="password2" required />
            </div>
            <div class="form-group d-flex justify-content-center">
              <input type="submit" value="Sign Up" class="btn btn-primary w-50" />
            </div>
          </form>
          <div class="text-center pt-2">
            <h5 class="textBlue lead">Sign up with social account</h5>
            <div class="d-flex justify-content-center">
              <a href="#"><i class="fab fa-facebook sizeSocialIcon pr-4"></i></a>
              <a href="#"><i class="fab fa-twitter sizeSocialIcon pr-4"></i></a>
              <a href="#"><i class="fab fa-linkedin sizeSocialIcon"></i></a>
            </div>
          </div>
          <hr />
          <h6 class="text-center py-3">
            Already have an account. <a href="./signin.php">Login now</a>
          </h6>

        </div>
      </div>
    </div>
  </div>
</div>


<?php
include './componants/footer.php';
?>