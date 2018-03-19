<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

  $company_profile_hq=$_POST['company_profile_hq'];
  $company_profile_hq_contact=$_POST['company_profile_hq_contact'];
  $company_profile_website=$_POST['company_profile_website'];


$sql_course = "UPDATE company_profile SET company_profile_hq='$company_profile_hq' WHERE company_profile_email='$email'";
if ($conn->query($sql_course) === TRUE) {
}

$sql_accademic_start = "UPDATE company_profile SET company_profile_hq_contact='$company_profile_hq_contact' WHERE company_profile_email='$email'";
if ($conn->query($sql_accademic_start) === TRUE) {
}

$sql_accademic_start = "UPDATE company_profile SET company_profile_website='$company_profile_website' WHERE company_profile_email='$email'";
if ($conn->query($sql_accademic_start) === TRUE) {
}

header('Location: ../index.php');
 ?>
