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
        min-height: 600px;
    }
    </style>

    <title>Welcome to iDiscuss - Coding Forums</title>
</head>

<body>
    <?php include 'partial/_dbconnect.php' ;?>
    <?php include 'partial/_header.php' ;?>
    <?php
        $id = $_GET['catid'];
        $sql= "SELECT * FROM `categories` WHERE c_id=$id";
        $result= mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){
            
            $catname = $row['c_name'];
            $catdesc = $row['c_des'];
            
        }
        
        ?>
    <?php
        $showAlert = false;
        $method=$_SERVER['REQUEST_METHOD'];
        if($method=='POST'){
        //insert into thread into database
        $th_title=$_POST['title'];
        $th_desc=$_POST['desc'];
        
        $th_title= str_replace("<", "&lt;", $th_title);
        $th_title= str_replace("<", "&gt;" , $th_title);

      
        $th_desc= str_replace("<", "&lt;", $th_desc);
        $th_desc= str_replace("<", "&gt;" , $th_desc);

        $sno = $_POST['sno'];
        $sql="INSERT INTO `thread` ( `thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES 
            ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
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
            <h1 class="display-4">Welcome to <?php echo $catname;?> forums</h1>
            <p class="lead"> <?php echo $catdesc;?></p>
            <hr class="my-4">
            <p>Do not post a thread more than once. Post a new thread in the proper forum. If the topic is relevant to
                more than one forum, pick the best fit or most specific forum and post it only once. One post. Do not
                post multiple messages with the same content.</p>
            <a class="btn btn-success btn-lg" href="#" role="button">Learn more</a>
        </div>
    </div>
    <?php
    if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
        echo '<div class="container">
                    <h1 class="py-2">Start a Discussion</h1>
                    <form action=" '.   $_SERVER["REQUEST_URI"] . '" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Problem Title</label>
                            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
                            <small id="textHelp" class="form-text text-muted">Keep your title as crisp and short as possible</small>
                        </div>
                        <input type="hidden" name="sno" value="' . $_SESSION['sno']. '">
                        <div class="form-group">
                            <label for="exampleInputPassword1">Elaborate your problem</label>
                            <textarea class="form-control" id="desc" name="desc" rows="3"></textarea> </br>
                            <button type="submit" class="btn btn-success">Submit</button>
                            </form>
                        </div>
                </div>';
    }
    else{
        echo '<div class="container">
        <h1 class="py-2">Start a Discussion</h1>
        <div class="jumbotron jumbotron-fluid px-4">
            <p class="display-4">You are not logged in </p>
            <p class="lead">please login to able start a Discussion.</p>
        </div>
        </div>';
    }
    ?>
    <div class="container" id="ques">
        <h1 class="py-2">Browes Questions</h1>
        <?php
                    $id = $_GET['catid'];
                    $sql= "SELECT * FROM `thread` WHERE thread_cat_id=$id";
                    $result= mysqli_query($conn,$sql);
                    $noResult = true;
                    while($row = mysqli_fetch_assoc($result)){
                        $noResult = false;
                        $id=$row['thread_id'];
                        $title = $row['thread_title'];
                        $desc = $row['thread_desc'];                        
                        $thread_time = $row['timestamp'];   
                        $thread_user_id = $row['thread_user_id'];
                        $sql2 = "SELECT user_email FROM `user` WHERE `sno`='$thread_user_id'";
                        $result2 = mysqli_query($conn, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);                     

                
                    echo '<div class="media my-4">
                        <img src="img/user.png" width="60px" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0"><a  class="text-dark"   href="thread.php?threadid='.$id.'">'.$title.'</a> </h5>
                            '.$desc . ' </div>'.' <p class="font-weight-bold mb-0 ">Asked by : ' . $row2['user_email'] .' At '.$thread_time.'</p>'.
                        '</div>';
                    }
                    // echo var_dump($noResult);
                    if($noResult){
                    echo '<div class="jumbotron jumbotron-fluid>
                            <div class="container">
                                <p class="display-4">No Result Found</p>
                                <p class="lead">Be the first person to ask a question</p>
                            
                                </div>
                            </div>';
                    }
                ?>
    </div>
    <?php include 'partial/_footer.php';?>

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
    <script>
    window.setTimeout(function() {
        $(".alert-success").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
    </script>
</body>


</html>