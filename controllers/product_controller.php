<?php
include_once(dirname(__FILE__)).'/../classes/product_class.php';

//select all products
function select_6_hostels_controller(){
    $brand_instance = new Product();
    return $brand_instance->select_6_hostels();
}

function select_one_hostel_controller($hostel_id){
    $brand_instance = new Product();
    return $brand_instance->select_one_hostel($hostel_id);
}

function search_hostel_controllers($search){
    $brand_instance = new Product();
    return $brand_instance->search_hostel($search);
}

function select_all_hostels_controller(){
    $brand_instance = new Product();
    return $brand_instance->select_all_hostels();
}

function  count_all_hostels_controller(){
    $brand_instance = new Product();
    return $brand_instance-> count_all_hostels();
}

//inserting into cart
function  add_to_cart_controller($hostel_id,  $user_id, $qty, $room_num, $price){
    $brand_instance = new Product();
    return $brand_instance-> add_to_cart($hostel_id,  $user_id, $qty, $room_num, $price);
}

// count items in cart
function  cart_count_controller($customer_id){
    $brand_instance = new Product();
    return $brand_instance-> cart_count($customer_id);
}

// select from cart for user, room and hostel id
function  select_from_cart_room_controller($room_num, $user_id, $hostel_id){
    $brand_instance = new Product();
    return $brand_instance->select_from_cart_room($room_num, $user_id, $hostel_id);
}

// updating cart for existing product
function  update_cart_controller($hostel_id,  $user_id, $qty, $room_num){
    $brand_instance = new Product();
    return $brand_instance->update_cart($hostel_id,  $user_id, $qty, $room_num);
}

// select cart for one user
function   select_cart_for_each_user_controller($user_id){
    $brand_instance = new Product();
    return $brand_instance-> select_cart_for_each_user($user_id);
}

// update cart quantity
function  update_cart_quantity_controller($quantity, $cart_id, $user_id){
    $brand_instance = new Product();
    return $brand_instance-> update_cart_quantity($quantity, $cart_id, $user_id);
}
// update total amount for cart
function  total_amount_controller($user_id){
    $brand_instance = new Product();
    return $brand_instance-> total_amount($user_id);
}

// update total amount for cart
function  each_total_amount_controller($user_id, $cart_id){
    $brand_instance = new Product();
    return $brand_instance-> each_total_amount($user_id, $cart_id);
}

// remove from cart
function  remove_from_cart_controller($cart_id, $user_id){
    $brand_instance = new Product();
    return $brand_instance-> remove_from_cart($cart_id, $user_id);
}

// insert into user receipt 
function  add_user_receipt_controller($hostel_id,  $user_id, $qty, $room_num, $invoice_num, $order_date, $total, $price){
    $brand_instance = new Product();
    return $brand_instance-> add_user_receipt($hostel_id,  $user_id, $qty, $room_num, $invoice_num, $order_date, $total, $price);
}

// insert into user receipt 
function  add_admin_receipt_controller($hostel_id,  $user_id, $qty, $room_num, $invoice_num, $order_date, $total, $price){
    $brand_instance = new Product();
    return $brand_instance-> add_admin_receipt($hostel_id,  $user_id, $qty, $room_num, $invoice_num, $order_date, $total, $price);
}

// select all from invoice num 
function  select_all_from_invoice_num_controller($user_id, $invoice_num){
    $brand_instance = new Product();
    return $brand_instance-> select_all_from_invoice_num($user_id, $invoice_num);
}

// remove everything from cart for one user
function  remove_everything_from_cart_controller($user_id){
    $brand_instance = new Product();
    return $brand_instance-> remove_everything_from_cart($user_id);
}

//select one date from receipt
function  select_one_date_invoice_num_controller($user_id, $invoice_num){
    $brand_instance = new Product();
    return $brand_instance->  select_one_date_invoice_num($user_id, $invoice_num);
}

//total amount based on the invoice num for user 
function total_amount_for_invoice_controller($user_id, $invoice_num){
    $brand_instance = new Product();
    return $brand_instance-> total_amount_for_invoice($user_id, $invoice_num);
}

//select all receipt from users
function select_all_receipt_for_user_controller($user_id){
    $brand_instance = new Product();
    return $brand_instance-> select_all_receipt_for_user($user_id);
}

//delete receipt for one user 
function remover_from_receipt_controller($user_id, $receipt_id){
    $brand_instance = new Product();
    return $brand_instance-> remover_from_receipt($user_id, $receipt_id);
}

//count number of hostel purchased for one user
function count_number_of_purchases_controller($user_id){
    $brand_instance = new Product();
    return $brand_instance-> count_number_of_purchases($user_id);
}