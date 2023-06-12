<?php
session_start();
require('controllers/product_controller.php');
$searching = search_hostel_controllers($_GET['search']);

$customer_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
// this is for cart counting
$cart_count = cart_count_controller($customer_id);
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Haven Empire</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/aos2.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/maps.css">
    <link rel="stylesheet" id="color" href="css/colors/pink.css">
</head>

<body class="homepage-9 hp-6 homepage-1 mh">
<?php if (empty($customer_id)) { ?>
    <div id="wrapper">
        <header id="header-container" class="header head-tr">
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <div class="left-side">
                        <div id="logo">
                            <a href="index.php"><img src="images/Home.png" data-sticky-logo="images/rest.png" alt=""></a>
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
                            <nav id="navigation" class="style-1 head-tr">
                                <ul id="responsive">
                                    <li><a href="index.php">Home</a></li>
                                    <li><a href="login.php">My Paid Rooms</a></li>
                                    <li><a href="faq.php">FAQ</a></li>
                                    <li><a href="contact_us.php">Contact</a></li>
                                </ul>
                            </nav>
                    </div>
                    <div class="header-user-menu user-menu add">
                        <div class="header-widget sign-in">
                            <a href="<?php echo $link; ?>" style="text-decoration:none;"><strong>Login &nbsp; &nbsp;</strong></a>
                            <a href="<?php echo $cart; ?>"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;'></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </div>
    <?php } else{ ?>
        <div id="wrapper">
        <header id="header-container" class="header head-tr">
            <div id="header" class="head-tr bottom">
                <div class="container container-header">
                    <div class="left-side">
                        <div id="logo">
                            <a href="index.php"><img src="images/Home.png" data-sticky-logo="images/rest.png" alt=""></a>
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
                        <nav id="navigation" class="style-1 head-tr">
                            <ul id="responsive">
                                <li><a href="index.php">Home</a></li>
                                <li><a href="my_rooms.php">My Paid Rooms</a></li>
                                    <li><a href="faq.php">FAQ</a></li> 
                                    <li><a href="contact_us.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-user-menu user-menu add">
                    <a href="cart.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;padding-left:25px;'></i>
                    <span class='badge badge-warning' id='lblCartCount'> <?php if(empty($cart_count['counting'])){
                        echo '';
                    } else{
                        echo $cart_count['counting'];
                    }?> </span></a>
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
    </div>
    <?php } ?>
        <div class="clearfix"></div>
        <!-- STAR HEADER SEARCH -->
        <section id="hero-area" class="parallax-searchs home15 overlay thome-6 thome-1" data-stellar-background-ratio="0.5">
            <div class="hero-main">
                <div class="container" data-aos="zoom-in">
                    <div class="row">
                        <div class="col-12">
                            <div class="hero-inner">
                                <div class="welcome-text">
                                    <h1 class="h1">More than a
                                    <br class="d-md-none">
                                    <span class="typed border-bottom"></span>
                                </h1>
                                    <p class="mt-4">We Have Outstanding & Appealing Hostels For You.</p>
                                </div>
                                <div class="col-12">
                                <form action="" method="GET">
                            <div class="input-group mb-3">
                                <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" style="border-radius:10px; height:auto;"class="form-control" placeholder="Search data">&nbsp;
                                <button type="submit" class="searching">Search</button>
                            </div>
                        </form>
                                    </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        </section>
        <!-- START SECTION POPULAR PLACES -->
        <section class="feature-categories bg-white rec-pro">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>Welcome To </span>Ashesi Off-Campus Hostels</h2>
                </div>
            </div>
        </section>
        <!-- START SECTION FEATURED PROPERTIES -->
        <section class="featured portfolio bg-white-2 rec-pro full-l">
            <div class="container-fluid">
                <div class="sec-title">
                    <h2><span>All </span>Hostels</h2>
                    <p>These are all the hostels around the school</p>
                </div>
                <div class="row portfolio-items">
                        <?php
                       foreach($searching as $items)
                       {
                           echo "
                           <div class=\"item col-xl-6 col-lg-12 col-md-12 col-xs-12 landscapes sale\">
                        <div class=\"project-single\" data-aos=\"fade-up\">
                        <div class=\"project-inner project-head\">
                        <div class=\"project-bottom\">
                        <input type='hidden' name='room_id' value='{$items['hostel_id']}'>
                        <h4><a href=\"hostel_details.php?id={$items['hostel_id']}\">View Property</a></h4>
                        </div>
                        <div class=\"homes\">
                        <a href=\"hostel_details.php?id={$items['hostel_id']}\" class=\"homes-img\">
                        <img src=\"{$items['image']}\" alt=\"home-1\" class=\"img-responsive\">
                        </a>
                        </div>
                        <div class=\"button-effect\">
                        <a href=\"hostel_details.php?id={$items['hostel_id']}\" class=\"img-poppu btn\"><i class=\"fa fa-photo\"></i></a>
                        </div>
                        </div>
                        <div class=\"homes-content\">
                        <h3><a href=\"hostel_details.php?id={$items['hostel_id']}\">{$items['hostel_name']}</a></h3>
                        <p class=\"homes-address mb-3\">
                        <a href=\"hostel_details.php?id={$items['hostel_id']}\">
                        <i class=\"fa fa-map-marker\"></i><span>1 University Avenue, Berekuso</span>
                        </a>
                        </p>
                        <ul class=\"homes-list clearfix pb-3\">
                        <li class=\"the-icons\">
                        <i class=\"fa fa-bed mr-2\" aria-hidden=\"true\"></i>
                        <span>Bedrooms</span>
                        </li>
                        <li class=\"the-icons\">
                        <i class=\"fa fa-bath mr-2\" aria-hidden=\"true\"></i>
                        <span>Bathrooms</span>
                        </li>
                        <li class=\"the-icons\">
                        <i class=\"fa fa-lock mr-2\" aria-hidden=\"true\"></i>
                        <span>Security</span>
                        </li>
                        <li class=\"the-icons\">
                        <i class=\"fa fa-car mr-2\" aria-hidden=\"true\"></i>
                        <span>Car park</span>
                        </li>
                        </ul>
                        <div class=\"price-properties footer pt-3 pb-0\">
                        <h3 class=\"title mt-3\">
                        <a href=\"hostel_details.php?id={$items['hostel_id']}\">GH₵ {$items['price_range']}</a>
                        </h3>
                        </div>
                        </div>
                        </div>
                        </div>
                           ";
                   }if(empty($searching)){
                       ?>
                           <h2 style="padding-bottom:100px; text-align:center;"> &nbsp; Sorry we couldn't find what you were looking for! 😔😔😔</h2>
                        <?php } ?>
                </div>
                    
                </div>
            </div>
        </section>      
        <footer class="first-footer" style="margin-top:100px;">
            <div class="second-footer">
                <div class="container">
                    <p>2022 © Copyright - All Rights Reserved.</p>
                    <p>Made By <a href="mailto:alhassan.dramani@ashesi.edu.gh">Dramani Alhassan </a></p>
                </div>
            </div>
        </footer>
        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos2.js"></script>
        <script src="js/animate.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/typed.min.js"></script>
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
        <script src="js/forms-2.js"></script>
        <script src="js/map-style2.js"></script>
        <script src="js/range.js"></script>
        <script src="js/color-switcher.js"></script>
        <script>
            $(window).on('scroll load', function() {
                $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
            });

        </script>

        <!-- Slider Revolution scripts -->
        <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

        <script>
            var typed = new Typed('.typed', {
                strings: ["Hostel ^2000", "Home ^4000"],
                smartBackspace: false,
                loop: true,
                showCursor: true,
                cursorChar: "|",
                typeSpeed: 50,
                backSpeed: 30,
                startDelay: 800
            });

        </script>

        <script>
            $('.slick-lancers').slick({
                infinite: false,
                slidesToShow: 4,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                adaptiveHeight: true,
                responsive: [{
                    breakpoint: 1292,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 993,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2,
                        dots: true,
                        arrows: false
                    }
                }, {
                    breakpoint: 769,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: true,
                        arrows: false
                    }
                }]
            });

        </script>

        <script>
            $('.job_clientSlide').owlCarousel({
                items: 2,
                loop: true,
                margin: 30,
                autoplay: false,
                nav: true,
                smartSpeed: 1000,
                slideSpeed: 1000,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    991: {
                        items: 3
                    }
                }
            });

        </script>

        <script>
            $('.style2').owlCarousel({
                loop: true,
                margin: 0,
                dots: false,
                autoWidth: false,
                autoplay: true,
                autoplayTimeout: 5000,
                responsive: {
                    0: {
                        items: 2,
                        margin: 20
                    },
                    400: {
                        items: 2,
                        margin: 20
                    },
                    500: {
                        items: 3,
                        margin: 20
                    },
                    768: {
                        items: 4,
                        margin: 20
                    },
                    992: {
                        items: 5,
                        margin: 20
                    },
                    1000: {
                        items: 7,
                        margin: 20
                    }
                }
            });

        </script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>
        <!-- MAIN JS -->
        <script src="js/script.js"></script>
        <script>

            $(".heart.fa").click(function() {
            $(this).toggleClass("fa-heart fa-heart-o");
            });
        </script>

    </div>
</body>
</html>