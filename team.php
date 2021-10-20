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
        <li><a href="http://localhost/ps5_books/wel.php">Home</a></li>
        <li><a href="http://localhost/ps5_books/genre.php">Genres</a></li>
        <li><a href="http://localhost/ps5_books/video.php">Videos</a></li>
        <li><a href="http://localhost/ps5_books/team.php">Explore</a></li>
        <li><a href="http://localhost/ps5_books/review.php">Reviews</a></li>
        <li><a href="http://localhost/ps5_books/contactus.php">Contact</a></li>
        <li><a href="http://localhost/ps5_books/logout.php">Logout</a></li>
    </ul>
  
</header>


<!------------ Team  ------------>
<div class="teams" id="team">
    <div class="titles">
      <h2 class="title"><span>O</span>ur <span>T</span>eam</h2>
    </div>
    <br>
    <div class="row" style="text-align: center;">
      <div class="column mem">
        <img  class="image" src="./images/T1.jpg" alt="team">
        <div class="links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
      </div>
        <p class="name">Ravie Pinto</p>
        <p class="name1">President</p>
      </div>
      <div class="column mem">
        <img  class="image" src="./images/T2.jpg" alt="team">
        <div class="links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
      </div>
        <p class="name">Victor Mat</p>
        <p class="name1">Vice President</p>
      </div>
      <div class="column mem">
        <img  class="image" src="./images/T3.jpg" alt="team">
        <div class="links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
      </div>
        <p class="name">Mathew Morgan</p>
        <p class="name1">Publication Head</p>
      </div>
    </div>
    <br>
    <div class="row" style="text-align: center;">
      <div class="column mem">
        <img  class="image" src="./images/T4.jpg" alt="team">
        <div class="links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
      </div>
        <p class="name">Mia Restora</p>
        <p class="name1">Marketing Manager</p>
      </div>
      <div class="column mem">
        <img  class="image" src="./images/T5.jpg" alt="team">
        <div class="links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
      </div>
        <p class="name">Denil Vasto</p>
        <p class="name1">Chief Editor</p>
      </div>
      <div class="column mem">
        <img  class="image" src="./images/T6.jpg" alt="team">
        <div class="links">
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-instagram"></i>
      </div>
        <p class="name">Pristi Janes</p>
        <p class=name1>Editor</p>
      </div>
    </div>
  </div>
<br>
<!------------- Team  ---------->

  <!-------- Life at BookMania --------->
<div class ="lifebg" id = "lifebg">
  <div class="image_gal">
    <div class="titles">
      <h2 class="title"><span>L</span>ife At <span>B</span>ookMania</h2>
    </div>
    <div class="big_img">
      <img id="img1" src="./images/life1.jpeg" height="400px" width="100%" alt="">
    </div>
    <div class="small_img">
      <img src="./images/life2.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">
  
      <img src="./images/life3.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">

      <img src="./images/life4.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">
    
      <img src="./images/life5.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">
  
      <img src="./images/life6.jpg" height="50px" width="10%" onclick="change(this.src)" alt="">
  
      <img src="./images/life7.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">
  
      <img src="./images/life8.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">
  
      <img src="./images/life9.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">

      <img src="./images/life10.jpeg" height="50px" width="10%" onclick="change(this.src)" alt="">
    </div>
</div>
</div>
<!------------ Life at BookMania -------->
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
