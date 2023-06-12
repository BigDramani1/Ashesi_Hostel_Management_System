<?php
session_start();
require('controllers/product_controller.php');
if (empty($_SESSION['user_id'])) {
    $link = "login.php";
    $cart = "index_cart.php";
} else {
    $link = "dashboard.php";
    $cart = "cart.php";
}
$customer_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
// this is for cart counting
 $cart_count = cart_count_controller($customer_id);
$hostel_count=count_all_hostels_controller();

?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>All hostels</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
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
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages st-1 agents hp-6 full hd-white">
<?php if (empty($customer_id)) { ?>
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
                                    <li><a href="login.php">My Favorites</a></li>
                                    <li><a href="faq.php">FAQ</a></li> 
                                    <li><a href="contact_us.php">Contact</a></li>

                            </ul>
                    </div>
                    <div class="header-user-menu user-menu add">
                    <a href="login.php" style="color:#FF385C; text-decoration:none;"><strong>Login &nbsp; &nbsp;</strong></a>
                    <a href="index_cart.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;'></i></a>
                    </div>
            </div>
        </header>
    </div>
    <?php } else{ ?>
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
                                    <li><a href="login.php">My Favorites</a></li>
                                    <li><a href="faq.php">FAQ</a></li> 
                                    <li><a href="contact_us.php">Contact</a></li>

                            </ul>
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
        <!-- START SECTION PROPERTIES LISTING -->
        <section class="properties-list featured portfolio blog">
            <div class="container">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span>Hostels</span></p>
                                </div>
                                <h3>All Hostels</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->
                <div class="col-12 px-0 parallax-searchs">
                    <div class="banner-search-wrap">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs_1">
                                <div class="rld-main-search">
                                    <div class="row">
                                    <div class="col-12">
                                    <form action="search.php" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="search" value="<?php if (isset($_GET['search'])) {
                                                                                        echo $_GET['search'];
                                                                                    } ?>" style="border-radius:10px; height:auto;" class="form-control" placeholder="Search here.....">&nbsp;
                                            <button type="submit" class="searching">Search</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="headings-2 pt-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="font-weight-bold mb-0 mt-3"><?php echo $hostel_count?> Search results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row featured portfolio-items">
                        <?php
                         $products = select_all_hostels_controller();
                         foreach ($products as $hostel) {
                         echo"
                         <div class=\"item col-lg-4 col-md-6 col-xs-12 people rent\">
                        <div class=\"project-single\" data-aos=\"fade-up\">
                            <div class=\"project-inner project-head\">
                                <div class=\"project-bottom\">
                                <input type='hidden' name='room_id' value='{$hostel['hostel_id']}'>
                                    <h4><a href=\"hostel_details.php?id={$hostel['hostel_id']}p\">View Property</a><span class=\"category\">Real Estate</span></h4>
                                </div>
                                <div class=\"homes\">
                                    <a href=\"hostel_details.php?id={$hostel['hostel_id']}\" class=\"homes-img\">
                                        <img src=\"{$hostel['image']}\" alt=\"home-1\" class=\"img-responsive\">
                                    </a>
                                </div>
                                <div class=\"button-effect\">
                                    <a href=\"hostel_details.php?id={$hostel['hostel_id']}\" class=\"img-poppu btn\"><i class=\"fa fa-photo\"></i></a>
                                </div>
                            </div>
                            <div class=\"homes-content\">
                                <h3><a href=\"hostel_details.php?id={$hostel['hostel_id']}\">{$hostel['hostel_name']}</a></h3>
                                <p class=\"homes-address mb-3\">
                                    <a href=\"hostel_details.php?id={$hostel['hostel_id']}\">
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
                                <!-- Price -->
                                <div class=\"price-properties\">
                                    <h3 class=\"title mt-3\">
                                <a href=\"hostel_details.php?id={$hostel['hostel_id']}\">GH₵ {$hostel['price_range']}</a>
                                </h3>
                                </div>
                                <div class=\"footer\">
                                    <a href=\"hostel_details.php?id={$hostel['hostel_id']}p\">
                                        <i class=\"fa fa-user\"></i> {$hostel['hostel_owner']}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>";
                }
                        ?>  
                </div>
            </div>
        </section>
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
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos2.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/light.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/inner.js"></script>
        <script src="js/color-switcher.js"></script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

            });

        </script>
        <script>

$(".heart.fa").click(function() {
$(this).toggleClass("fa-heart fa-heart-o");
});
</script>


    </div>
</body>
</html>
