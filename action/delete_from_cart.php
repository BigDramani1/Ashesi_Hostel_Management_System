<?php 
require('../controllers/product_controller.php');

$cart_id = $_POST['cart_id'];
$user_id = $_POST['user_id'];


// call the remove cart controller function
$result = remove_from_cart_controller($cart_id, $user_id);

if ($result){
    $response = array('success' => true, 'message' => 'Item deleted.');
}
else{
    $response = array('success' => false, 'message' => 'Item could not be deleted.');
}

echo json_encode($response);
?>