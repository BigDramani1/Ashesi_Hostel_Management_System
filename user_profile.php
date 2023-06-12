<?php
session_start();
require('controllers/product_controller.php');
$customer_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
// this is for cart counting
$cart_count = cart_count_controller($customer_id);
require "controllers/customer_controller.php";
// Variable are initialize with empty values
$username = $phone  = "";
$new_username_err = $new_phone_err = "";

// Data being processed when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validating the username
    $username = $_POST["username"];
    $full_name = $_POST["full_name"];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $phones = $phone['full'];

    $customer_phone =  select_one_phone_not_user_controller($phones, $email);
    if ($customer_phone != NULL) {
        $new_phone_err = "This phone number is already used";
    }

    $customer_user=select_one_username_not_user_controller($username, $email);
    if ($customer_user != NULL) {
        $new_username_err = "This username is already used.";
    }
    if (empty($new_username_err) && empty($new_phone_err)) {
    $update = update_user_account_controller($full_name, $phones, $username, $email);
    if($update){
            $_SESSION['full_name'] = $full_name;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phones;
    }

}
}
// Initialize the session
if (empty($_SESSION['user_id'])) {
    header('Location: login.php');
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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
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
                                <a href="index.php"><img src="images/rest.png" data-sticky-logo="images/rest.png" alt=""></a>
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
                                    <li><a href="my_rooms.php">My Paid Rooms</a></li>
                                    <li><a href="faq.php">FAQ</a></li>
                                    <li><a href="contact_us.php">Contact</a></li>

                                </ul>
                            </nav>
                            <div class="clearfix"></div>
                        </div>
                        <div class="header-user-menu user-menu">
                        <a href="cart.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;padding-left:25px;'></i>
                    <span class='badge badge-warning' id='lblCartCount'> <?php if(empty($cart_count['counting'])){
                        echo '';
                    } else{
                        echo $cart_count['counting'];
                    }?> </span></a>
                            <div class="header-user-name">
                                <span><img src="images/icons/user.png" alt=""></span>Hi, <?php echo $_SESSION["username"]; ?>!
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
                                <h2><?php echo $_SESSION["full_name"]; ?></h2>
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
                                <h4 class="author__title"><?php echo $_SESSION['full_name'] ?></h4>
                            </div>
                            <ul class="author__contact">
                                <li><span class="la la-map-marker"><i class="fa fa-id-card-o"></i></span><?php echo $_SESSION['username'] ?></li>
                                <li><span class="la la-phone"><i class="fa fa-phone" aria-hidden="true"></i></span><span style="color:#007bff"><?php echo $_SESSION["phone"]; ?></span></li>
                                <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><span style="color:#007bff"><?php echo $_SESSION["email"]; ?></span></li>
                            </ul>
                            <div class="agent-contact-form-sidebar">
                                <h4>Update Your Information</h4>
                                <form name="contact_form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $_SESSION["username"]; ?>">
                                        <span class="help-block" style="color:red;"><?php echo $new_username_err; ?></span>
                                    </div>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" name="full_name" class="form-control" value="<?php echo $_SESSION["full_name"]; ?>" required>
                                       
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control" value="<?php echo $_SESSION["email"]; ?>" readonly>
    
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="tel" class="form-control" name="phone[main]" size='100'placeholder="eg. 548342821" id="phone_number"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"pattern="^\d{9}$" title="Please enter 9 digits." required value="<?php echo $_SESSION["phone"]; ?>" >
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

        <script>
var phone_number = window.intlTelInput(document.querySelector("#phone_number"), {
  separateDialCode: true,
  preferredCountries:["in"],
  hiddenInput: "full",
  utilsScript: "//cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/utils.js"
});

$("form").submit(function() {
  var full_number = phone_number.getNumber(intlTelInputUtils.numberFormat.E164);
$("input[name='phone[full]'").val(full_number)
});
</script>

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