<?php
@include './componants/header.php';
@include './database/configer.php';


?>


<!-- Body -->
<!--Banner-->
<div class="container-fluid homepageHeaderSection bgLightBlue pt-md-5 pb-md-4 pt-5 pb-0">
  <div class="row py-md-5 py-0 shadow shadow-sm bg-light text-md-left text-center">
    <div class="col-md-5 my-auto px-md-5 p-3 pb-md-5">
      <h1 class="textBlue appTitle pl-md-5 px-3">
        <span class="d-md-block d-none">Welcome to</span> DevLogger.com
      </h1>
      <h3 class="pl-md-5 px-3">Know the unknowns</h3>
      <p class="lead pl-md-5 p-3">
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sequi
        rerum excepturi quae explicabo eligendi itaque, sit non voluptate
        aliquam aut.
      </p>
      <div class="ml-md-5 mx-auto z-top">
        <a href="./signup.php" class="btn btn-primary px-4">Sign Up</a>
        <a href="./signin.php" class="btn btn-primary ml-md-3 px-4">Login Now</a>
      </div>
    </div>
    <div class="col-md-7 h-100 headerImg">
      <img src="img/landingpageMainImage.png" alt="landing image" class="img-fluid" />
    </div>
  </div>
</div>

<!--Latest Articles-->
<div class="container">
  <div class="row mt-3 pt-5 pb-3">
    <div class="card-group">
      <div class="col-lg-3 col-md-6">
        <h4 class="font-weight-bold mb-4">
          <strong class="red-text-2 font-weight-bold"><i class="fas fa-square textBlue mr-2" aria-hidden="true"></i> </strong>Our Latest Articles
        </h4>
        <hr class="w-75" />
        <p class="text-secondary text-justify">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
          animi soluta ratione quisquam, dicta ab cupiditate iure eaque?
          Repellendus voluptatum, magni impedit eaque animi maxime.Soluta
          ratione quisquam, dicta ab cupiditate iure eaque? Repellendus
          voluptatum, magni impedit.
        </p>
      </div>

      <?php

      $query = "SELECT * FROM `blogs` ORDER BY created_at DESC";
      $result = mysqli_query($conn, $query);
      $rows = mysqli_num_rows($result);
      $title = "";
      $image = "";

      if ($rows) {
        // OUTPUT DATA OF EACH ROW
        while ($row = mysqli_fetch_assoc($result)) {

          $title = $row["title"];
          $image = $row["image"];
          //Grid column
          echo '<div class="col-lg-3 col-md-6 mb-4">
                              <div class="card text-left singleCardAllPost shadow shadow-sm">
                                <div class="card-image">
                                   <a href="#">
                                    <img src="img/' . $image . '" class="card-img-top img-fliud" alt="" />
                                   </a>
                                </div>
                                    
                                  <div class="card-body mt-0 pt-2 mx-4">
                                         <h4 class="card-title"><strong>' . $row["title"] . '</strong></h4>
                                         <hr />
                                         <p class="text-secondary mb-4">' . $row["description"] . '</p>
                                  </div>
                                    <p class="text-right mb-2 mr-2 text-uppercase font-small spacing font-weight-bold">
                                    <a href="blog.php?id='.$row["id"].'"class="textBlue">read more
                                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                                    </a>
                                    </p>
                                       
                              </div>
                           </div>';
        }
      } else {
        echo "<h1>Loading...</h1>";
      }

      ?>

    </div>
  </div>
</div>
<!-- Latest Article END-->


<!-- Footer -->

<?php
include './componants/footer.php';
?>