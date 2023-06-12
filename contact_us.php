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

 $full_name= isset($_SESSION['full_name'])? $_SESSION['full_name']: "";
$email = isset($_SESSION['email'])? $_SESSION['email']: "";
$phone = isset($_SESSION['phone'])? $_SESSION['phone']: "";


?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Contact Us</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- LEAFLET MAP -->
    <link rel="stylesheet" href="css/leaflet.css">
    <link rel="stylesheet" href="css/leaflet-gesture-handling.min.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.css">
    <link rel="stylesheet" href="css/leaflet.markercluster.default.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/css/intlTelInput.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.3/js/intlTelInput.min.js"></script>
</head>

<body class="inner-pages hd-white">
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
                                <li><a href="my_rooms.php">My Paid Rooms</a></li>
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
                                <li><a href="my_rooms.php">My Paid Rooms</a></li>
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
        <!-- Header Container / End -->

        <section class="headings">
            <div class="text-heading text-center">
                <div class="container">
                    <h1>Contact Us</h1>
                    <h2><a href="index.php">Home </a> &nbsp;/&nbsp; Contact Us</h2>
                </div>
            </div>
        </section>
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION CONTACT US -->
        <section class="contact-us">
            <div class="container">
                <div class="property-location mb-5">
                    <h3>Our Location</h3>
                    <div class="divider-fade"></div>
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15878.687488201718!2d-0.2199232!3d5.7602752!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc30b0f51f3b91add!2sAshesi%20University!5e0!3m2!1sen!2sgh!4v1663576907024!5m2!1sen!2sgh" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
      
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h3 class="mb-4">Contact Us</h3>
                        <form class="contact-form" id='contact'>
                        <div class="form-group">
                            <input hidden type="email" class="form-control" id="email" name="email" value="johnmahama65@gmail.com">
                            </div>
                            <div class="form-group">
                            <label>Full Name</label>
                                <input type="text" required class="form-control input-custom input-full" name="full_name"  placeholder="Full name" value='<?php echo $full_name ?>' required>
                            </div>
                            <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $email; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="email must be eg. havenempire@gmail.com" required>
                            </div>
                            <div class="form-group">
                        <label>Phone</label>
                        <input type="tel" class="form-control" name="phone[main]" size='100'placeholder="eg. 548342821" id="phone_number"   oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" required value="<?php echo $phone;?>" >
                    </div>
                            <div class="form-group">
                                <textarea class="form-control textarea-custom input-full" id="message" name="message" required rows="8" placeholder="Message" required></textarea>
                            </div>
                            <button type="submit" name="sendmail" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-4 col-md-12 bgc">
                        <div class="call-info">
                            <h3>Contact Details</h3>
                            <p class="mb-5">Please find below contact details and contact us today!</p>
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p">1 University Ave, Berekuso</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p">+233 548 342 821</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti">a.dramani@aisghana.org</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info cll">
                                        <i class="fa fa-clock-o" aria-hidden="true"></i>
                                        <p class="in-p ti">9:00 a.m - 5:00 p.m</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(document).ready(function () {
    $('#contact').submit(function (event) {
        event.preventDefault();
        Swal.fire({
    title: 'Please wait...',
    html: 'Message sending',
    showConfirmButton: false,
    allowEscapeKey: false,
    allowOutsideClick: false,
    willOpen: () => {
                    Swal.showLoading()
         },
  });
        $.ajax({
            type: 'POST',
            url: 'action/contact.php',
            data: $(this).serialize(),
        })
        .done(function (response) {
          Swal.close();
            Swal.fire("Message Sent", "Thank you for contacting us. We will get back to you soon.", "success");
            $('#contact')[0].reset();
          
        })
        .fail(function (error) {
            Swal.fire("Oops...", "Something went wrong! Please try again later.", "error");
        });
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
        
        <!-- FOOTER -->
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
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/forms.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/leaflet.js"></script>
        <script src="js/leaflet-gesture-handling.min.js"></script>
        <script src="js/leaflet-providers.js"></script>
        <script src="js/leaflet.markercluster.js"></script>
        <script src="js/map-single.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/inner.js"></script>

    </div>
</body>
</html>
