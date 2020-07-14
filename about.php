<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Welcome to iDiscuss - Coding Forums</title>
    <style>
     #ques{
       min-height: 85vh;
     }
   
   </style>
  </head>
  <body>

 <?php include 'partial/_dbconnect.php' ;?>
  <?php include 'partial/_header.php' ;?>


<h1 class="my-4 text-center" >About iDiscuss</h1>
  <div class="container" id="ques">
  <div class="about my-4">
    <div class="container">
      <h2>Why iDiscuss Exists</h2>`
     <p class="lead">iDiscuss’s mission is to share and grow the world’s knowledge. A vast amount of the knowledge that would be valuable to many people is currently only available to a few — either locked in people’s heads, or only accessible to select groups. We want to connect the people who have knowledge to the people who need it, to bring together people with different perspectives so they can understand each other better, and to empower everyone to share their knowledge for the benefit of the rest of the world.</p>
    </div>
    <div class="img">
     <img src="img/about1.jpg" height="723px" alt="">
    </div>
    <div class="container my-4">
      <h2>Gather Around a Question</h2>`
     <p class="lead">The heart of iDiscuss is questions — questions that affect the world, questions that explain recent world events, questions that guide important life decisions, and questions that provide insights into why other people think differently. iDiscuss is a place where you can ask questions you care about and get answers that are amazing.

      iDiscuss  has only one version of each question. It doesn’t have a left wing version, a right wing version, a western version, and an eastern version. iDiscuss brings together people from different worlds to answer the same question, in the same place — and to learn from each other. We want iDiscuss to be the place to voice your opinion because iDiscuss is where the debate is happening. We want the iDiscuss answer to be the definitive answer for everybody forever.</p>
    </div>
 </div>
  
  
  </div>
  
  <?php include 'partial/_footer.php' ;?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>