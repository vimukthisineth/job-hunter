<?php
session_start();
require_once('../../db/dbconn.php');
$email=$_SESSION['email'];
$student_about=$_POST['student_about'];

$sql_course = "UPDATE student_profile SET student_about='$student_about' WHERE student_email='$email'";
if ($conn->query($sql_course) === TRUE) {
}

header('Location: ../index.php');
 ?>
