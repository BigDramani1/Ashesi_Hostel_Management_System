<?php
session_start();

require('controllers/product_controller.php');

$customer_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : "";
// this is for cart counting
$cart_count = cart_count_controller($customer_id);

if(empty($customer_id)){
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
    <title>Cart</title>
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
        <div class="clearfix"></div>
         <!-- START SECTION USER PROFILE -->
         <section class="contact-us">
                        <div class="my-properties" style=" margin-left:auto; margin-right:auto;">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <th class="pl-2">Hostel</th>
                                        <th class="p-0"></th>
                                        <th>Price GH₵</th>
                                        <th>Room Type</th>
                                        <th>Number of rooms</th>
                                        <th>Total GH₵</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                $item_price=0;
                         $products = select_cart_for_each_user_controller($customer_id);
                         foreach ($products as $hostel) {
                            $item_price = $item_price + ($hostel["price"] * $hostel["qty"])?>
                                    <tr>
                                        <td class="image myelist">
                                            <a href="hostel_details.php?id=<?php echo $hostel['hostel_id']?>"><img alt="my-properties-3" src="<?php echo $hostel['image']?>" class="img-fluid"></a>
                                        </td>
                                        <td>
                                            <div class="inner">
                                                <a href="hostel_details.php?id=<?php echo $hostel['hostel_id']?>"><h2><?php echo $hostel['hostel_name']?></h2></a>
                                            </div>
                                        </td>
                                        <td><?php echo $hostel['price']?></td>
                                        <td><?php echo $hostel['room_num']?></td>
                                          <td class= "align-middle border-top-0 text-dark ">
                                        <div class="cart-buttons">
                                                <button class="btn btn-primary" onClick="decrement_quantity(<?php echo $hostel["cart_id"]; ?>, '<?php echo $hostel["price"]; ?>')">-</button>
                                                <input type="text" step= "1" value=<?php echo $hostel['qty']?> class="quantity-input" id="input-quantity-<?php echo $hostel['cart_id']?>" readonly style=' width: 50px; text-align: center; font-size: 14px; border: 1px solid #ced4da; border-radius: 0.25rem; padding: 0.375rem 0.75rem;line-height: 1.5;'>
                                                <button class="btn btn-primary" onClick="increment_quantity(<?php echo $hostel["cart_id"]; ?>, '<?php echo $hostel["price"]; ?>')">+</button>
                                            </div>
                                     <input type='hidden' name='user_id' id='user_id' value= "<?php echo $_SESSION['user_id']?>">
                    </td>
                    <form id='remove-<?php echo $hostel["cart_id"];?>'>
                                     <input type='hidden' name='user_id' id= 'user_id' value= "<?php echo $_SESSION['user_id']?>">
										<input type='hidden' name='cart_id' id= 'cart_id'value= "<?php echo $hostel["cart_id"]?>">
                                        <td id="cart-price-<?php echo $hostel["cart_id"]?>"><?php echo $hostel['price'] * $hostel['qty']?></td>
                                        <td><button type='submit' name='delete' style='border:none; background:none'><i class='fa fa-trash fa-lg' style='color:red'></i></button></td>
										</form>
                                    </tr>
                                    <?php } if(empty($products)){
                                        echo '<h3>Cart is empty</h3>';
                                    }?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td style="color:black; font-size:18px; font-weight:bold">Subtotal</td>
                                        <td style="color:black; font-size:20px; font-weight:bold" id="total-price">GH₵ <?php echo $item_price ?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <form id='paymentForms'>
									<input type='hidden' id='email'value='<?php echo $_SESSION['email']; ?>'>
									<input type='hidden' id='amount'value='<?php echo $item_price ?>'>
                                    <?php if(!empty($item_price)){?>
                                                  <td> <button type="submit" onclick="payWithPaystack()" style="background-color: green; border:none; border-radius:6px 6px 6px 6px; color:white;padding: 10px 15px;  ">Make Payment</button></td>
                                       <?php } ?>
                                        </form>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
                
                <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
function increment_quantity(cart_id, price) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
        var newQuantity = parseInt($(inputQuantityElement).val())+1;
        var Prices = newQuantity * price;
        var newPrice= Math.round((Prices + Number.EPSILON) * 100) / 100;
        $(inputQuantityElement).val(newQuantity);
        $("#cart-price-"+cart_id).text(newPrice);
        save_to_db(cart_id, newQuantity, newPrice);
}

function decrement_quantity(cart_id, price) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
        if($(inputQuantityElement).val() > 1) 
        {
            var newQuantity = parseInt($(inputQuantityElement).val()) - 1;
            var Prices = newQuantity * price;
            var newPrice= Math.round((Prices + Number.EPSILON) * 100) / 100;
            $(inputQuantityElement).val(newQuantity);
            $("#cart-price-"+cart_id).text(newPrice);
            save_to_db(cart_id, newQuantity, newPrice);
            
        }
    }

function save_to_db(cart_id, new_quantity, newPrice) {
	var inputQuantityElement = $("#input-quantity-"+cart_id);
	var priceElement = $("#cart-price-"+cart_id);
  var user_id = $("#user_id").val();
    $.ajax({
		url : "action/add_to_cart.php",
		data : "cart_id="+cart_id+"&new_quantity="+new_quantity+"&user_id="+user_id,
		type : 'post',
    dataType:"JSON",
		success : function(data) {
			     $(inputQuantityElement).val(new_quantity);
            $(priceElement).text(newPrice);
            $("#total-price").text("GH₵ " + data.data.Amount);
            var amountElement = document.getElementById("amount");
            var subtotalElement = document.getElementById("total-price");
    var subtotal = parseFloat(subtotalElement.innerHTML.replace("GH₵ ", ""));
            amountElement.value =  subtotal;
		}
	});
}


</script>
<script>
  $(document).ready(function () {
    $('form[id^="remove-"]').submit(function (event) {
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'action/delete_from_cart.php',
            dataType: 'json',
            data: $(this).serialize(),
            success: function(response) {
            if (response.success) {
                // Show success sweet alert
                Swal.fire('Success!', response.message, 'success').then((result) => {
              // Reload the Page
              location.reload();
            });
            } else{
              Swal.fire('Error!', response.message, 'error');
            }
        },
        error: function() {
            // Show error sweet alert
            Swal.fire({
                title: 'Oops!',
                text: 'Something went wrong, please try again later',
                icon: 'error',
              });
        }
      });
    });
});

</script>
<script src="https://js.paystack.co/v1/inline.js"></script> 
<script>
  const paymentForm = document.getElementById('paymentForms');
  paymentForm.addEventListener("submit", payWithPaystack, false);

  // PAYMENT FUNCTION
  function payWithPaystack(e) {
	e.preventDefault();
	let handler = PaystackPop.setup({
		key: 'pk_test_9a66f0be5bdc776def0d8776416b637dc1060720', // Replace with your public key
		email: document.getElementById("email").value,
		amount: document.getElementById("amount").value * 100,
        currency:'GHS',
		onClose: function(){
      Swal.fire({
         title: 'Cancellation!',
         text: 'You are choosing to stop placing your order!',
         icon: 'warning',
         button: 'OK'
     })
		},
		callback: function(response){
			window.location = `action/process_payment.php?email=${document.getElementById("email").value}&amount=${document.getElementById("amount").value}&reference=${response.reference}`
            Swal.fire({
                title: 'Please Wait !',
                html: 'Payment processing',// add html attribute if you want or remove
                allowOutsideClick: false,
                showConfirmButton: false,
                willOpen: () => {
                    Swal.showLoading()
                },
            });
		}
	});
	handler.openIframe();
}
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
