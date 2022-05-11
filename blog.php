<?php
 include './componants/header.php';
 include './database/configer.php';
 
?>
<?php
if(isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];

  $query = "SELECT * FROM blogs WHERE id = $id";
  $result = mysqli_query($conn, $query);
  
  $title       = "";
  $desc        = "";
  $image       = "";
  $userid      = "";
  $create_time = "";
  
  while($row = mysqli_fetch_assoc($result)){
    $title  = $row['title'];
    $desc   = $row['description'];
    $image  = $row['image'];
    $userid = $row['user_id'];
    $create_time = date("Y/m/d", strtotime($row['created_at']));
    
   
  }
  
  
}
$query = "SELECT name FROM users WHERE id = $userid";
$result = mysqli_fetch_assoc(mysqli_query($conn, $query));
$name = $result['name'];
?>
<!-- Body -->
    <!--Use the bellow code for modal-->
    <section class="container bg-white card card-body shadow shadow-sm my-5 pt-5">
     <div class="d-block bgLightBlue">
        <div class="col-lg-12">
          <div class="mb-5" style="width: auto; max-height: auto; overflow: hidden">
            <img
              src="img/<?php echo $image ?>"
              alt="image"
              class="img-fluid w-100"
            />
          </div>
           <h1 class="mb-4"><?php echo $title ?></h1>
          <div class="d-flex mb-5">
            <div class="vcard">
              <span class="d-block"
                ><a href="#" class="text-dark font-weight-bold"><?php echo $name ?></a>
                </span>
              <span class="date-read">
                <?php echo $create_time ?></span> 
            </div>
          </div>
           <p>
            <?php echo $desc;?>
           </p>

          <!-- reply/comment php -->
        <?php
        
          if((isset($_POST["submit"])) || ($_SERVER['REQUEST_METHOD'] == "POST")){
            
            //reply data insert 

          if(isset($_POST["reply"])){
            $reply = $_POST["reply"];
            $blogId = $id;
            $comment_id =$_POST["comment_id"];
            $reply_at = date("Y-m-d H:i:s");
            $query = "INSERT INTO `replys` VALUES ('','$comment_id', '$blogId', '$reply', '$reply_at')";
            $result = mysqli_query($conn, $query);
           }else{
 
            //comment data insert

            $comment = $_POST["textarea"];
            $blogId = $id;
            $name = $_SESSION["name"];
            $commentTime = date("Y-m-d H:i:s");
            
  
            $query = "INSERT INTO `comments` (blog_id, user_name, comment, comment_at) 
                      VALUES ('$id', '$name', '$comment', '$commentTime')";
                
            $result = mysqli_query($conn, $query);
          }    
           
        }
        //Fetch data from comments
         $sqlComments = "SELECT * FROM comments WHERE blog_id =$id";
         
         $resComments = mysqli_query($conn, $sqlComments);
         
         $rows = mysqli_num_rows($resComments);
          
          
          echo '<div class="pt-5">
                 <div class="section-title">
                 <h2 class="mb-5"> '.$rows.' Comments</h2>
                 </div>
                 ';
         
           
        
          while($rowComments = mysqli_fetch_assoc($resComments)){
          
                echo '
              
                <div class="container my-3 px-0 px-md-5">
                  <div class="row">
                      <div class="col-md-10 col-9 card card-body bg-light">
                        <a href="#" class="h3 text-primary">'.$rowComments["user_name"],$rowComments["id"].'</a>
                        <span class="float-right font-weight-bold">'.$rowComments["comment_at"].'</span>
                        <p class="py-2">'.$rowComments["comment"].'</p>
                        <div class="dropup  w-100">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Reply
                        </button>
                        <form action="" method="post" class="dropdown-menu p-4">
                          <input type="text" class="form-control" id="exampleDropdownFormPassword2" name="reply">
                          <input type="hidden" name="comment_id" value="'.$rowComments["id"].'"/>
                          <input type="submit" class="btn btn-primary px-3" value="Send" />
                      </form>
                      </div>
                     </div>
                   </div>
                </div>
              </div>';

                $sqlReply = "SELECT * FROM replys WHERE blog_id = $id";
                
                $resReply = mysqli_query($conn, $sqlReply);
                
                $rowsReply = mysqli_num_rows($resReply);
                while($rowReply = mysqli_fetch_assoc($resReply)){

                  if($rowComments["id"] === $rowReply["comment_id"]){
                    echo '<div class="container my-3 px-0 px-md-5">
                            <div class="row">
                               <div class="col-md-10 col-9 card card-body bg-light ml-auto">
                                <a href="#" class="h3 text-primary">'.$rowReply
                                ["comment_id"].'</a>
                                <span class="float-right font-weight-bold">'.$rowReply["reply_at"].'</span>
                                <p class="py-2">'.$rowReply["reply"].'</p>
                                <div class="dropup  w-100">
                                  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Reply
                                  </button>
                                  <form action="" method="post" class="dropdown-menu p-4">
                                    <input type="text" class="form-control" id="exampleDropdownFormPassword2" name="reply">
                                    <input type="hidden" name="comment_id" value="'.$rowComments["id"].'"/>
                                    <input type="submit" class="btn btn-primary px-3" value="Send" />
                                  </form>
                                </div>
                              </div>
                            </div>
                          </div>';
                      
                        }
                        }
                      }
         ?> 

          

            <!-- Leave a Comment -->
          <div class="card card-body shadow shadow-sm bg-light mt-5">
              <form action="" method="POST" class="">
                <div class="form-group">
                  <h2 class="mb-4">Leave a comment</h2>
                  <textarea
                    name="textarea"
                    id="message"
                    cols="30"
                    rows="8"
                    class="form-control"
                  ></textarea>
                </div>
                <div class="form-group">
                  <?php 
                  if(isset($_SESSION["name"])){
                    echo '<input
                    type="submit"
                    value="Post Comment"
                    class="btn btn-primary py-3"
                  />';
                  }else{
                    echo '<a href="./signin.php" class="btn btn-primary mx-md-1 px-md-4 px-5"
                    >Login to comment</a
                  >';}
                  ?>
                  
                </div>
              </form>
          </div>
          <!--End of Leave a Comment -->
        </div>
                  
      </div>
    </section>
   
    <!--Use the above code for modal-->


<?php
include './componants/footer.php';
?>