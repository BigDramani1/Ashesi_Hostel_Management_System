<?php
require("../controllers/product_controller.php");

    $receipt_id = $_POST['receipt_id'];
    $user_id = $_POST['user_id'];
    
    // call the delete one product controller
  
    $result=remover_from_receipt_controller($user_id, $receipt_id);
 $response = array('success' => true, 'message' => 'Item has been deleted.');

 

     echo json_encode($response);