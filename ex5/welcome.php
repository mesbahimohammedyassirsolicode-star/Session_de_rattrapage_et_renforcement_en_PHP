<?php 
session_start();
if(!isset($_SESSION["email"])){
    header("location: signup.php");
    exit;
}
$email=$_SESSION["email"];

echo "welcome: ".$email;
?>
