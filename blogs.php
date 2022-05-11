<!-- Header -->
<?php
@include './componants/header.php';
@include './database/configer.php';
?>

<section class="topHeader pt-5 pt-md-0 mt-5">
    <div class="container-fluid bg-light pb-3">
        <br>
        <h1 class="text-center textBlue50 font-weight-lighter py-2">
            <strong>Blog</strong> CMS
        </h1>
        <p class="text-center mb-4 text-uppercase">A platform to show your talent</p>
        <div class="row d-flex justify-content-center">
            <div class="col-md-10 col-xl-5">
                <p class="text-secondary text-center">
                    <em>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, voluptates ratione eos
                        explicabo, sed quis architecto ad consequuntur sit commodi tenetur eum perspiciatis suscipit
                        quam modi illum qui. Aliquam, accusamus?</em>
                </p>
            </div>
        </div>
    </div>
</section>
 <main class="bgLightBlue">
     <div class="container ">
         <div class="row">
             <div class="col-md-12 mt-1">
                 <div class="container mt-3 mb-4">
                    <h2 class="text-center font-weight-light pb-3"><i class="fas fa-crown"></i> Article of the month
                    </h2>
                    <div class="card w-100 shadow shadow-sm mb-2">
                        <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Horizontal/Nature/8-col/img%20(126).jpg" alt="Article image">
                        <div class="card-body p-3">
                            <h4 class="">Lorem ipsum dolor sit amet</h4>
                            <hr>
                            <p class="card-text">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem molestiae
                                voluptatibus, libero numquam vel nobis dicta omnis! Repellat itaque ullam iure
                                deleniti, fugiat assumenda culpa sequi laborum nam minima modi sapiente doloribus
                                voluptatem eveniet enim quia. Deleniti fuga alias exercitationem quam sapiente
                                consequuntur perspiciatis sunt libero vitae, dolorem ab quis, quo minima placeat?
                                Amet praesentium sint cumque quos laboriosam distinctio? ...
                            </p>
                            <div class="row">
                                <div class="col-6">
                                    <h6>27/04/2020</h6>
                                    <h6><span class="font-weight-light">by</span> Tanvir Mahin</h6>
                                </div>
                                <div class="col-6 d-flex justify-content-end align-items-end">
                                    <a href="#" class="h6 textBlue">READ MORE <i class="fas fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--All Article-->
                    <h2 class="text-center font-weight-light py-3"><i class="fas fa-newspaper"></i> Articles</h2>
    
                    <!--All Article END-->
                </div>
            </div>
        </div>
       <div class="card-group"> 
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
                                    <a href="blog.php?id='.$row["id"].'" class="textBlue">read more
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
 </main> 

<!-- Footer -->
<?php
@include './componants/footer.php';
?>