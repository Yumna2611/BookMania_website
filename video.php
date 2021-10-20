<?
// Initialize the session
session_start();

//Redirecting to login page after logout
if(!isset($_SESSION["username"])) {
    header("location: login.php");
    return;
}

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
  header("location: login.php");
  exit;
}
 // Include config file
require_once "config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookMania</title>
    <!-- Font Awesome -->   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel = "stylesheet" href="style.css">
</head>

<body>


 <!-- Navigation -->
 <header>
    <a href="#" class="logo">Books<span>.</span></a>
    <div class = "menuToggle" onclick="toggleMenu(); "></div>
    <ul class="navigation">
        <li><a href="wel.php">Home</a></li>
        <li><a href="genre.php">Genres</a></li>
        <li><a href="video.php">Videos</a></li>
        <li><a href="team.php">Explore</a></li>
        <li><a href="review.php">Reviews</a></li>
        <li><a href="http://localhost/ps5_books/contactus.php">Contact</a></li>
        <li><a href="http://localhost/ps5_books/logout.php">Logout</a></li>
    </ul>
  
</header>

<!-- Videos -->
<div class="videos" id="videos">
    <div class="titles">
    <h2 class="title"><span>V</span>ideos</h2>
    <br>
  </div>
    <div class="videoslider">
      <div class="slide">
        <iframe width="400" height="315" src="https://www.youtube.com/embed/BfvjizwfoCQ"></iframe>
      </div>
      <div class="my-video"></div>
      <div class="slide">
        <iframe width="400" height="315" src="https://www.youtube.com/embed/BfvjizwfoCQ"></iframe>
      </div>
      <div class="my-video"></div>
      <div class="slide">
        <iframe width="400" height="315" src="https://www.youtube.com/embed/BfvjizwfoCQ"></iframe>
      </div>
      <div class="my-video"></div>
      <div class="slide">
        <iframe width="400" height="315" src="https://www.youtube.com/embed/BfvjizwfoCQ"></iframe>
      </div>
      <div class="my-video"></div>
      <div class="slide">
        <iframe width="400" height="315" src="https://www.youtube.com/embed/BfvjizwfoCQ"></iframe>
      </div>
    </div>
  </div>
  <!------------ Videos---------->

  <!--------- Footer  ----------->
<div class ="footer" >
    <img src="./images/footer.jpeg" alt="" class="footer-img">
    <div class="titles">
      <h2 class="title"><span>V</span>isit Us</h2>
    </div>
    <div class="footer-row">
      <div class="footer-left">
        <h2><i class="fa fa-map-marker"></i>Address</h2>
        <p>777 Street Road,</i></p>
        <p>ABC Paradise,</p>
        <p>Mumbai, 400001</p>
      </div>
      <div class="footer-right">
        <h2><i class="fa fa-phone"></i><i class="fa fa-paper-plane"></i>Get in Touch</h2>
        <p>+91 7734522992, +91 9834902371</p>
        <p>enquiry@bookmania.com</p>
        <p>www.bookmania.com</p>
      </div>
    </div>
  <div class="social-links">
      <i class="fa fa-facebook"></i>
      <i class="fa fa-twitter"></i>
      <i class="fa fa-instagram"></i>
      <i class="fa fa-youtube"></i>
      <p>© 2021, BookMania</p>
  </div>
  </div>
  
  
   <script type = "text/javascript" src="index.js"></script>
    
  
</body>
</html>