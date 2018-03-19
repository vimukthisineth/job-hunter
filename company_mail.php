<?php
session_start();

$email=$_SESSION['company_email'];
$_SESSION['company_email']=$email;
$code=$_SESSION['company_email_verification'];
$message=$_SESSION['company_message'];
$_SESSION['company_message']=$message;
$_SESSION['company_email_verification']=$code;
$company_email_verification=$_SESSION['company_email_verification'];
$_SESSION['company_email_verification']=$company_email_verification;
// the message
$msg = "Your account activation code is : ".$code;

// use wordwrap() if lines are longer than 70 characters
$msg = wordwrap($msg,70);

// send email
mail($email,"Job Hunter",$msg);

header('Location: company_stage3.php');
?>
