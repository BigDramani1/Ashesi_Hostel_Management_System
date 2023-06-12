<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 use PHPMailer\PHPMailer\SMTP;
 
 require __DIR__.'/phpmailer/src/Exception.php';
 require __DIR__.'/phpmailer/src/PHPMailer.php';
 require __DIR__.'/phpmailer/src/SMTP.php';
 session_start();
require ('../controllers/product_controller.php');  

// initialize a client url which we will use to send the reference to the paystack server for verification
$curl = curl_init();
// set options for the curl session insluding the url, headers, timeout, etc
curl_setopt_array($curl, array(
CURLOPT_URL => "https://api.paystack.co/transaction/verify/{$_GET['reference']}",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "GET",
CURLOPT_HTTPHEADER => array(
    "Authorization: Bearer sk_test_b185f885fd9f2d0e2cf8f9f2bfe16dafbd472556", // replace with your private key on paystack  
    "Cache-Control: no-cache",
),
));

// get the response and store
$response = curl_exec($curl);
// if there are any errors
$err = curl_error($curl);
// close the session
curl_close($curl);

// convert the response to PHP object
$decodedResponse = json_decode($response);

$reference = $_GET['reference'];
// convert the response to PHP object
if(isset($decodedResponse->data->status) && $decodedResponse->data->status === 'success'){
    $email = $_SESSION['email'];
    $invoice_num = rand(10,10000);
    $add = $_GET['amount'];
    $user_id = $_SESSION['user_id'];
    $order_date = date('Y/m/d');
   
     // call a function that stores an array of the customer's details
     $products = select_cart_for_each_user_controller($user_id);
     foreach($products as $hostel){
        $each_item =each_total_amount_controller($user_id, $hostel['cart_id']);
        // customer receipt
        $add_receipt =  add_user_receipt_controller($hostel['hostel_id'],  $user_id, $hostel['qty'], $hostel['room_num'], $invoice_num, $order_date, $each_item['Amount'], $hostel['price']);
        //admin receipt
        $add_admin_receipt =  add_admin_receipt_controller($hostel['hostel_id'],  $user_id, $hostel['qty'], $hostel['room_num'], $invoice_num, $order_date, $each_item['Amount'], $hostel['price']);
      
     }
        //sending email to client 
    $from = "havenempire@gmail.com";
    $full_name = $_SESSION['full_name'];
    $phone = $_SESSION['phone'];
    $amounts = $_GET['amount'];
    $product = select_all_from_invoice_num_controller($user_id, $invoice_num);
    $test='';
    foreach ($product as $hostel){
    $test .="<tr>
    <td style=' text-align: left;'>{$hostel['hostel_name']}</td>
    <td style=' text-align: left;'>{$hostel['price']}</td>
    <td style=' text-align: left;'>{$hostel['room_num']}</td>
    <td style=' text-align: left;'>{$hostel['qty']}</td>
    <td style=' text-align: left;'>{$hostel['total']}</td></tr>";
    }
    $to = $email;
    $subject = "Payment Successful";
    $msg = "<center><div style='
    width: 60%;
          padding: 35px 50px;
          transform: translate(-50%,-50%);
          position: relative;
          background-color:#f5f6ff;
          left: 50%;
          top: 350px;
          border-radius: 10px;
          -webkit-border-radius: 10px;
          -moz-border-radius: 10px;
          box-shadow: 0px 6px 18px 0px rgba(16, 5, 54, 0.17);'>
    <div style='float:left; margin-bottom:-20px;'>
        <img src='cid:profile' width='100' >
      </div>
      <div style='float:right; margin-bottom:-20px;'>
      <p font-size:16px;><strong>Invoice Id: #$invoice_num </strong></p>
      </div>
   
     <div class='line' style='position:relative;
          display: -ms-flexbox;
          display: flex;
          -ms-flex-direction: column;
          flex-direction: column;
          margin-top:100px;
          min-width: 0;
          word-wrap: break-word;
          background-color:black;
          background-clip: border-box;
          border: 1px solid rgba(0,0,0,.125);
          border-radius: 0.25rem;'>
     </div>
     <div style='float:left; line-height:1.4rem; margin-top:30px; '>
        <h2 style='margin-bottom:-0px'>Payment Made To</h2><br>Name:<strong>HavenEmpire</strong><br>Location: <strong>Ashesi University</strong>
      </div>
      <div style='float:right; line-height:1; margin-top:30px; margin-bottom:50px; line-height:1.4rem; '>
        <h2 style='margin-bottom:-0px'>My Details</h2><br>Name: <strong>$full_name</strong><br>Order Date: <strong>$order_date</strong><br>Phone: <strong>$phone </strong>
      </div>
     <div class='quantity' style='margin-top:60px;'>
       <table class='table' style=' width: 100%; 
  '>
         <thead>
           <tr>
             <th style=' text-align: left;'>Hostel Name</th>
             <th style=' text-align: left;'>Price</th>
             <th style=' text-align: left;'>Room Type</th>
             <th style=' text-align: left;'>Quantity</th>
             <th style=' text-align: left;'>Total</th>
           </tr>
         </thead>
         <tbody>
             $test
         </tbody>
       </table>
     </div>
     <div style='background: black !important; color: #fff !important; height:100px; margin-top:30px; padding-top:20px'>
       <p style='float:right; margin-right:20px'>Grand Total
     <br><span style='font-size:30px;'>GH₵ $add</span></p>
     </div>
     <p style='font-size:17px;'>If you have questions concerning you invoice, please call +233 548342821 or send an email to a.dramani@aisghana.org</p>
   
   </div>
   </div></center>";
   $mail = new PHPMailer(true);
   $mail->addEmbeddedImage('../images/rest.png', 'profile');
    $mail->SMTPDebug = 3;
    $mail->IsSMTP();
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;
    $mail->SMTPSecure = 'tls';
    $mail->isHTML(true);                   //Enable SMTP authentication
    $mail->Username   = 'johnmahama65@gmail.com';                     //SMTP username
    $mail->Password   = 'vxqrasfuzmcicelm';                        //SMTP password           //Enable implicit TLS encryption
    $mail->Port       = 587;
    $mail->SMTPDebug  = SMTP::DEBUG_OFF;                              //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                       //SMTP username
    //Recipients
    $mail->setFrom($from, 'HavenEmpire');
    $mail->addAddress($to);     //Add a recipient            //Name is optional

    //Content                              //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $msg;

    $mail->SMTPOptions = array('ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => false
    ));
      if (!$mail->Send()) {
          echo"<script>alert('Sorry, couldn't send receipt. Please report this error'); window.location.href = 'cart.php; </script>.";
      } else{
        $delete_cart = remove_everything_from_cart_controller($user_id);
        header ("Location: ../receipt.php?invoice_num=$invoice_num");
        exit();
    }  
        
} else{
    echo"<script>alert('Sorry, payment could not be processed, please try again later'); window.location.href = '../cart.php; </script>.";
}
?>