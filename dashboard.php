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

$query = "SELECT * FROM `blogs` WHERE user_id = $id";
$result = mysqli_query($conn, $query);
$rows = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);

$title = "";
$desc = "";
$img = "";

if ($rows) {
    // OUTPUT DATA OF EACH ROW
    while($row = mysqli_fetch_assoc($result)) {
        
        echo '<div class="col-md-6 mb-4">
        <div class="card text-left singleCardAllPost shadow shadow-sm">
            <div class="">
                <a href="#">
                    <img src="'.$row["image"].'" class="card-img-top" alt="" />
                </a>
                <div class="pr-4 pt-4 text-right">
                    <a class="dropdown-toggle" href="#" id="optionDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="optionDropdown">
                        <a class="dropdown-item" href="#">Edit</a>
                        <a class="dropdown-item" href="#">Unpublish</a>
                        <a class="dropdown-item text-danger" href="#"><strong>Delete</strong></a>
                    </div>
                </div>
            </div>
            <div class="card-body mt-0 pt-0 mx-4">
                <h4 class="card-title">
                    <strong>'.$row["title"].'</strong>
                </h4>
                <hr />
                <p class="text-secondary mb-4">'.
                    $row["description"].'
                </p>

                <p class="text-right mb-0 text-uppercase font-small spacing font-weight-bold">
                    <a href="#" class="textBlue">read more
                        <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    </a>
                </p>
            </div>
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