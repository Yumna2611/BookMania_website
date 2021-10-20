<?php

 // Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $username = $password = $confirm_password = $phone =  "";
$name_err = $username_err = $password_err = $confirm_password_err = $phone_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    //Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Please enter your name.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM register WHERE name = ?";
            
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
        
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM register WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    //Validate phone num
    if(empty(trim($_POST["phone"]))){
        $phone_err = "Please enter your number.";
    } elseif(strlen(trim($_POST["phone"])) < 10){
        $phone_err = "Phone number must have 10 digits.";
    } else{
        // Prepare a select statement
         $sql = "SELECT id FROM register WHERE phone = ?";
            
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_phone);
                
            // Set parameters
            $param_phone = trim($_POST["phone"]);
                
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                $phone = trim($_POST["phone"]);   
            } 
            else{
                 echo "Oops! Something went wrong. Please try again later.";
                }
    
            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must be alphanumeric with atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($username_err) && empty($password_err) && empty($confirm_password_err) && empty($phone_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO register (name, username, password, phone) VALUES (?,?,?,?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $param_name, $param_username, $param_password, $param_phone);
            
            // Set parameterse
            $param_name = $name;
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_phone = $phone;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                echo "Successfully Registered!!";
                header("location: login.php");
            } else{
                echo "Sign up failed! Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{font: 14px sans-serif; 
            height: 680px;
            background: linear-gradient(rgba(240, 220, 200, 0.3),#BCC6CC) ,url('./images/reg.jpeg'); }
        .bg {background-color: black; }
        .txt {color: white; 
            margin-left: 27%;}
        .wrapper{ width: 500px; 
            height:auto; 
            padding: 20px;
            margin-left: 35%; 
            background-color:lightblue; 
            box-shadow: 10px 10px 10px rgb(153, 154, 158);}
        form p a {
            color: blue;
        }
        .btn {
            font-size: 1em;
            color: pink;
            background: darkblue;
            display: inline-block;
            padding: 10px 30px;
            margin-left: 15%; 
            text-transform: uppercase;
            text-decoration: none;
            letter-spacing: 2px;
            transition: 0.5s;}
        .btn:hover {
            letter-spacing: 6px;
            color: rgb(162, 252, 110);
            text-shadow: 2px;}
    </style>
</head>
<body>
    <div class = "bg">
       <div class="txt"> <h1>“There is no friend as loyal as a book.”</h1></div>
    </div>

    <div class="wrapper">
        <h2>Register Here!</h2>
        <p>Create an account to experience an exciting journey.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
                <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div> 
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"   <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Phone Number</label>
                <input type="text" name="phone" class="form-control <?php echo (!empty($phone_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $phone; ?>">
                <span class="invalid-feedback"><?php echo $phone_err; ?></span>
            </div> 
            <div class="form-group">
                <input type="submit" class="btn " value="Submit">
                <input type="reset" class="btn " value="Cancel">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>  
</body>
</html>