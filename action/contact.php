<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__.'/phpmailer/src/Exception.php';
require __DIR__.'/phpmailer/src/PHPMailer.php';
require __DIR__.'/phpmailer/src/SMTP.php';
 
$full_name =$_POST['full_name'];
$email = $_POST['email'];
$mes = $_POST['message'];
$phone = $_POST['phone'];
$phones = $phone['full'];


$from = $email;
$to = 'a.dramani@aisghana.org'; //replace this with your email 
$subject = "User Request for HavenEmpire";
$msg = <<<EOT
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
body {
    background: #eee;
    margin-top: 20px;
}
.text-danger strong {
    color: #9f181c;
}
.receipt-main {
    background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #f5f6ff;
        border-top: 12px solid #f5f6ff;
        max-width: 600px;
margin: 0 auto;
padding: 40px 30px !important;
box-shadow: 0 1px 21px #acacac;
color: #333333;
font-family: open sans;

}
.receipt-main p {
    color: #333333;
    font-family: open sans;
    line-height: 1.42857;
}
.receipt-footer h1 {
    font-size: 15px;
    font-weight: 400 !important;
    margin: 0 !important;
}
.receipt-main thead {
    background: #f5f6ff none repeat scroll 0 0;
}
.receipt-main thead th {
    color: #fff;
}
.receipt-right h5 {
    font-size: 16px;
    font-weight: bold;
    color: Black;
    margin: 0 0 7px 0;
}
.receipt-right p {
    font-size: 12px;
    margin: 0px;
}
.receipt-right p i {
    text-align: center;
    width: 18px;
}
.receipt-main td {
    padding: 9px 20px !important;
}
.receipt-main th {
    padding: 13px 20px !important;
}
.receipt-main td {
    font-size: 13px;
    font-weight: initial !important;
}
.receipt-main td p:last-child {
    margin: 0;
    padding: 0;
}
.receipt-main td h2 {
    font-size: 20px;
    font-weight: 900;
    margin: 0;
    text-transform: uppercase;
}
.receipt-header-mid .receipt-left h1 {
    font-weight: 100;
    margin: 34px 0 0;
    text-align: right;
    text-transform: uppercase;
}
.receipt-header-mid {
    margin: 24px 0;
    overflow: hidden;
}
#container {
    background-color: #dcdcdc;
}
@media screen and (max-width: 767px) {
    .receipt-main {
        margin-top: 20px;
        margin-bottom: 20px;
        padding: 20px 10px !important;
    }
    .receipt-left,
    .receipt-right {
        display: block;
        float: none;
        text-align: center;
        margin-bottom: 20px;
    }
    .receipt-left img {
        margin: 0 auto;
    }
    .receipt-right p {
        margin-bottom: 5px;
    }
    .receipt-right h5 {
        margin-bottom: 10px;
    }
}
    </style>
</head>
<body style='background:#eee;
margin-top:20px;'>
  <div class="row" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin-right:-15px;margin-left:-15px;" >
  <div class="col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3"  style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:70%; margin-left:10px; position: absolute;
  top: 50%;
  left: 50%;transform: translate(-50%, -50%);" >
  <div class="receipt-main">
  <div class="row" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin-right:-15px;margin-left:-15px;" >
  <div class="receipt-header">
  <div class="col-xs-6 col-sm-6 col-md-6" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:50%;" >
  <div class="receipt-left" >
  <img class="img-responsive" src="cid:profile" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;border-radius:50%;border-width:0;vertical-align:middle;display:block;width:120px; height:120px" >
  </div>
  </div>
  <div class="col-xs-6 col-sm-6 col-md-6 text-right" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;text-align:right;position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:50%;" >
  <div class="receipt-right" >
  <h5>HavenEmpire</h5>
  <p>+233 548342821</p>
  <p style=' text-decoration: none !important; color: black;'><em>havenempire@gmail.com</em></p>
  <p>Ashesi University</p>
  </div>
  </div>
  </div>
  </div>
  <div class="row" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin-right:-15px;margin-left:-15px;" >
    <div class="receipt-header">
    <div class="col-md-8" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:67%;" >
    <div class="receipt-left">
    <h5 style="margin:0px; font-size:15px;">Name: <strong>$full_name</strong></h5>
    <p style="margin:0px;font-size:14px;" >Phone: $phones</p>
    <p style="margin:0px; font-size:14px; text-decoration:none !important; color:black" >Email: <em>$email</em></p>
    </div>
    </div>
    </div>
    </div>
  
    <div style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
    <table class="table table-bordered" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;border-spacing:0;border-collapse:collapse;background-color:transparent;width:100%;max-width:100%;margin-bottom:20px;" >
        <div class="row" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin-right:-15px;margin-left:-15px;" >
        <div class="col-md-8" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;text-align:left;position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:100%;" >
        <p style='font-size:16px' style='line-height:1rem'>  Dear <b>Admin</b>,
        <br>$mes</br>
</p>
         </div>
    </div>
    </table>
    </div>
    <div class="row" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;margin-right:-15px;margin-left:-15px;" >
    <div class="receipt-header receipt-header-mid receipt-footer" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
    <div class="col-xs-8 col-sm-8 col-md-8 text-left" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;text-align:left;position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:66.66666667%;" >
    <div class="receipt-right" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
    </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;position:relative;min-height:1px;padding-right:15px;padding-left:15px;float:left;width:33.33333333%;" >
    <div class="receipt-left" style="-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;" >
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </body>
    </html>
EOT;
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 3;
    $mail->addEmbeddedImage('../images/rest.png', 'profile');
    $mail->IsSMTP();
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->isHTML(true);                   //Enable SMTP authentication
    $mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
    $mail->Password   = 'vxqrasfuzmcicelm';                               //SMTP password           //Enable implicit TLS encryption
    $mail->Port       = 587; //587
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                       //SMTP username
    //Recipients
    $mail->setFrom($from, 'HavenEmpire');
    $mail->addAddress($to);     //Add a recipient            //Name is optional

    //Content                 //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
    if (!$mail->Send()) {
     echo "message";
    }else{
     echo "message sent";
    }

echo json_encode($response);


