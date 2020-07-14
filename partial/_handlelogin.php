<?php
$showerror="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $email =$_POST['loginemail']; 
    $pass =$_POST['loginpass']; 

    $sql = "SELECT * FROM `user` WHERE `user_email`='$email'";
    $result = mysqli_query($conn, $sql);
    $numrows= mysqli_num_rows($result);
    if($numrows>0){
        $row=mysqli_fetch_assoc($result);
        if(password_verify($pass, $row['user_pass'])){
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['sno']= $row['sno'];
            $_SESSION['useremail']=$email;
            echo "logged in". $email;
            header("Location: /iDiscuss/index.php");
            exit(); 

        }
        else{
            echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Success!</strong> You can Login now.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
        
    }
}
?>