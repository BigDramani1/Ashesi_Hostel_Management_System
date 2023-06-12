<?php
require('controllers/product_controller.php');
session_start();

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hostel_id = $_POST['hostel_id'];
    $user_id = $_POST['user_id'];
    $qty = $_POST['qty'] ?: 1;
  
    // Get an array of selected room numbers with their prices
    $selected_rooms = isset($_POST['room_num']) ? $_POST['room_num'] : [];
  
    // Insert each selected room number as a separate record or update quantity if it exists
    foreach ($selected_rooms as $selected_room) {
      // Split the value into room number and price
      $room_parts = explode('|', $selected_room);
      $room_num = $room_parts[0];
      $room_price = $room_parts[1];
  
      $existed_cart = select_from_cart_room_controller($room_num, $user_id, $hostel_id);
  
      if ($existed_cart) {
        $new_quantity = $existed_cart['qty'] + $qty;
        $new_room = $existed_cart['room_num'];
  
        if ($new_room == $room_num) {
          $update_quant = update_cart_controller($hostel_id, $user_id, $new_quantity, $room_num);
        } else {
          $update = add_to_cart_controller($hostel_id, $user_id, $qty, $room_num, $room_price);
        }
      } else {
        $update = add_to_cart_controller($hostel_id, $user_id, $qty, $room_num, $room_price);
        if (!$update) {
          echo "<script>alert('Error inserting record for room number: $room_num');</script>";
        }
      }
    }
  
    header('Location: cart.php');
  }
  


$hostel = select_one_hostel_controller($_GET['id']);
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

                                                    echo "{$hostel['hostel_name']}";
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


                                                                                            echo "<span style='color:red'>{$hostel['hostel_owner']}</span>";

                                                                                            ?>
                                        <br><span style="color:green">Phone number:</span> <?php

                                                                                            echo "<span style='color:red'>{$hostel['owner_phone']}</span>";

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
                                            <?php
                         $products = select_all_hostels_controller();
                         foreach ($products as $hostel) { ?>
                                                <div class="agents-grid mr-0">
                                                    <div class="listing-item compact">
                                                        <a href="hostel_details.php?id=<?php echo $hostel['hostel_id']?>" class="listing-img-container">
                                                            <div class="listing-img-content">
                                                                <span class="listing-compact-title"><?php echo $hostel['hostel_name']?></span>
                                                                <ul class="listing-hidden-content">
                                                                    <li>Price Range <span>GH₵ <?php echo $hostel['price_range']?></span></li>
                                                                </ul>
                                                            </div>
                                                            <img src="<?php echo $hostel['image']?>" alt="">
                                                        </a>
                                                    </div>
                                                </div>
                                          <?php }  ?>
                                              
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
                    <div class="single homes-content details mb-30 col-md-8">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="bookingForm">
                            <h5 class="mb-4">Choose The Booking Date</h5>
                            <div class="row">
                                <input type='hidden' value='<?php echo $_GET['id'] ?>' name='hostel_id'>
                                <input type='hidden' value='<?php echo $_SESSION['user_id'] ?>' name='user_id'>
                                <div class="col-3">
                                    <label for="txtDate" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="room1" name='room_num[]' value='4 in a room|5000' >
                                        4 in a room - GH₵ 5000
                                    </label>
                                </div>

                                <div class="col-3">
                                    <label for="txtDate" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="room2" name='room_num[]' value='3 in a room|5500'>
                                        3 in a room - GH₵ 5500
                                    </label>
                                </div>

                                <div class="col-3">
                                    <label for="txtDate" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="room3" name='room_num[]' value='2 in a room|6000'>
                                        2 in a room - GH₵ 6000
                                    </label>
                                </div>
                                <div class="col-3">
                                    <label for="txtDate" class="form-check-label">
                                        <input type="checkbox" class="form-check-input" id="room4" name='room_num[]'  value='1 in a room|7000'>
                                        1 in a room - GH₵ 7000
                                    </label>
                                </div>
                            </div>
                            <div class='row'>
                            <?php if(empty($customer_id)){?>
                                    <div class='col' style="margin-top:50px; margin-left:37%;">
                                    <button onclick="window.location.href = 'login.php'" style="background-color: darkblue; border:none; border-radius:6px 6px 6px 6px; color:white;padding: 10px 15px;">Book Now</button>
                                </div><?php } else{?>
                                <div class='col' style="margin-top:50px; margin-left:37%;">
                                    <button type="submit" style="background-color: darkblue; border:none; border-radius:6px 6px 6px 6px; color:white;padding: 10px 15px;">Book Now</button>
                                </div>
                                <?php } ?>
                            </div>
                        </form>
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

        <script>
    document.getElementById('bookingForm').addEventListener('submit', function(event) {
        var checkboxes = document.querySelectorAll('input[name="room_num[]"]');
        var checked = Array.prototype.slice.call(checkboxes).some(function(checkbox) {
            return checkbox.checked;
        });
        if (!checked) {
            event.preventDefault(); // Prevent form submission
            alert('Please select at least one room.');
        }
    });
</script>

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
    document.querySelector('form').addEventListener('submit', function(event) {
    var checkboxes = document.querySelectorAll('input[name="room[]"]');
    var isChecked = false;
    
    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {
            isChecked = true;
            break;
        }
    }
    
    if (!isChecked) {
        event.preventDefault();
        document.getElementById('roomError').textContent = 'Please select at least one option.';
    }
});

</script>

    </div>
</body>

</html>