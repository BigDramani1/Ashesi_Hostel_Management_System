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
                        </nav>
                    </div>
                    <div class="header-user-menu user-menu add">
                    <a href="login.php" style="color:#FF385C; text-decoration:none;"><strong>Login &nbsp; &nbsp;</strong></a>
                    <a href="index_cart.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;'></i></a>
                    </div>
            </div>
        </header>
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
                                        <div class="rld-single-input">
                                            <input type="text" placeholder="Enter Keyword...">
                                        </div>
                                        <div class="rld-single-select ml-22">
                                            <select class="select single-select">
                                                <option value="1">Hostel Type</option>
                                                <option value="2">Family House</option>
                                                <option value="3">Apartment</option>
                                            </select>
                                        </div>
                                        <div class="rld-single-select">
                                            <select class="select single-select mr-0">
                                                <option value="1">Bathroom Type</option>
                                                        <option value="2">Bath Tub</option>
                                                        <option value="3">Freestanding Shower</option>
                                                    </select>
                                            </select>
                                        </div>
                                        <div class="rld-single-select ml-3">
                                            <a class="btn btn-yellow" href="#">Search Now</a>
                                        </div>
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
                                    <p class="font-weight-bold mb-0 mt-3">9 Search results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <div class="row featured portfolio-items">
                    <?php require_once ("components/index_components.php");?>
                        <?php
                         require_once('settings/const.php');
                         $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
                         $sql = "SELECT * FROM hostels";
                         $result = mysqli_query($mysqli, $sql);
                        // Associative while loop array
                        while ($row = mysqli_fetch_assoc($result)){
                            index_all($row['hostel_id'], $row['hostel_name'], $row['hostel_owner'],$row['price_range'],$row['image']);
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
