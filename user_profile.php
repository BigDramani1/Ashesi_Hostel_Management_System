<?php
// Initialize the session
session_start();
// Including the config file
require_once "settings/connection.php";
 
// Variable are initialize with empty values
$username = $fullname = $phone =  $email= "";
$new_username_err = $new_fullname_err = $new_phone_err = $new_email_err = "";

// Data being processed when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Validating the username
    if(empty(trim($_POST["username"]))){
        $new_username_err = "Please enter a username.";
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
                
                if($stmt->num_rows == 2){
                    $new_username_err = "This username is already used.";
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
 //validating the full name
 if(empty(trim($_POST["fullname"]))){
    $new_fullname_err = "Please enter your first name.";
}else{
    $fullname = trim($_POST["fullname"]);
}

// Validating the phone number
if(empty(trim($_POST["phone"]))){
    $new_phone_err = "Please enter a valid phone number. The format is eg. +233 1234567890";
}else if (!preg_match( "/^[\W][0-9]{3}?[\s]?[0-9]{2}?[\s]?[0-9]{3}[\s]?[0-9]{4}$/", $_POST["phone"])){
    $new_phone_err= "Please enter a valid phone number. The format is eg. +233 1234567890";
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
            
            if($stmt->num_rows == 2){
                $new_phone_err = "This phone number is already used.";
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
    $new_email_err = "Please your email.";
}else if (!preg_match( "/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i", $_POST["email"])){
    $new_email_err= "please enter a valid email";
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
            
            if($stmt->num_rows == 2){
                $new_email_err = "This email is already used.";
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


// Checking the input errors before updating into the database
if(empty($new_username_err) && empty($new_fullname_err) && empty($new_email_err) && empty($new_phone_err)){
    // Prepare an update statement
    $sql = "UPDATE users SET username = ?, fullname = ?,  email = ?, phone = ? WHERE user_id= ?";
      // Binding variables to parameters
    if($stmt = $mysqli->prepare($sql)){
     
        $stmt->bind_param("ssssi", $param_username, $param_fullname, $param_email, $param_phone, $param_id);
          // Setting parameters
          $param_fullname = $fullname;
          $param_phone = $phone;
          $param_username = $username;
          $param_email= $email;
          $param_id = $_SESSION["id"];
        
        // Attemptings to execute the prepared statement
        if($stmt->execute()){

            $_SESSION["username"] = $username;     
            $_SESSION["fullname"] =  $fullname;   
            $_SESSION["email"] = $email; 
            $_SESSION["phone"] = $phone; 
            
            header("location: dashboard.php");
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }

        // Closing the statement
        $stmt->close();
    }
}
// Close connection
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
    <title>Profile</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/dashbord-mobile-menu.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="maxw1600 m0a dashboard-bd">
    <div id="wrapper" class="int_main_wraapper">
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <div id="header">
                    <div class="container-fluid">
                        <!-- Left Side Content -->
                        <div class="left-side">
                            <!-- Logo -->
                            <div id="logo">
                            <a href="home.php"><img src="images/rest.png" data-sticky-logo="images/rest.png" alt=""></a>
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
                                    <li><a href="home.php">Home</a></li>
                                    <li><a href="my_rooms.php">My Paid Rooms</a></li>
                                    <li><a href="user_faq.php">FAQ</a></li> 
                                    <li><a href="user_contact.php">Contact</a></li>
    
                                </ul>
                            </nav>
                            <div class="clearfix"></div>
                        </div>
                        <div class="header-user-menu user-menu">
                        <a href="making_payment.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;padding-left:25px;'></i>
                    <span class='badge badge-warning' id='lblCartCount'> 1 </span></a>
                            <div class="header-user-name">
                                <span><img src="images/icons/user.png" alt=""></span>Hi, <?php echo $_SESSION["username"];?>!
                            </div>
                            <ul>
                                <li><a href="user_profile.php"> Edit profile</a></li>
                                <li><a href="log_out.php">Log Out</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
                        <div class="user-profile-box mb-0">
                            <div class="sidebar-header"><img src="images/haven.svg" alt="header-logo2.png"> </div>
                            <div class="header clearfix">
                                <img src="images/icons/icons.png" alt="avatar" class="img-fluid profile-img">
                            </div>
                            <div class="active-user">
                                <h2><?php echo $_SESSION["fullname"];?></h2>
                            </div>
                            <div class="detail clearfix">
                                <ul class="mb-0">
                                    <li>
                                        <a href="dashboard.php">
                                            <i class="fa fa-map-marker"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a class="active" href="user_profile.php">
                                            <i class="fa fa-user"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my_rooms.php">
                                            <i class="fas fa-credit-card" aria-hidden="true"></i>Paid Rooms
                                        </a>
                                    </li>
                                    <li>
                                        <a href="change-password.php">
                                            <i class="fa fa-lock"></i>Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="log_out.php">
                                            <i class="fas fa-sign-out-alt"></i>Log Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">
                       <div class="col-lg-12 mobile-dashbord dashbord">
                            <div class="dashboard_navigationbar dashxl">
                                <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10 mr-2"></i> Dashboard Navigation</button>
                                    <ul id="myDropdown" class="dropdown-content">
                                    <li>
                                        <a href="dashboard.php">
                                            <i class="fa fa-map-marker"></i> Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a class="active" href="user_profile.php">
                                            <i class="fa fa-user"></i>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="my_rooms.php">
                                            <i class="fas fa-credit-card" aria-hidden="true"></i>Paid Rooms
                                        </a>
                                    </li>
                                    <li>
                                        <a href="change-password.php">
                                            <i class="fa fa-lock"></i>Change Password
                                        </a>
                                    </li>
                                    <li>
                                        <a href="log_out.php">
                                            <i class="fas fa-sign-out-alt"></i>Log Out
                                        </a>
                                    </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="widget-boxed-header">
                            <h4>Profile Details</h4>
                        </div>
                        <div class="sidebar-widget author-widget2">
                            <div class="author-box clearfix">
                                <img src="images/icons/icons.png" alt="author-image" class="author__img">
                                <h4 class="author__title"><?php echo $_SESSION['fullname']?></h4>
                            </div>
                            <ul class="author__contact">
                                <li><span class="la la-map-marker"><i class="fa fa-id-card-o"></i></span><?php echo $_SESSION['username']?></li>
                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><span style="color:#007bff"><?php echo $_SESSION["phone"];?></span></li>
                                <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><span style="color:#007bff"><?php echo $_SESSION["email"];?></span></li>
                            </ul>
                            <div class="agent-contact-form-sidebar">
                                <h4>Update Your Information</h4>
                                <form name="contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                <div class="form-group <?php echo (!empty($new_username_err)) ? 'has-error' : ''; ?>">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control"value="<?php echo $_SESSION["username"];?>">
                                    <span class="help-block" style="color:red;"><?php echo $new_username_err; ?></span>
                                        </div>
                                <div class="form-group <?php echo (!empty($new_fullname_err)) ? 'has-error' : ''; ?>">
                                    <label>Full Name</label>
                                    <input type="text" name="fullname" class="form-control"value="<?php echo $_SESSION["fullname"];?>">
                                    <span class="help-block" style="color:red;"><?php echo $new_fullname_err; ?></span>
                                        </div>
                                <div class="form-group <?php echo (!empty($new_email_err)) ? 'has-error' : ''; ?>">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control"value="<?php echo $_SESSION["email"];?>">
                                    <span class="help-block" style="color:red;"><?php echo $new_email_err; ?></span>
                                        </div>
                                <div class="form-group <?php echo (!empty($new_phone_err)) ? 'has-error' : ''; ?>">
                                    <label>Phone</label>
                                    <input type="tel" name="phone" class="form-control"value="<?php echo $_SESSION["phone"];?>">
                                    <span class="help-block" style="color:red;"><?php echo $new_phone_err; ?></span>
                                        </div>
                                    <input type="submit" value="submit" class="multiple-send-message">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/swiper.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick2.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/dashbord-mobile-menu.js"></script>
        <script src="js/forms-2.js"></script>
        <script src="js/color-switcher.js"></script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });

        </script>

    </div>
</body>
</html>
