<?php
session_start();
require_once('../../db/dbconn.php');
$email=$_SESSION['email'];
$company_about=$_POST['about_us'];

$sql_course = "UPDATE company_profile SET company_profile_about='$company_about' WHERE company_profile_email='$email'";
if ($conn->query($sql_course) === TRUE) {
}

header('Location: ../index.php');
 ?>
