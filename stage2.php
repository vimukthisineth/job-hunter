<?php
session_start();

require_once('db/dbconn.php');

$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];
$university=$_POST['university'];
$email_name=$_POST['email_name'];
$email_end=$_POST['email_end'];
$pwd=$_POST['pwd'];
$email=$email_name.$email_end;


function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$email_verification = generateRandomString();

$sql = "SELECT * FROM student_profile WHERE student_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Email already registered
    $_SESSION['message']="The email address you entered is wrong or it has been already registered. Please check it again";
}
else {
    $sql = "INSERT INTO student_profile (student_first_name,student_last_name,student_university,student_email,pwd,email_verification)
    VALUES ('$first_name','$last_name','$university','$email','$pwd','$email_verification')";

  if ($conn->query($sql) === TRUE) {

  } else {

  }
}


$conn->close();

$_SESSION["email"] = $email;
$_SESSION["email_verification"] = $email_verification;

/*
//Verification email
  $subject = "Job Hunter | Activate your account";

  $message = "
  <html>
  <head>
  <title>HTML email</title>
  </head>
  <body>
  <p>This email contains HTML Tags!</p>
  <table>
  <tr>
  <th>Firstname</th>
  <th>Lastname</th>
  </tr>
  <tr>
  <td>John</td>
  <td>Doe</td>
  </tr>
  </table>
  </body>
  </html>
  ";

  // Always set content-type when sending HTML email
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  // More headers
  $headers .= 'From: <webmaster@example.com>' . "\r\n";
  $headers .= 'Cc: myboss@example.com' . "\r\n";

  mail($email,$subject,$message,$headers);
*/

header('Location: stage3.php');
 ?>
