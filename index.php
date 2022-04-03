<?php
 include './componants/header.php';
 include './database/configer.php';


?>


    <!-- Body -->
    <!--Banner-->
    <div
      class="container-fluid homepageHeaderSection bgLightBlue pt-md-5 pb-md-4 pt-5 pb-0"
    >
      <div
        class="row py-md-5 py-0 shadow shadow-sm bg-light text-md-left text-center"
      >
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
          <img
            src="img/landingpageMainImage.png"
            alt="landing image"
            class="img-fluid"
          />
        </div>
      </div>
    </div>

    <!--Latest Articles-->
    <div class="container">
        <div class="row mt-3 pt-5 pb-3">
          <div class="card-group">
            <div class="col-lg-3 col-md-6">
              <h4 class="font-weight-bold mb-4">
                <strong class="red-text-2 font-weight-bold"
                  ><i
                    class="fas fa-square textBlue mr-2"
                    aria-hidden="true"
                  ></i> </strong
                >Our Latest Articles
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
                             $id = $_SESSION["id"];
                             
                             $query = "SELECT * FROM `blogs` ORDER BY created_at DESC";
                             $result = mysqli_query($conn, $query);
                             $rows = mysqli_num_rows($result);
                             $title = "";
                             $image = "";
                            
                             if ($rows) {
                                  // OUTPUT DATA OF EACH ROW
                            while($row = mysqli_fetch_assoc($result)){
                                $title = $row["title"];
                                $image = $row["image"];
                                //Grid column
                            echo '<div class="col-lg-3 col-md-6 mb-4">
                                    <div class="card text-left singleCardAllPost shadow shadow-sm">
                                        <div class="">
                                          <a href="#">
                                           <img src="img/'.$image.'" class="card-img-top img-fliud" alt="" />
                                          </a>
                                         <div class="pr-4 pt-4 text-right">
                                          <a class="dropdown-toggle" href="#" id="optionDropdown" role="button" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">
                                          <i class="fas fa-cog"></i>
                                          </a>
                                          <div class="dropdown-menu" aria-labelledby="optionDropdown">
                                           <a class="dropdown-item" href="#">Edit</a>
                                           <a class="dropdown-item" href="#">Unpublish</a>
                                           <a class="dropdown-item text-danger" href="#"><strong>Delete</strong></a>
                                          </div>
                                         </div>
                                       </div>
                                       <div class="card-body mt-0 pt-0 mx-4" style="height: 300px; overflow: hidden">
                                         <h4 class="card-title"><strong>'.$row["title"].'</strong></h4>
                                         <hr />
                                         <p class="text-secondary mb-4">'.$row["description"].'</p>
                                         </div>
                                         <p class="text-right mb-0 text-uppercase font-small spacing font-weight-bold">
                                          <a href="blog.php" class="textBlue">read more
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
  
      <!-- Latest Magazine-->
      <div class="container">
        <div class="row mt-3 pb-3">
          <div class="card-group d-flex flex-column flex-md-row">
            <div
              class="order2 card card-body col-lg-3 col-md-6 mb-4 shadow shadow-sm"
            >
              <img
                src="https://www.jetspeedmedia.com/image/cache/catalog/2017/DSC-CV0517web-600x711.jpg"
                class="img-fluid z-depth-1 rounded"
                alt="sample image"
              />
              <h5 class="font-weight-bold dark-grey-text mt-4 mb-3">
                Lorem ipsum
              </h5>
              <p class="font-small text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
                animi soluta ratione quisquam, dicta ab cupiditate iure eaque.
              </p>
              <a href="#">
                <h6 class="font-weight-bold textBlue font-small">
                  Read more<i
                    class="fas fa-long-arrow-alt-right ml-2"
                    aria-hidden="true"
                  ></i>
                </h6>
              </a>
            </div>
            <!--Grid column-->
  
            <div
              class="order2 card card-body col-lg-3 col-md-6 mb-4 shadow shadow-sm"
            >
              <img
                src="https://www.jetspeedmedia.com/image/cache/catalog/2017/DSC-CV0517web-600x711.jpg"
                class="img-fluid z-depth-1 rounded"
                alt="sample image"
              />
              <h5 class="font-weight-bold dark-grey-text mt-4 mb-3">
                Lorem ipsum
              </h5>
              <p class="font-small text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
                animi soluta ratione quisquam, dicta ab cupiditate iure eaque.
              </p>
              <a href="#">
                <h6 class="font-weight-bold textBlue font-small">
                  Read more<i
                    class="fas fa-long-arrow-alt-right ml-2"
                    aria-hidden="true"
                  ></i>
                </h6>
              </a>
            </div>
            <!--Grid column-->
  
            <div
              class="order2 card card-body col-lg-3 col-md-6 mb-4 shadow shadow-sm"
            >
              <img
                src="https://www.jetspeedmedia.com/image/cache/catalog/2017/DSC-CV0517web-600x711.jpg"
                class="img-fluid z-depth-1 rounded"
                alt="sample image"
              />
              <h5 class="font-weight-bold dark-grey-text mt-4 mb-3">
                Lorem ipsum
              </h5>
              <p class="font-small text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
                animi soluta ratione quisquam, dicta ab cupiditate iure eaque.
              </p>
              <a href="#">
                <h6 class="font-weight-bold textBlue font-small">
                  Read more<i
                    class="fas fa-long-arrow-alt-right ml-2"
                    aria-hidden="true"
                  ></i>
                </h6>
              </a>
            </div>
            <!--Grid column-->
            <div class="order1 col-lg-3 col-md-6">
              <h4 class="font-weight-bold mb-4 text-right">
                Latest Magazines
                <strong class="red-text-2 font-weight-bold"
                  ><i class="fas fa-square textBlue mr-2" aria-hidden="true"></i>
                </strong>
              </h4>
              <hr class="w-75 ml-auto" />
              <p class="text-secondary text-justify">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo
                animi soluta ratione quisquam, dicta ab cupiditate iure eaque?
                Repellendus voluptatum, magni impedit eaque animi maxime.Soluta
                ratione quisquam, dicta ab cupiditate iure eaque? Repellendus
                voluptatum, magni impedit.
              </p>
            </div>
          </div>
        </div>
      </div>

    <!-- Footer -->

    <?php
     include './componants/footer.php'; 
    ?>