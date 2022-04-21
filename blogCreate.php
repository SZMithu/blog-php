<?php
@include './componants/header.php';
@include './database/configer.php';
if (!isset($_SESSION['name'])) {
    header("Location: signin.php");
}
?>

<!--Use the bellow code for modal-->
<div class="d-block bgLightBlue mt-5 pt-5">
    <section class="container bg-white card card-body shadow shadow-sm">
        <p class="font-weight-lighter text-center bg-light py-2 mb-4 h3">
            <strong>Create Post</strong>
        </p>

        <?php
        if ((isset($_POST['submit'])) || ($_SERVER['REQUEST_METHOD'] == "POST")) {
            $title = stripslashes($_POST["title"]);
            $title = mysqli_real_escape_string($conn, $title);

            $desc = stripslashes($_POST["desc"]);
            $desc = mysqli_real_escape_string($conn, $desc);


            $created_at = date("Y-m-d H:i:s");
            $id = $_SESSION["id"];

            $imageName = $_FILES['image']['name'];
            $tmp_name  = $_FILES['image']['tmp_name'];
            $uploc     = 'img/' . $imageName;
            $imgtype   = $_FILES['image']['type'];
            $imgsize   = $_FILES['image']['size'];
            

         if (($imgtype == 'image/png') || ($imgtype == 'image/jpeg')) {

                $query = "INSERT INTO `blogs` (title, description, image, active, user_id, created_at) 
                  VALUES('$title', '$desc', '$imageName', '1', '$id', '$created_at')";

                $result = mysqli_query($conn, $query);

                move_uploaded_file($tmp_name, $uploc);
                header("Location: dashboard.php");
         } else {
                 echo "<div class='alert alert-danger' role='alert'>Invalid Image Type or size.
                 </div>";
             }
        }

        ?>

        <form class="container" action="#" method="POST" enctype="multipart/form-data">
            <fieldset class="fieldset">
                <div class="form-group">
                    <label class="col-md-12 control-label">Title</label>
                    <div class="col-md-12">
                        <input type="text" class="form-control" value="" required name="title" />
                        <small class="text-secondary">Name of the article represents what your article is all
                            about.
                        </small>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-12 control-label">Description</label>
                    <div class="col-md-12 col-sm-9 col-xs-12">
                        <textarea name="desc" cols="30" rows="20" class="form-control" required></textarea>
                        <small class="text-secondary">Write the full article.</small>
                    </div>
                </div>
                <div class="form-group px-3">
                    <figure class="col-md-2 offset-md-5">
                        <img class="rounded img-fluid shadow shadow-sm" src="./img/mahin.jpg" alt="" />
                    </figure>

                    <div class="col-md-6 offset-md-3 text-center pb-3">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input outline-primary" id="customFile" name="image" />
                            <label class="custom-file-label bg-light" for="customFile">
                                <i class="fas fa-image text-primary"></i>
                                Choose file</label>
                        </div>
                    </div>
                </div>
            </fieldset>
            <hr />
            <div class="form-group">
                <div class="text-center">
                    <input class="btn btn-primary" type="submit" name="submit" value="Create Article" />
                    <button class="btn btn-outline-danger px-3 ml-2">Cancel</button>
                </div>
            </div>
        </form>
    </section>
</div>

<!-- Footer -->
<?php
@include './componants/footer.php';
?>