<?php
session_start();


echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="/iDiscuss">iDiscuss</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/iDiscuss">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about.php">About</a>
    </li>
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Top Categories
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql="SELECT `c_name`,`c_id` FROM `categories` LIMIT 5";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
          echo '<a class="dropdown-item" href="threadlist.php?catid='.$row['c_id'].'">' . $row['c_name'] . '</a>';
        }
     echo '</div>
    </li>
    <li class="nav-item">
      <a class="nav-link " href="contact.php" aria-disabled="true">Contact</a>
    </li>
  </ul>';
  if(isset($_SESSION['loggedin'])&&$_SESSION['loggedin']==true){
    echo '<form class="form-inline my-2 my-lg-0"  action="search.php" method="get">
    <input class="form-control mr-sm-2" type="search"  name="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit">Welcome  <u>' .$_SESSION['useremail']. '</u>  </button><br/>
    <a href="partial/logout.php"  class="btn btn-success my-2 my-sm-0 ml-2" type="submit" >Log Out</a>
    </form>';
  }
  else{ 
  echo  '<form class="form-inline my-2 my-lg-0">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    <div>
    <button class="btn btn-outline-success my-2 my-sm-0 ml-2" type="submit" data-toggle="modal" data-target="#loginmodal">Log In</button>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit" data-toggle="modal" data-target="#signupmodal">Sign up</button>';
  }
 echo  '</div>
</div>
</nav>';

include 'partial/_loginmodal.php';
include 'partial/_signupmodal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Success!</strong> You can Login now.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
}
?>