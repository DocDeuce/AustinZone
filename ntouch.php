<?php 
include ('functions.php');
$cName = $_POST["name_first"];
$cType = $_POST["creatype"];
$cBiz = $_POST["name_biz"];
$cEmail = $_POST["email"];
//print_r($_POST);
new_contact($_POST);
//header("Location: thanks.php"); /* Redirect browser */
//exit();
?>
