<?php
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

// Define variables and initialize with empty values
$name = $email = $phone_no = $message =  "";
$name_err = $email_err = $phone_no_err = $message_err = "";


// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM contactus WHERE name = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
                
            // Set parameters
            $param_name = trim($_POST["name"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $name = trim($_POST["name"]);     
            } 
            else{
                 echo "Oops! Something went wrong. Please try again later.";
                }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    //Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter valid email.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM contactus WHERE email = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
                
            // Set parameters
            $param_email = trim($_POST["email"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $email = trim($_POST["email"]);     
            } 
            else{
                 echo "Oops! Something went wrong. Please try again later.";
                }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    //Validate phone num
    if(empty(trim($_POST["phone_no"]))){
        $phone_no_err = "Please enter your mobile number.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM contactus WHERE phone_no = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone_no);
                
            // Set parameters
            $param_phone_no = trim($_POST["phone_no"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $phone_no = trim($_POST["phone_no"]);     
            } 
            else{
                 echo "Oops! Something went wrong. Please try again later.";
                }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    //Validate message
    if(empty(trim($_POST["message"]))){
        $message_err = "This field is required.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM contactus WHERE message = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_message);
                
            // Set parameters
            $param_message = trim($_POST["message"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $message = trim($_POST["message"]);     
            } 
            else{
                 echo "Oops! Something went wrong. Please try again later.";
                }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($email_err) && empty($phone_no_err) && empty($message_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO contactus (name, email, phone_no, message) VALUES (?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_email, $param_phone_no, $param_message);
            
            // Set parameters
            $param_name = $name;
            $param_email = $email;
            $param_phone_no = $phone_no;
            $param_message = $message;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo '<script>alert("Thank you for your Feedback :)")</script>';
            } else{
                echo "Submission failed! Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    // Close connection
    mysqli_close($link);
}

?>
<!-- ================================================================================== -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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

<!--------- Contact --------------->
<section class=conbg id="contact">
    <div class="row">
    <div class="contact">
        <div class="map">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d482632.8066032487!2d72.60029140994146!3d19.082687057804428!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra!
          5e0!3m2!1sen!2sin!4v1628510088246!5m2!1sen!2sin" allowfullscreen="" loading="lazy"></iframe>
        </div>
        </div>
        <div class="contact">
          <div class="contact-form" style="height:600px">
            <h1>Contact Us</h1>
              <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            
                <input type="text" name="name" placeholder="Name" class="txt <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span style="color:red; font: 12px sans-serif;" class="invalid-feedback"><?php echo $name_err; ?></span> 
            
            
                <input type="text" name="email" placeholder="Email" class="txt <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span style="color:red; font: 12px sans-serif;" class="invalid-feedback"><?php echo $email_err; ?></span>
            
                <input type="phone number" name = "phone_no" placeholder="Phone Number" class="num <?php echo (!empty($phone_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone_no; ?>">
                <span style="color:red; font: 12px sans-serif;" class="invalid-feedback"><?php echo $phone_no_err; ?></span> 
            
                <input style="height:100px" type ="text" name = "message" placeholder="Message" class="textarea <?php echo (!empty($message_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $message; ?>">
                <span style="color:red; font: 12px sans-serif;" class="invalid-feedback"><?php echo $message_err; ?></span>
            
                <input type="submit" class="btn" value = "Submit" >
            
              </form>
          </div>
      </div>
    </div>
  </section>
  <!--------- Contact ---------------> 
  
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