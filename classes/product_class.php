<?php
include_once(dirname(__FILE__)).'../../settings/connection.php';
/// inherit the method from the connection file
class Product extends Connection { 

    //selecting all 6 hostels
        function select_6_hostels(){
            return $this->fetch("select * from hostels limit 6");
        }

    //select one hostel
    function select_one_hostel($hostel_id){
        return $this->fetchOne("select * from hostels where hostel_id='$hostel_id'");
    }

  // search for hostels
  function search_hostel($search){
    return $this->fetch("SELECT * FROM hostels WHERE CONCAT(hostel_name, hostel_owner, price_range) LIKE '%$search%'");
}

   //selecting all hostels
   function select_all_hostels(){
    return $this->fetch("select * from hostels");
}

// count the number of hostels 
function count_all_hostels(){
    return $this->count("select * from hostels");
}

//insert into cart 
function add_to_cart($hostel_id,  $user_id, $qty, $room_num, $price){
    return $this->query("insert into cart(hostel_id, user_id, qty, room_num, price) values ('$hostel_id', '$user_id', '$qty', '$room_num', '$price')");
}

// count items in cart for each user 
function cart_count($customer_id)
{
    return $this->fetchOne("SELECT COUNT(cart_id) as counting FROM cart where user_id ='$customer_id'");
}

// select from cart for room, user and hostel id
function select_from_cart_room($room_num, $user_id, $hostel_id)
{
    return $this->fetchOne("select * from cart where room_num = '$room_num' and user_id ='$user_id' and hostel_id='$hostel_id'");
}
//update cart for existing room_num
function update_cart($hostel_id,  $user_id, $qty, $room_num){
    return $this->query("update cart set qty='$qty' where hostel_id='$hostel_id' and user_id='$user_id' and room_num='$room_num'");
}

// select cart for each user 
function select_cart_for_each_user($user_id)
{
    return $this->fetch("select * from cart s inner join hostels a on s.hostel_id = a.hostel_id where user_id ='$user_id'");
}

// update cart quantity
function update_cart_quantity($quantity, $cart_id, $user_id)
{
    return $this->query("update cart set qty = '$quantity' where cart_id = '$cart_id' and user_id = '$user_id'");
   
}
  // total amount
function total_amount($user_id)
{
    return $this->fetchOne("SELECT SUM(price *qty) as Amount  FROM cart where user_id ='$user_id'");
}

  // each total amount
  function each_total_amount($user_id, $cart_id)
  {
      return $this->fetchOne("SELECT (price *qty) as Amount  FROM cart where user_id ='$user_id' and cart_id='$cart_id'");
  }

// remove from cart
function remove_from_cart($cart_id, $user_id)
{
    return $this->query("delete from cart where cart_id = '$cart_id' and user_id = '$user_id'");
   
}

// insert into user receipt
function add_user_receipt($hostel_id,  $user_id, $qty, $room_num, $invoice_num, $order_date, $total, $price){
    return $this->query("insert into receipt(hostel_id, user_id, qty, room_num, invoice_num, order_date, total, price) values ('$hostel_id', '$user_id', '$qty', '$room_num', '$invoice_num', '$order_date', '$total', '$price')");
}

// insert into admin receipt
function add_admin_receipt($hostel_id,  $user_id, $qty, $room_num, $invoice_num, $order_date, $total, $price){
    return $this->query("insert into admin_receipt(hostel_id, user_id, qty, room_num, invoice_num, order_date, total, price) values ('$hostel_id', '$user_id', '$qty', '$room_num', '$invoice_num', '$order_date', '$total', '$price')");
}
// select all from invoice
function select_all_from_invoice_num($user_id, $invoice_num){
    return $this->fetch("select * from receipt s inner join hostels a on a.hostel_id = s.hostel_id where user_id = '$user_id' and invoice_num = '$invoice_num'");
   
}
// remove everything from cart for user 
function remove_everything_from_cart($user_id){
    return $this->query("delete from cart where user_id = '$user_id'");
   
}

// select one of the date of the receipt 
function select_one_date_invoice_num($user_id, $invoice_num){
    return $this->fetchOne("select * from receipt s inner join hostels a on a.hostel_id = s.hostel_id where user_id = '$user_id' and invoice_num = '$invoice_num' limit 1");
   
}

  // total amount based on invoice num for user
  
  function total_amount_for_invoice($user_id, $invoice_num)
  {
      return $this->fetchOne("SELECT SUM(price *qty) as Amount  FROM receipt where user_id ='$user_id' and invoice_num='$invoice_num'");
  }

  // select all receipt for one user
function select_all_receipt_for_user($user_id){
    return $this->fetch("select * from receipt s inner join hostels a on a.hostel_id = s.hostel_id where user_id = '$user_id'");
   
}
// delete from receipt for one user
function remover_from_receipt($user_id, $receipt_id){
    return $this->query("delete from receipt where user_id = '$user_id' and receipt_id = '$receipt_id'");
   
}
// count the number of hostels purchased by one user
function count_number_of_purchases($user_id){
    return $this->fetchOne("SELECT Count(admin_receipt_id) as count from admin_receipt where user_id='$user_id'");
}

}

?>