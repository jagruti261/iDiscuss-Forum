<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
    #ques {
        min-height: 400px;
    }
    </style>
    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partial/_dbconnect.php' ;?>
    <?php include 'partial/_header.php' ;?>
    <?php
    
  $id = $_GET['threadid'];
  $sql= "SELECT * FROM `thread` WHERE thread_id=$id";
  $result= mysqli_query($conn,$sql);
  while($row = mysqli_fetch_assoc($result)){
    
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
    $thread_user_id=$row['thread_user_id'];

    
    $sql2 = "SELECT user_email FROM `user` WHERE `sno`='$thread_user_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);
    $posted_by=$row2['user_email'];
    
  }
  
  ?>
  
  <?php
    $showAlert = false;
    $method=$_SERVER['REQUEST_METHOD'];
    if($method=='POST'){
      //insert into thread into database
      $comment=$_POST['comment'];
      $comment= str_replace("<", "&lt;", $comment);
      $comment= str_replace("<", "&gt;" , $comment);
      $sno = $_POST['sno'];
      $sql="INSERT INTO `comment` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES 
      ( '$comment', '$id', '$sno', current_timestamp())";
      $result= mysqli_query($conn,$sql);
      $showAlert=true;
      if($showAlert){
        echo '<div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Success!</strong> You have been added successfully!
          </div>';
      }

    }  
  ?>
    <div class="container my-4">
        <div class="jumbotron">
            <h1 class="display-4"><?php echo $title;?> </h1>
            <p class="lead"> <?php echo $desc;?></p>
            <hr class="my-4">
            <p>Do not post a thread more than once. Post a new thread in the proper forum. If the topic is relevant to
                more than one forum, pick the best fit or most specific forum and post it only once. One post. Do not
                post multiple messages with the same content.</p>
            <p> Posted By :<b><?php echo  $posted_by;  ?></b> </p>
        </div>
    </div>

    
    <?php
    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
        echo '<div class="container">
                <h1 class="py-2">Post a Comment</h1>
                <form action=" ' . $_SERVER['REQUEST_URI'] . '" method="post">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post a Comment</label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea> 
                        <input type="hidden" name="sno" value="'.$_SESSION['sno'].'">
                        <button type="submit" class="btn btn-success my-4">Post</button>
                    </div>
                </form>
              </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="py-2">Post a Comment</h1>
        <div class="jumbotron jumbotron-fluid px-4">
            <p class="display-4">You are not logged in </p>
            <p class="lead">please login to able Post a Comment.</p>
        </div>
        </div>';
    }
    ?>
    




    <div class="container" id="ques">
        <h1 class="py-2">Discussions</h1>
        <?php
        $id = $_GET['threadid'];
        $sql= "SELECT * FROM `comment` WHERE thread_id=$id";
        $result= mysqli_query($conn,$sql);
        $noResult=true;
        while($row = mysqli_fetch_assoc($result)){
          $noResult=false;
          $id=$row['comment_id'];
          $content = $row['comment_content'];
          $time = $row['comment_time'];
          $thread_user_id = $row['comment_by'];
          $sql2 = "SELECT user_email FROM `user` WHERE `sno`='$thread_user_id'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);   
        


        echo '<div class="media my-4">
          <img src="img/user.png" width="60px" class="mr-3" alt="...">
          <div class="media-body">
            <p class="font-weight-bold mb-0 ny-0">' . $row2['user_email'] . ' At '.$time.'</p>
            '.$content . '
          </div>
    </div>';
  }
  // echo var_dump($noResult);
  if($noResult){
    echo '<div class="jumbotron jumbotron-fluid>
            <div class="container">
                <p class="display-4">No Comment Found</p>
                <p class="lead">Be the first person to Comment</p>
              </div>
          </div>';
  }

  ?>
    </div>

    <?php include 'partial/_footer.php' ;?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>