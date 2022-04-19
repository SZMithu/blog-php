<?php
include './componants/header.php';
include './database/configer.php';

?>
<?php
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];

  $query = "SELECT * FROM blogs WHERE id = $id";
  $result = mysqli_query($conn, $query);

  $title       = "";
  $desc        = "";
  $image       = "";
  $userid      = "";
  $create_time = "";

  while ($row = mysqli_fetch_assoc($result)) {
    $title  = $row['title'];
    $desc   = $row['description'];
    $image  = $row['image'];
    $userid = $row['user_id'];
    $create_time = date("Y/m/d", strtotime($row['created_at']));
  }
}
$query = "SELECT name FROM users where id = $userid";
$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
$name = $result['name'];
?>
<!-- Body -->
<!--Use the bellow code for modal-->

<div class="d-block bgLightBlue mt-5 pt-5">
  <section class="container bg-white card card-body shadow shadow-sm">
    <div class="col-lg-12">
      <div class="mb-5" style="width: auto; max-height: auto; overflow: hidden">
        <img src="img/<?php echo $image ?>" alt="image" class="img-fluid w-100" />
      </div>
      <h1 class="mb-4"><?php echo $title ?></h1>
      <div class="d-flex mb-5">
        <div class="mr-3">
          <img src="./img/mahin.jpg" alt="Image" class="img-fluid rounded shadow shadow-sm" style="max-width: 60px" />
        </div>
        <div class="vcard">
          <span class="d-block"><a href="#" class="text-dark font-weight-bold"><?php echo $name ?></a>
            in
            <a href="#" class="text-dark font-weight-bold">News</a></span>
          <span class="date-read">
            <?php echo $create_time ?></span>

        </div>
      </div>
      <p>
        <?php echo $desc ?>
      </p>


      <!--All comment-->
      <div class="pt-5">
        <div class="section-title">
          <h2 class="mb-5">6 Comments</h2>
        </div>
        <!--Comment-->
        <div class="container my-3 px-0 px-md-5">
          <div class="row">
            <div class="col-md-2 col-3 m-auto">
              <img src="./img/mahin.jpg" alt="" class="img-fluid rounded-circle" />
            </div>
            <div class="col-md-10 col-9 card card-body bg-light">
              <a href="#" class="h3 text-primary">Abdur Rakib</a>
              <span class="float-right font-weight-bold">30/5/2020</span>
              <p class="py-2">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                Omnis deleniti doloremque soluta voluptatum, aliquid
                repellat minus aliquam tenetur. Amet, dolorem.
              </p>
              <button class="col-md-2 col-3 btn btn-sm btn-outline-primary">
                Reply
              </button>
            </div>
          </div>
        </div>
      </div>
      <!--Comment END-->
      <!--All Comment END-->

      <!-- Leave a Comment -->
      <div class="card card-body shadow shadow-sm bg-light mt-5">
        <form action="#" method="POST" class="">
          <div class="form-group">
            <h2 class="mb-4">Leave a comment</h2>
            <textarea name="textarea" id="message" cols="30" rows="8" class="form-control"></textarea>
          </div>
          <div class="form-group">
            <input type="submit" value="Post Comment" class="btn btn-primary py-3" />
          </div>
        </form>
      </div>
      <!--End of Leave a Comment -->
    </div>
  </section>
</div>
<!--Use the above code for modal-->


<?php
include './componants/footer.php';
?>