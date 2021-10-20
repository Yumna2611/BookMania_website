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
    <title>Review</title>
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

<!---------- Reviews ---------->
<section class="revbg" id="reviews">
    <div class="titles">
      <h2 class="title"><span>R</span>eviews</h2>
    </div>
    <br> 
    <div class = "rev-row">
      <div class="rev-col">
        <div class="user">
          <img src="./images/rev1.jpg" alt="">
          <div class="user-info">
            <h4>JESSY MORGE <i class="fa fa-twitter"></i></h4>
            <small>@jesmorr</small>
          </div>
        </div>
        <p>This app is great! Its like the Netflix of books! 
          As a homeschool mom, this app has saved us. We have had zero 
          issues and found most of the books we needed. Thanks! We truly love this website!</p>
      </div>
      <div class="rev-col">
        <div class="user">
          <img src="./images/rev2.jpg" alt="">
          <div class="user-info">
            <h4>ROBIN SAMUEL <i class="fa fa-twitter"></i></h4>
            <small>@robinsam</small>
          </div>
        </div>
        <p>From major literary works and detailed historical and scientific studies to popular fiction 
          and self-help books, right down to bizarre self-published tracts about the role of 
          extraterrestrials in human evolution it’s incredible how much there is to find on BookMania. Fantastic!</p>
      </div>
      <div class="rev-col">
        <div class="user">
          <img src="./images/rev3.jpg" alt="">
          <div class="user-info">
            <h4>CHRIS JACOB <i class="fa fa-twitter"></i></h4>
            <small>@chrisjc</small>
          </div>
        </div>
        <p>I am beyond ecstatic over finding BookMania! The selection of ebooks is plentiful. 
          I have found and saved so many books to read that would have otherwise 
          cost me a fortune anywhere else. There’s no contest at all! 👌 💯
        </p>
      </div>
    </div>

    <div>
      <button style = "margin-left: 40%;" class="btn" onclick="window.open('http://localhost/ps5_books/submitrev.php','newwindow','width=600,height=500,left=300,top=200'); return false;">Submit a Review</button>
    </div>
    </section>
     <!------------- Reviews  --------->
    
    
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