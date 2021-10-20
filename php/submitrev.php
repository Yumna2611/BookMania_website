<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $book = $review =  "";
$name_err = $book_err = $review_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM review WHERE name = ?";
            
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

    //Validate book
    if(empty(trim($_POST["book"]))){
        $book_err = "Please enter a book name.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM review WHERE book = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_book);
                
            // Set parameters
            $param_book = trim($_POST["book"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $book = trim($_POST["book"]);     
            } 
            else{
                 echo "Oops! Something went wrong. Please try again later.";
                }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    //Validate review
    if(empty(trim($_POST["review"]))){
        $review_err = "Kindly fill this field.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM review WHERE review = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_review);
                
            // Set parameters
            $param_review = trim($_POST["review"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $review = trim($_POST["review"]);     
            } 
            else{
                 echo "Oops! Something went wrong. Please try again later.";
                }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Check input errors before inserting in database
    if(empty($name_err) && empty($book_err) && empty($review_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO review (name, book, review) VALUES (?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_book, $param_review);
            
            // Set parameters
            $param_name = $name;
            $param_book = $book;
            $param_review = $review;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo '<script>alert("Review submitted")</script>';
                
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
    <title>Feedback</title>
    <!-- Font Awesome -->   
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; height: 500px;
        background: white; }
        /* .bg {background-color: black; margin-top: 40px;}
        .txt {color: white; margin-left: 40%;} */
        .wrapper{ width: 400px; height:400px; padding: 20px;
             margin-left: 20%; margin-top: 8%;
            background-color:lightblue; box-shadow: 20px 20px 20px rgb(153, 154, 158);}
        .btn {
            font-size: 1em;
            color: pink;
            background: darkblue;
            display: inline-block;
            padding: 10px 30px;
            margin-left: 30%; 
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 2px;
            transition: 0.5s;}
        .btn:hover {
            letter-spacing: 6px;
            color: rgb(162, 252, 110);
            text-shadow: 2px;}
    </style>
    <div class="wrapper">
     <h2>Review Time</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Book</label>
                <input type="text" name="book" class="form-control <?php echo (!empty($book_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $book; ?>">
                <span class="invalid-feedback"><?php echo $book_err; ?></span>
            </div>
            <div class="form-group">
                <label>Review</label>
                <input type="text" name="review" class="form-control <?php echo (!empty($review_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $review; ?>">
                <span class="invalid-feedback"><?php echo $review_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>



