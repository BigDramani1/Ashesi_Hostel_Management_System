<?php
include_once(dirname(__FILE__)).'/../classes/customer_class.php';

// add username 
function  add_user_controller($username, $password, $full_name, $email, $phone){
    $new_customer = new Customer();
    return $new_customer-> add_user($username, $password, $full_name, $email, $phone);
}

// select one user username 
 function select_one_username_controller($username){
    $update = new customer();
        return $update->select_one_username($username);
 }

 // select one user phone
 function select_one_phone_controller($phone){
    $update = new customer();
        return $update->select_one_phone($phone);
 }

  // select one user email
  function select_one_user_email_controller($email){
    $update = new customer();
        return $update->select_one_user_email($email);
 }

// update user account
 function update_user_account_controller($full_name, $phone, $username, $email){
    $update = new customer();
        return $update->update_user_account($full_name, $phone, $username, $email);
 }

 // update new password
 function new_password_controller($password, $email){
    $update = new customer();
        return $update-> new_password($password, $email);
 }

  // selecting one phone number not one user
  function select_one_phone_not_user_controller($phone, $email){
    $update = new customer();
        return $update-> select_one_phone_not_user($phone, $email);
 }

  // selecting one phone number not one user
  function select_one_username_not_user_controller($username, $email){
    $update = new customer();
        return $update-> select_one_username_not_user($username, $email);
 }



 
?>