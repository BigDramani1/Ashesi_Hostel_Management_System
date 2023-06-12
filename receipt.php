<?php 
session_start();
require('controllers/product_controller.php');
$invoice_num = $_GET['invoice_num'];
$user_id = $_SESSION['user_id'];

$test= select_all_from_invoice_num_controller($user_id, $invoice_num);
if(empty($invoice_num) || $test == NULL ){
  header("Location: 404error.php");
}
$amount=total_amount_for_invoice_controller($user_id, $invoice_num);
$date=select_one_date_invoice_num_controller($user_id, $invoice_num);
?>
<!doctype html>
<html lang="zxx">
<head>
    <title>Payment Receipt</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700&amp;display=swap" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/invoice.css">
    <!-- STYLES CSS -->
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <div class="print-button-container">
        <a href="my_rooms.php" class="print-button" style="background-color:darkgreen">Go to Dashboard</a>
    </div>
    <div class="container invoice mb-0">
        <div class="row">
            <div class="col-12">
                <div class="card border-0">
                    <div class="card-body p-0">
                        <div class="row p-5 the-five">
                            <div class="col-md-6">
                                <img src="images/rest.png" width="80" alt="Logo">
                            </div>

                            <div class="col-md-6 text-right">
                                <p class="font-weight-bold mb-1">Payment #<?php echo $invoice_num ?></p>
                                <p class="text-muted">Date: <?php echo $date['order_date']?></p>
                            </div>
                        </div>

                        <hr class="my-5" >

                        <div class="row pb-5 p-5 the-five">
                            <div class="col-md-6">
                                <h3 class="font-weight-bold mb-4">Payment Made To</h3>
                                <p class="mb-0">Name:<span class="text-muted"> HavenEmpire</span></p>
                                <p class="mb-0">Location:<span class="text-muted"> Ashesi University</span></p>
                            </div>

                            <div class="col-md-6 text-right">
                                <h3 class="font-weight-bold mb-4">Payment Details</h3>
                                <p class="mb-1">Name:<span class="text-muted"><?php echo $_SESSION['full_name'] ?></span></p>
                                <p class="mb-1">Email:<span class="text-muted"><?php echo $_SESSION['email'] ?></span></p>
                            </div>
                        </div>

                        <div class="row p-5 the-five">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">Hostel Name</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Price GH₵</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Room Type</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                    $products = select_all_from_invoice_num_controller($user_id, $invoice_num);
                              foreach ($products as $hostel) {?>
                                        <tr>
                                            <td><?php echo $hostel['hostel_name']?></td>
                                            <td><?php echo $hostel['price']?></td>
                                            <td><?php echo $hostel['room_num']?></td>
                                            <td><?php echo $hostel['qty']?></td>
                                            <td><?php echo $hostel['total']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-left">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">GH₵ <?php echo $amount['Amount']?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JQUERY JS -->
    <script src="js/jquery-3.5.1.min.js"></script>

</body>
</html>