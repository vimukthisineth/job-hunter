<?php
session_start();
  $email=$_SESSION['email'];
  $_SESSION['email']=$email;
  $_SESSION['message']="E-mail was sent again !";

require_once('db/dbconn.php');

$sql = "SELECT email_verification FROM student_profile WHERE student_email = '$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $email_verification=$row["email_verification"];
    }
}
$conn->close();
$_SESSION['email_verification']=$email_verification;

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
