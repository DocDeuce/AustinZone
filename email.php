<?php 
include ('functions.php');
$userEmail = $_POST["email"];
if (!filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
  $emailErr = "Invalid email format";
}else{
    new_email($userEmail);
}
?>
