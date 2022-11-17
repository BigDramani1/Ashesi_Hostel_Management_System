<?php
session_start();
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
                            <a href="home.php"><img src="images/rest.png" alt=""></a>
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
                                    <li><a href="my_favorites.php">My Favorites</a></li>
                                    <li><a href="user_faq.php">FAQ</a></li> 
                                    <li><a href="user_contact.php">Contact</a></li>

                            </ul>
                    </div>
                    <div class="header-user-menu user-menu add">
                    <a href="making_payment.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936; padding-left:25px; '></i></a>
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
        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Customer Service</h1>
                    <h3><a href="home.php" style="color:white; text-shadow:0.3px 0.3px #007bff; text-decoration:none">Go Home</a></h3>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

       <p style="text-align:center; font-size:32px; padding:70px; line-height:2"> Thank you for reaching us, we will get back to you as soon as possible. <br> If you think it is very urgent, you can reach our customer service through this number <br> <font color="#007bff">+233 548342821</font>
       </p>

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
