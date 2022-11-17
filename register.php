<?php
session_start();
// Including a config file to it
require_once "settings/connection.php";
 
// Variable are initialize with empty values
$username = $fullname = $phone  = $email = $password = $confirm_password = "";
$username_err = $fullname_err = $phone_err =  $email_err= $password_err = $confirm_password_err = "";

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validating the username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } else{
        // Preparing a select statement
        $sql = "SELECT user_id FROM users WHERE username = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            //Binding variables to parameters
            $stmt->bind_param("s", $param_username);
            
            // Setting parameters
            $param_username = trim($_POST["username"]);
            
            // Attempting to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $username_err = "This username is already used.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Closing the statement
            $stmt->close();
        }
    }
    
    // Validating the password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have at least 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validating the confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please enter your password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
     
    //validating the full name
    if(empty(trim($_POST["fullname"]))){
        $fullname_err = "Please enter your full name.";
    }else{
        $fullname = trim($_POST["fullname"]);
    }

 // Validating the phone number
 if(empty(trim($_POST["phone"]))){
    $phone_err = "Please enter a valid phone number. The format is eg. +233 1234567890";
}else if (!preg_match( "/^[\W][0-9]{3}?[\s]?[0-9]{2}?[\s]?[0-9]{3}[\s]?[0-9]{4}$/", $_POST["phone"])){
    $phone_err= "Please enter a valid phone number. The format is eg. +233 1234567890";
} else{
    // Preparing a select statement
    $sql = "SELECT user_id FROM users WHERE phone = ?";
    
    if($stmt = $mysqli->prepare($sql)){
        //Binding variables to parameters
        $stmt->bind_param("s", $param_phone);
        
        // Setting parameters
        $param_phone = trim($_POST["phone"]);
        
        // Attempting to execute the prepared statement
        if($stmt->execute()){
            // store result
            $stmt->store_result();
            
            if($stmt->num_rows == 1){
                $phone_err = "This phone number is already used.";
            } else{
                $phone = trim($_POST["phone"]);
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Closing the statement
        $stmt->close();
    }
}

    // Validating the email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please your email.";
    }else if (!preg_match( "/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i", $_POST["email"])){
        $email_err= "please enter a valid email";
}   else{
        // Preparing a select statement
        $sql = "SELECT user_id FROM users WHERE email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            //Binding variables to parameters
            $stmt->bind_param("s", $param_email);
            
            // Setting parameters
            $param_email = trim($_POST["email"]);
            
            // Attempting to execute the prepared statement
            if($stmt->execute()){
                // store result
                $stmt->store_result();
                
                if($stmt->num_rows == 1){
                    $email_err = "This email is already used.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Closing the statement
            $stmt->close();
        }
    }
    

    //Checking the input errors before updating into the database
    if(empty($username_err) && empty($fullname_err) && empty($phone_err) && empty($email_eer) && empty($password_err) && empty($confirm_password_err)){
        
        // Preparing an insert statement
        $sql = "INSERT INTO users (username, fullname, phone, email, password) VALUES (?, ?, ?, ?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){  
            ///Storing the session information
            $_SESSION["username"] = $username;     
            $_SESSION["fullname"] =  $fullname;  
            $_SESSION["email"] = $email; 
            $_SESSION["phone"] = $phone;    
                ///// Storing Data session variables
             $param_fullname = $fullname;
             $param_phone = $phone;
             $param_username = $username;
             $param_email= $email;
             $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Binding variables to parameters
            $stmt->bind_param("sssss", $param_username, $param_fullname,  $param_phone, $param_email, $param_password);


            // Attempting to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            
            }

            // Closing the statement
            $stmt->close();
        }
    }
    
    // Closing the connection
    $mysqli->close();
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Register</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages hd-white">
    <div id="wrapper">
        <header id="header-container">
            <div id="header">
                <div class="container container-header">
                    <div class="left-side">
                        <div id="logo">
                            <a href="index.php"><img src="images/rest.png" alt=""></a>
                        </div>
                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
							<span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1">
                            <ul id="responsive">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="login.php">My Paid Rooms</a></li>
                                    <li><a href="faq.php">FAQ</a></li> 
                                    <li><a href="contact_us.php">Contact</a></li>
                            </ul>
                    </div>
                    <div class="header-user-menu user-menu add">
                            <a href="login.php" style="color:#FF385C; text-decoration:none;"><strong>Login &nbsp; &nbsp;</strong></a>
                    <a href="index_cart.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;'></i></a>
                    </div>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Login</h1>
</div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION LOGIN -->
        <div id="login">
            <div class="login">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="divider"><span></span></div>
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="txtNoSpaces" value="<?php echo $username; ?>">
                        <span class="help-block"  style="color:red;"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($fullname_err)) ? 'has-error' : ''; ?>">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="fullname" value="<?php echo $fullname; ?>">
                        <span class="help-block" style="color:red;"><?php echo $fullname_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                        <label>Phone</label>
                        <input type="tel" class="form-control" name="phone" value="<?php echo $phone; ?>">
                        <span class="help-block" style="color:red;"><?php echo $phone_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                        <span class="help-block" style="color:red;"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                        <span class="help-block" style="color:red;"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" value="<?php echo $confirm_password; ?>">
                        <span class="help-block"  style="color:red;"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <button type="submit" class="btn_1 rounded full-width">Sign up to Find Hostels</button>
                    <div class="text-center add_top_10">Already have an account? <strong><a href="login.php">Sign In!</a></strong></div>
                </form>
            </div>
        </div>
        <!-- END SECTION LOGIN -->
<!-- Footer -->
<footer class="first-footer">
            <div class="second-footer">
                <div class="container">
                    <p>2022 © Copyright - All Rights Reserved.</p>
                    <p>Made By <a href="mailto:alhassan.dramani@ashesi.edu.gh">Dramani Alhassan </a></p>
                </div>
            </div>
        </footer>


        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

        <script>
            $(document).ready(function(){ 
            $("#txtNoSpaces").keydown(function(event) {
                if (event.keyCode == 32) {
                    event.preventDefault();
                }
            });
            });
        </script>

    </div>
</body>
</html>
