<?php
session_start();

// Check if the user is already logged in, then redirect the person  to home page
if(isset($_SESSION["user_id"])){
    header("location:index.php");
    exit;
}
$phones='';
// Including a config file
require_once "settings/connection.php";
require "controllers/customer_controller.php";
 
// Variables are initialized with empty values
$username = $full_name = $phone = $email = $password = $confirm_password = "";
$username_err = $full_name_err = $phone_err =  $email_err = $password_err = $confirm_password_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validating the username
    $username = $_POST['username'];
    $password = $_POST["password"];
    $confirm_password = $_POST["confirm_password"];
    $full_name = $_POST["full_name"];
    $phone = $_POST["phone"];
    $phones= $phone['full'];
    $email = $_POST["email"];

    if (strlen($password) < 6) {
        $password_err = "Password must have at least 6 characters.";
    }

    if ($password !== $confirm_password) {
        $confirm_password_err = "Passwords did not match.";
        $password_err = "Passwords did not match.";
    }

    if (empty($password_err) && empty($confirm_password_err)) {
        // Hashing the password
        $password = password_hash($password, PASSWORD_BCRYPT);

        $customer = select_one_username_controller($username);
        if ($customer !== NULL) {
            $username_err = "The username you entered already exists!";
        }

        $customer_email = select_one_user_email_controller($email);
        if ($customer_email !== NULL) {
            $email_err = "The email entered already exists!";
        }

        $phone_check = select_one_phone_controller($phones);
        if ($phone_check !== NULL) {
            $phone_err = "The phone number you entered already exists!";
        }

        if (empty($username_err) && empty($phone_err)) {
            $add = add_user_controller($username, $password, $full_name, $email, $phones);
            if ($add) {
                header("Location: login.php");
                exit;
            } else {
                echo "Something went wrong. Please try again.";
            }
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
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
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" id="txtNoSpaces" value="<?php echo $username; ?>" required max='8'>
                        <span class="help-block"  style="color:red;"><?php echo $username_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" class="form-control" name="full_name" value="<?php echo $full_name; ?>" required>
                        <span class="help-block" style="color:red;"><?php echo $full_name_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-control" name="phone[main]" size='100'placeholder="eg. 548342821" id="phone_number"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');"pattern="^\d{9}$" title="Please enter 9 digits." required value="<?php echo $phones;?>" >
                        <span class="help-block" style="color:red;"><?php echo $phone_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="email must be eg. havenempire@gmail.com" required>
                        <span class="help-block" style="color:red;"><?php echo $email_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" required>
                        <span class="help-block" style="color:red;"><?php echo $password_err; ?></span>
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" name="confirm_password" required>
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

    </div>
</body>
</html>
