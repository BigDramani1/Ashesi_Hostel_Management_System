<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
<title>Book your room</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- FAVICON -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700&amp;display=swap" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/invoice.css">

</head>

<body class="inner-pages hd-white">
    <div id="wrapper">
        <!-- START SECTION CONTACT US -->
        <section class="contact-us">
            <div class="container">
                <?php 
		if(isset($_POST['sendmail'])) {
			require 'PHPMailerAutoload.php';
			require 'credential.php';

			$mail = new PHPMailer;
            
			$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;    
			$mail->SMTPDebug  = SMTP::DEBUG_OFF;                                // TCP port to connect to

			$mail->setFrom(EMAIL, 'HavenEmpire');
			$mail->addAddress($_POST['email']);     // Add a recipient

			$mail->addReplyTo(EMAIL);
		
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = "Ashesi's Off-Campus Room";
			$mail->Body    = "<div class=\"headings\" style=\"text-align:center;
            width: 75%;
            min-width: 400px;
            padding: 35px 50px;
            transform: translate(-50%,-50%);
            position: relative;
            left: 50%;
            top: 350px;
            border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">
            <h1>Thank You For Your Purchased</h1>
            <p style=\"font-size:18px; line-height:1.5\"><em><strong>Please save this email for your records.
            <br>Check your purchase status at any time by logging in to your HavenEmpire Account and going into your dashboard!
            <br>Have a Question? We're here to <a href=\"contact.php\">help 24/7</a></em></strong></p>
        </div>
       
        
        <div class=\"cardings\" style=\"background:linear-gradient(to bottom, #edfaff 78%, #232936 14%); 
        width: 75%;
        min-width: 400px;
        padding: 35px 50px;
        transform: translate(-50%,-50%);
        position: relative;
        left: 50%;
        top: 350px;
        border-radius: 10px;
        -webkit-border-radius: 10px;
        -moz-border-radius: 10px;
        box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);\">
        <div class=\"top\">
            <img src=\"https://drive.google.com/uc?export=view&id=1b_gX7_f8N1Cgz7w1mK7UqL7251oHH_wU\" width=\"80\" style=\"float:left\">
            <p style=\"float:right\"><strong>&nbsp;&nbsp;Payment #550</strong><br>Date: 4 Jan, 2020</p>
        </div>
        <div class=\"line\"  style=\"position: relative;
        display: -ms-flexbox;
        display: flex;
        -ms-flex-direction: column;
        flex-direction: column;
        margin-top:100px;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid rgba(0,0,0,.125);
        border-radius: 0.25rem;\">
                    </div>
    <div class=\"another\" style=\"float:left; line-height:1.5; margin-top:30px;\">
        <h2>Payment Made To</h2><br>Name:<strong>Carlos Johnson</strong><br>Hostel: <strong>Colombiana Hostel</strong>
    </div>
    <div class=\"anothers\" style=\"text-align:right; line-height:1.5; margin-top:30px;\">
        <h2>Payment Details</h2><br>Name: <strong>James Brown</strong><br>Payment Type: <strong>Momo</strong>
    </div>
    <div class=\"rest\" style=\"margin-top:100px;\">
        <table style=\"width:100%;
        border-spacing: 20px;\">
            <tr>
                <th>Order #</th>
                <th>Type of Room</th>
                <th>Number of Rooms Purchased</th>
                <th>Total</th>
            </tr>
            <tr>
                <td style=\"padding-left:35px;\"> 1</td>
                <td style=\"padding-left:50px;\">3 in a room</td>
                <td style=\"padding-left:70px;\">1</td>
                <td style=\"padding-left:50px;\">GH₵ 5000</td>
            </tr>
        </table>
        </div>
        <div class=\"last\">
            <p style=\"text-align:right; Color:white; font-size: 30px; \">GH₵ 5000</p>
        </div>
    </div>
            ";
    
			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
                echo "<script> location.href='testing.php'; </script>";
			}
		}
	 ?>
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <h3 class="mb-4">Button sends Email receipt when payment is done</h3>
                        <form class="contact-form" method="post" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input hidden type="email" class="form-control" id="email" name="email" value="johnmahama65@gmail.com">
                            </div>
                            <button type="submit" name="sendmail" class="btn btn-primary btn-lg">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        

  
</body>
</html>
