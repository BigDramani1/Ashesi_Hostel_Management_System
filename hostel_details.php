<?php
session_start();
require_once('settings/const.php');
require('settings/connection.php');
if (isset($_GET['hostel_id'])) {
    $hostel_id = $_GET['hostel_id'];
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
    <title>Property Details</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:500,600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="css/leaflet.css">
    <link rel="stylesheet" href="css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/timedropper.css">
    <link rel="stylesheet" href="css/datedropper.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages sin-1 homepage-4 hd-white">
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
                                <li><a href="my_rooms.php">My Paid Rooms</a></li>
                                <li><a href="user_faq.php">FAQ</a></li>
                                <li><a href="user_contact.php">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-user-menu user-menu add">
                        <a href="making_payment.php"><i class='fa fa-shopping-cart fa-2x' style='color:#232936;padding-left:25px;'></i>
                            <span class='badge badge-warning' id='lblCartCount'> 1 </span></a>
                        <div class="header-user-name">
                            <span><img src="images/icons/user.png" alt=""></span>Hi, <?php echo $_SESSION["username"]; ?>!
                        </div>
                        <ul>
                            <li><a href="user_profile.php"> Edit profile</a></li>
                            <li><a href="log_out.php">Log Out</a></li>
                        </ul>
                    </div>
                </div>
        </header>
        <div class="clearfix"></div>
        <!-- START SECTION HOSTELS LISTING -->
        <section class="single-proper blog details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-12 blog-pots">
                        <div class="row">
                            <div class="col-md-12">
                                <section class="headings-2 pt-0">
                                    <div class="pro-wrapper">
                                        <div class="detail-wrapper-body">
                                            <div class="listing-title-bar">
                                                <h3><?php
                                                    require_once('settings/const.php');

                                                    $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
                                                    $sql = "SELECT hostel_name FROM hostels where hostel_id = '$hostel_id';";
                                                    $result = mysqli_query($mysqli, $sql);
                                                    // Associative while loop array
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<h3>{$row['hostel_name']}</h3>";
                                                    }

                                                    ?>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                                <div id="listingDetailsSlider" class="carousel listing-details-sliders slide mb-30">
                                    <h5 class="mb-4">Gallery</h5>
                                    <div class="carousel-inner">
                                        <div class="active item carousel-item" data-slide-number="0">
                                            <img src="images/single-property/s-1.jpg" class="img-fluid" alt="slider-listing">
                                        </div>
                                        <div class="item carousel-item" data-slide-number="1">
                                            <img src="images/single-property/s-2.jpg" class="img-fluid" alt="slider-listing">
                                        </div>
                                        <div class="item carousel-item" data-slide-number="2">
                                            <img src="images/single-property/s-3.jpg" class="img-fluid" alt="slider-listing">
                                        </div>
                                        <div class="item carousel-item" data-slide-number="4">
                                            <img src="images/single-property/s-4.jpg" class="img-fluid" alt="slider-listing">
                                        </div>
                                        <div class="item carousel-item" data-slide-number="5">
                                            <img src="images/single-property/s-5.jpg" class="img-fluid" alt="slider-listing">
                                        </div>

                                        <a class="carousel-control left" href="#listingDetailsSlider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                                        <a class="carousel-control right" href="#listingDetailsSlider" data-slide="next"><i class="fa fa-angle-right"></i></a>

                                    </div>
                                    <ul class="carousel-indicators smail-listing list-inline">
                                        <li class="list-inline-item active">
                                            <a id="carousel-selector-0" class="selected" data-slide-to="0" data-target="#listingDetailsSlider">
                                                <img src="images/single-property/s-1.jpg" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-1" data-slide-to="1" data-target="#listingDetailsSlider">
                                                <img src="images/single-property/s-2.jpg" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-2" data-slide-to="2" data-target="#listingDetailsSlider">
                                                <img src="images/single-property/s-3.jpg" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-3" data-slide-to="3" data-target="#listingDetailsSlider">
                                                <img src="images/single-property/s-4.jpg" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a id="carousel-selector-4" data-slide-to="4" data-target="#listingDetailsSlider">
                                                <img src="images/single-property/s-5.jpg" class="img-fluid" alt="listing-small">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="blog-info details mb-30">
                                    <h5 class="mb-4">Description</h5>
                                    <p class="mb-3">Colombiana Hostel is a fine hostel which most of their rooms are available for
                                        males. It is a quiet place and it is a Family House type of hostel.<br>
                                        <br><span style="color:green">Owner's Name:</span> <?php
                                                                                            require_once('settings/const.php');

                                                                                            $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
                                                                                            $sql = "SELECT hostel_owner FROM hostels where hostel_id = '$hostel_id';";
                                                                                            $result = mysqli_query($mysqli, $sql);
                                                                                            // Associative while loop array
                                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                                                echo "<span style='$hostel_id''color:red'>{$row['hostel_owner']}</span>";
                                                                                            }

                                                                                            ?>
                                        <br><span style="color:green">Phone number:</span> <?php
                                                                                            require_once('settings/const.php');

                                                                                            $sql = "SELECT owner_phone FROM hostels where hostel_id ='$hostel_id';";
                                                                                            $result = mysqli_query($mysqli, $sql);
                                                                                            // Associative while loop array
                                                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                                                echo "<span style='color:red'>{$row['owner_phone']}</span>";
                                                                                            }
                                                                                            ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="single homes-content details mb-30">
                            <h5 class="mb-4">The Service it comes with</h5>
                            <p style="color:black"><i class='fa fa-warning'></i> <strong><em>Bear in mind that all the rooms available are for Male and Females. The hostel an choose not to sell to you and refund you money</em></strong></p>
                            <h5 class="mt-5">Amenities</h5>
                            <ul class="homes-list clearfix">
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>Air Condition</span>
                                </li>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>Cleaners</span>
                                </li>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>Kitchen</span>
                                </li>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>Internet</span>
                                </li>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>Bathroom</span>
                                </li>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>DSTV</span>
                                </li>
                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>Parking</span>
                                </li>

                                <li>
                                    <i class="fa fa-check-square" aria-hidden="true"></i>
                                    <span>Washroom</span>
                                </li>
                            </ul>
                        </div>
                        <!-- Choose Your room-->
                        <div class="single homes-content details mb-30">
                            <h5 class="mb-4">Choose The Booking Date</h5>
                            <div class="row">
                                <div class="col-3">
                                    <input type="checkbox" class="form-control" id="txtDate">4 in a room
                                </div>
                                <div class="col-3">
                                    <input type="checkbox" class="form-control" id="txtDate">3 in a room

                                </div>
                                <div class="col-3">
                                    <input type="checkbox" class="form-control" id="txtDate"> 2 in a room
                                </div>
                                <div class="col-">
                                    <input type="checkbox" class="form-control" id="txtDate"> 1 in a room
                                </div>
                            </div>
                            <div class='row'>
                                <div class='col' style="margin-top:50px; margin-left:37%;">
                                    <button type="submit" style="background-color: darkblue; border:none; border-radius:6px 6px 6px 6px; color:white;padding: 10px 15px;">Book Now</button>
                                </div>
                            </div>

                        </div>
                    </div>
                    <aside class="col-lg-4 col-md-12 car" style="margin-top:100px;">
                        <div class="single widget">
                            <div class="sidebar">
                                <div class="main-search-field-2">

                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header mb-5">
                                            <h4>Feature Properties</h4>
                                        </div>
                                        <div class="widget-boxed-body">
                                            <div class="slick-lancers">
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="properties-details.html" class="listing-img-container">
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">House Luxury <i>New York</i></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Price Range <span>GH₵ 5000-8000</span></li>
                                                                </ul>
                                                            </div>
                                                            <img src="images/feature-properties/fp-1.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="properties-details.html" class="listing-img-container">
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">House Luxury <i>Los Angles</i></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Price Range <span>GH₵ 5000-8000</span></li>
                                                                </ul>
                                                            </div>
                                                            <img src="images/feature-properties/fp-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="properties-details.html" class="listing-img-container">
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">House Luxury <i>San Francisco</i></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Price Range <span>GH₵ 5000-8000</span></li>
                                                                </ul>
                                                            </div>
                                                            <img src="images/feature-properties/fp-3.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="properties-details.html" class="listing-img-container">
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">House Luxury <i>Miami FL</i></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Price Range <span>GH₵ 5000-8000</span></li>
                                                                </ul>
                                                            </div>
                                                            <img src="images/feature-properties/fp-4.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="properties-details.html" class="listing-img-container">
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">House Luxury <i>Chicago IL</i></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Price Range <span>GH₵ 5000-8000</span></li>
                                                                </ul>
                                                            </div>
                                                            <img src="images/feature-properties/fp-5.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="properties-details.html" class="listing-img-container">
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title">House Luxury <i>Toronto CA</i></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Price Range <span>GH₵ 5000-8000</span></li>
                                                                </ul>
                                                            </div>
                                                            <img src="images/feature-properties/fp-6.jpg" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="widget-boxed mt-5">
                                        <div class="widget-boxed-header">
                                            <h4>Ask your questions here!</h4>
                                        </div>
                                        <div id="add-review" class="add-review-box">
                                            <div class="row">
                                                <div class="col-md-12 data">
                                                    <form action="#">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="form-control" placeholder="First Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="text" name="name" class="form-control" placeholder="Last Name" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <input type="email" name="email" class="form-control" placeholder="Email" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 form-group">
                                                            <textarea class="form-control" id="exampleTextarea" rows="8" placeholder="Review" required></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary btn-lg mt-2">Submit Review</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
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

        <!--register form -->
        <div class="login-and-register-form modal">
            <div class="main-overlay"></div>
            <div class="main-register-holder">
                <div class="main-register fl-wrap">
                    <div class="close-reg"><i class="fa fa-times"></i></div>
                    <h3>Welcome to <span>Find<strong>Houses</strong></span></h3>
                    <div id="tabs-container">
                        <ul class="tabs-menu">
                            <li class="current"><a href="#tab-1">Login</a></li>
                            <li><a href="#tab-2">Register</a></li>
                        </ul>
                        <div class="tab">
                            <div id="tab-1" class="tab-contents">
                                <div class="custom-form">
                                    <form method="post" name="registerform">
                                        <label>Username </label>
                                        <input name="email" type="text" onClick="this.select()" value="">
                                        <label>Password</label>
                                        <input name="password" type="password" onClick="this.select()" value="">
                                        <button type="submit" class="log-submit-btn"><span>Log In</span></button>
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="tab">
                                <div id="tab-2" class="tab-contents">
                                    <div class="custom-form">
                                        <form method="post" name="registerform" class="main-register-form" id="main-register-form2">
                                            <label>Username</label>
                                            <input name="name" type="text">
                                            <label>Full Name</label>
                                            <input name="name2" type="text">
                                            <label>Email Address</label>
                                            <input name="email" type="text">
                                            <label>Password</label>
                                            <input name="password" type="password">
                                            <label>Confirm Password</label>
                                            <input name="confirm_password" type="password">
                                            <button type="submit" class="log-submit-btn"><span>Register</span></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/range-slider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick4.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/timedropper.js"></script>
        <script src="js/datedropper.js"></script>
        <script src="js/jqueryadd-count.js"></script>
        <script src="js/leaflet.js"></script>
        <script src="js/leaflet-gesture-handling.min.js"></script>
        <script src="js/leaflet-providers.js"></script>
        <script src="js/leaflet.markercluster.js"></script>
        <script src="js/map-single.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

        <!-- Date Dropper Script-->
        <script>
            $('#reservation-date').dateDropper();
        </script>
        <!-- Time Dropper Script-->
        <script>
            this.$('#reservation-time').timeDropper({
                setCurrentTime: false,
                meridians: true,
                primaryColor: "#e8212a",
                borderColor: "#e8212a",
                minutesInterval: '15'
            });
        </script>

        <script>
            $('.slick-carousel').each(function() {
                var slider = $(this);
                $(this).slick({
                    infinite: true,
                    dots: false,
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0'
                });

                $(this).closest('.slick-slider-area').find('.slick-prev').on("click", function() {
                    slider.slick('slickPrev');
                });
                $(this).closest('.slick-slider-area').find('.slick-next').on("click", function() {
                    slider.slick('slickNext');
                });
            });
        </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(function() {
                var dtToday = new Date();

                var month = dtToday.getMonth() + 1;
                var day = dtToday.getDate();
                var year = dtToday.getFullYear();
                if (month < 10)
                    month = '0' + month.toString();
                if (day < 10)
                    day = '0' + day.toString();

                var minDate = year + '-' + month + '-' + day;

                $('#txtDate').attr('min', minDate);
            });
        </script>


    </div>
</body>

</html>