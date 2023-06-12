<?php
include_once(dirname(__FILE__)).'../../settings/connection.php';
/// inherit the method from the connection file
class Customer extends Connection{
    function add_user($username, $password, $full_name, $email, $phone){
        return $this->query("insert into users(username, password, full_name, email, phone) values ('$username', '$password', '$full_name', '$email', '$phone')");
    }
    //select one user 
    function select_one_username($username){
        return $this->fetchOne("select * from users where username='$username'");
    }

    //select one user phone number
    function select_one_phone($phone){
        return $this->fetchOne("select * from users where phone='$phone'");
    }

     //select one user email
     function select_one_user_email($email){
        return $this->fetchOne("select * from users where email='$email'");
    }
      //function to update user
      function update_user_account($full_name, $phone, $username, $email){
        return $this->query("UPDATE users set full_name = '$full_name', phone='$phone', username='$username' where email='$email'");
        }

            // Updating the password
    function new_password($password, $email){
        return $this->query("UPDATE users set password = '$password' WHERE email = '$email'");
    }

     //checking to update user info to see if the phone number is not available to any other person
     function select_one_phone_not_user($phone, $email){
        return $this->fetchOne("SELECT * FROM users WHERE phone = '$phone' and email != '$email'");
    }

     //checking to update user info to see if the username is not available to any other person
     function select_one_username_not_user($username, $email){
        return $this->fetchOne(" SELECT * FROM users WHERE username = '$username' and email != '$email'");
    }


}

?>