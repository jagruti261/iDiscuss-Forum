<?php
$showerror="false";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '_dbconnect.php';
    $user_email =$_POST['signupemail']; 
    $pass =$_POST['password']; 
    $cpass =$_POST['confirmpassword']; 

   // check whether this email exists
    $existsql = "SELECT * FROM `user` WHERE `user_email`='$user_email'";
    $result = mysqli_query($conn, $existsql);
    $numrows= mysqli_num_rows($result);
    if($numrows>0){
        $showerror = "Email already in use";
    }
    else{
        if($pass == $cpass){
            $hash = password_hash($pass, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`user_email`, `user_pass`, `Timestamp`) VALUES ('$user_email' ,'$hash', current_timestamp())";
            $result = mysqli_query($conn, $sql);
            echo $result;
            if($result){
                $showalert= true;
                header("location: /iDiscuss/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showerror = "password do not match";
        }
    }
    header("location: /iDiscuss/index.php?signupsuccess=false&error=$showerror");
}
?>