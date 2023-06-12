<?php
require('../controllers/product_controller.php');

$amount=[];
$cart_id = $_POST['cart_id'];
$user_id = $_POST['user_id'];
$new_quantity = $_POST['new_quantity'];

$result = update_cart_quantity_controller($new_quantity, $cart_id, $user_id);
if($result){
$amount["data"] = total_amount_controller($user_id);
}
echo json_encode($amount);

?>