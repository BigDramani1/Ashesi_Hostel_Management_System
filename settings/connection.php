 <!-- making the database connect, so that if the user sign's up, it saves in the database and calls it. -->
 <?php 
      
      require_once('settings/const.php');
  
      $mysqli = new mysqli(SERVER, USERNAME, PASSWORD, DATABASE);
  
      if($mysqli === false){
          die("ERROR: Could not connect. " . $mysqli->connect_error);
      }
  
  
  ?>

