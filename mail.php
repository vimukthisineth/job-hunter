<?php
session_start();

$email=$_SESSION['email'];
$_SESSION['email']=$email;
$code=$_SESSION['code'];
$message=$_SESSION['message'];
$_SESSION['message']=$message;
$_SESSION['email_verification']=$code;
$email_verification=$_SESSION['email_verification'];
$_SESSION['email_verification']=$email_verification;
// the message
$msg = "Your account activation code is : ".$code;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"Job Hunter",$msg);

header('Location: stage3.php');
?>