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
    <title>FAQ'S</title>
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
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages ui-elements hd-white">
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
        </header>
        <div class="clearfix"></div>
        <!-- SECTION HEADINGS -->
        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>FAQ’S</h1>
                    <h2><a href="home.php">Home </a> &nbsp;/&nbsp; FAQ’S</h2>
                </div>
            </div>
        </section>

        <!-- START SECTION FAQ -->
        <section class="faq service-details bg-white">
            <div class="container">
                <h3 class="mb-5">FREQUENTLY ASKED QUESTIONS</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <h5 class="uppercase mb40">Questions about Selling</h5>
                        <ul class="accordion accordion-1 one-open">
                            <li class="active">
                                <div class="title">
                                    <span>What payment methods are available?</span>
                                </div>
                                <div class="content">
                                    <p>
                                       You can use Momo or your credit card. 
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>How can I contact the support team?</span>
                                </div>
                                <div class="content">
                                    <p>
                                    Look at the navigation bar which says "contact" and click on it. You can fill the form and send it to us. We're Here to help
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>Does HavenEmpire share my information with others?</span>
                                </div>
                                <div class="content">
                                    <p>
                                       HavenEmpire does not share any private information with others. Each users privacy is essential to us. We don't tolerate breaking our clients trust. 
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>How would I know that HavenEmpire isn't a scam?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        HavenEmpire works under Ashesi University and it purpose is to provide students a place for them to stay when they start school. If you make any payments, you would receive an email and you can make your claim if you feel like you have been scammed. 
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>Can I pay for multiple Hostels at the same time?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        Yes, you can pay for multiple hostels at the same time. 
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>How long does it take to get a respond after contacting the support team?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        It takes up till 24 hours to get back to you. But if you think it is an emergency call +233 548342821
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>Can I get a refund after making payments?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        A refund will only be granted to within 3 days of your payments. After three days, getting 100% refund will be hard to get. 
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="title">
                                    <span>Why did I get my money back after I paid for my room?</span>
                                </div>
                                <div class="content">
                                    <p>
                                        As started in each page, the hostels are divided between male and females. So if you book and the male/female side is full, your money will be refunded to you
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
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
            $(".accordion li").click(function() {
                $(this).closest(".accordion").hasClass("one-open") ? ($(this).closest(".accordion").find("li").removeClass("active"), $(this).addClass("active")) : $(this).toggleClass("active"), "undefined" != typeof window.mr_parallax && setTimeout(mr_parallax.windowLoad, 500)
            });

        </script>

    </div>
</body>
</html>
