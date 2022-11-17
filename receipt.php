<!doctype html>
<html lang="zxx">
<head>
    <title>Book your room</title>
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
        <a href="javascript:window.print()" class="print-button">Print receipt</a>
        <a href="index.php" class="print-button" style="background-color:darkgreen">Done</a>
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
                                <p class="font-weight-bold mb-1">Payment #550</p>
                                <p class="text-muted">Date: 4 Jan, 2020</p>
                            </div>
                        </div>

                        <hr class="my-5">

                        <div class="row pb-5 p-5 the-five">
                            <div class="col-md-6">
                                <h3 class="font-weight-bold mb-4">Payment Made To</h3>
                                <p class="mb-0">Name:<span class="text-muted">Carlos Johnson</span></p>
                                <p class="mb-0">Hostel:<span class="text-muted">Colombiana Hostel</span></p>
                            </div>

                            <div class="col-md-6 text-right">
                                <h3 class="font-weight-bold mb-4">Payment Details</h3>
                                <p class="mb-1">Name:<span class="text-muted">James Brown</span></p>
                                <p class="mb-1">Payment Type:<span class="text-muted">Momo</span></p>
                            </div>
                        </div>

                        <div class="row p-5 the-five">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-0 text-uppercase small font-weight-bold">Order #</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Type of Room</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Number of Rooms Purchased</th>
                                            <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>3 in a room</td>
                                            <td>1</td>
                                            <td>GH₵ 5000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                            <div class="py-3 px-5 text-left">
                                <div class="mb-2">Grand Total</div>
                                <div class="h2 font-weight-light">GH₵ 5000</div>
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