<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];
$student_full_name=$_POST['student_full_name'];
$student_address=$_POST['student_address'];
$student_district=$_POST['student_district'];

$sql_full_name = "UPDATE student_profile SET student_full_name='$student_full_name' WHERE student_email='$email'";
if ($conn->query($sql_full_name) === TRUE) {
}

$sql_address = "UPDATE student_profile SET student_address='$student_address' WHERE student_email='$email'";
if ($conn->query($sql_address) === TRUE) {
}

$sql_district = "UPDATE student_profile SET student_district='$student_district' WHERE student_email='$email'";
if ($conn->query($sql_district) === TRUE) {
}

header('Location: ../index.php');
 ?>
