<?php
session_start();

require_once('db/dbconn.php');

$company_name=$_POST['company_name'];
$company_slogon=$_POST['company_slogon'];
$company_email=$_POST['company_email'];
$company_link=$_POST['company_link'];
$company_pwd=$_POST['company_pwd'];


function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$email_verification = generateRandomString();

$sql = "SELECT * FROM company_profile WHERE company_profile_email = '$company_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email already registered
    $_SESSION['message']="The email address you entered is wrong or it has been already registered. Please check it again";
}
else {
    $sql = "INSERT INTO company_profile (company_profile_name, company_profile_email, company_profile_website, company_profile_pwd, company_profile_verify)
    VALUES ('$company_name','$company_email','$company_link','$company_pwd','$email_verification')";

  if ($conn->query($sql) === TRUE) {

  } else {

  }
}


$conn->close();

$_SESSION["company_email"] = $company_email;
$_SESSION["company_email_verification"] = $email_verification;


header('Location: company_mail.php');
 ?>
