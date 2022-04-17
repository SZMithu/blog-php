<!-- Header -->
<?php
@include './componants/header.php';
@include './database/configer.php';

if (!isset($_SESSION['name'])) {
    header("Location: signin.php");
  }

?>

<main class="bgLightBlue mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="container mt-4 mb-4">
                    <div class="w-100 mb-2 text-center">
                        <button class="btn btn-lg btn-primary shadow shadow-sm">
                            <a href="./blogCreate.php" style="color: #fff; text-decoration: none;">
                                <i class="fas fa-pen pr-2"></i> Write New Article
                            </a>
                        </button>
                    </div>
                    <hr class="w-75 mx-auto" />
                    <!--All Article-->
                    <h2 class="text-center font-weight-light py-3">
                        <i class="fas fa-newspaper pr-3"></i>Your Articles
                    </h2>





                    <div class="container">
                        <div class="row">
                            <!--All post single item-->
                            


                            <?php
                             $id = $_SESSION["id"];
                             
                             $query = "SELECT * FROM `blogs` WHERE user_id = $id ORDER BY created_at DESC";
                             $result = mysqli_query($conn, $query);
                             $rows = mysqli_num_rows($result);
                             
                            
                             if ($rows) {
                                  // OUTPUT DATA OF EACH ROW
                            while($row = mysqli_fetch_assoc($result)){
                                $title = $row["title"];
                                $image = $row["image"];
                                $desc = $row["description"];
                                
                            echo '<div class="col-lg-3 col-md-6 mb-4">
                            <div class="card text-left singleCardAllPost shadow shadow-sm">
                              <div class="card-image">
                                 <a href="#">
                                  <img src="img/'.$image.'" class="card-img-top img-fliud" alt="" />
                                 </a>
                              </div>
                                  <div class="pr-4 pt-4 text-right">
                                    <a class="dropdown-toggle" href="#" id="optionDropdown" role="button" data-toggle="dropdown"     aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-cog"></i>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="optionDropdown">
                                     <a class="dropdown-item" href="editBlog.php?id='.$row["id"].'">Edit</a>
                                     <a class="dropdown-item" href="#">Unpublish</a>
                                     <a class="dropdown-item text-danger" href="deleteBlog.php?id='.$row["id"].'"><strong>Delete</strong></a>
                                    </div>
                                  </div>
                                
                              
                                <div class="card-body mt-0 pt-2 mx-4" style="height: 300px; overflow: hidden">
                                       <h4 class="card-title"><strong>'.$title.'</strong></h4>
                                       <hr />
                                       <p class="text-secondary mb-4">'.$desc.'</p>
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
                            echo "<h1>You have no blog yeat!</h1>";
                            }

                            ?>
                              
                            <!--All post single item END-->
                        </div>
                        <!--All Article END-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Footer -->
<?php
@include './componants/footer.php';
?>