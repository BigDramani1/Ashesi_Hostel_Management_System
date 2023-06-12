<?php
// Initializing the session
session_start();
 
// Check if the user is already logged in, then redirect the person  to home page
if(isset($_SESSION["user_id"])){
    header("location:index.php");
    exit;
}
 
require_once "settings/connection.php";
require "controllers/customer_controller.php";
 
// Stating the variables and initialize it with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
 
        $username = $_POST["username"];
        $password = $_POST["password"];
        
            //store all data
    $customer_username = select_one_username_controller($username);
    //check if the email exists in the database.
    if ($customer_username == NULL) {
          // Display an error message if password is not valid
          $password_err = "Either the password or username is incorrect";
          $username_err = "Either the username or password is incorrect";
    }
    // verify if the password is from the database.
    else {
        if (password_verify($password, $customer_username['password'])) {
			$_SESSION['email'] = $customer_username['email'];
			$_SESSION['full_name'] = $customer_username['full_name'];
            $_SESSION['username'] = $customer_username['username'];
			$_SESSION['user_id'] = $customer_username['user_id'];
			$_SESSION['phone'] = $customer_username['phone'];
			$_SESSION['password'] = $password;
            header("Location: index.php");
        }else {
                    // Display an error message if password is not valid
          $password_err = "Either the password or username is incorrect";
          $username_err = "Either the username or password is incorrect";
  
        }
              
    } 
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
    <title>Login</title>
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
                            <a href="register.php" style="color:#FF385C; text-decoration:none;"><strong>Sign up &nbsp; &nbsp;</strong></a>
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
                    <div class="form-group">
                        <label>Username</label>
                        <input type="name" class="form-control" name="username" value="<?php echo $username; ?>" required>
                        <span class="help-block" style="color:red;"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                        <span class="help-block" style="color:red;"><?php echo $password_err; ?></span>
                    </div>
                    <button type="submit" class="btn_1 rounded full-width">Login to Find Hostels</button>
                    <div class="text-center add_top_10">New to Finding Hostels? <strong><a href="register.php">Sign up!</a></strong></div>
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

    </div>
</body>
</html>
