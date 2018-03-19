<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];
$accademic_year=$_POST['accademic_year'];
$semester=$_POST['semester'];
$gpa=$_POST['gpa'];
$credits=$_POST['credits'];

$sql = "INSERT INTO student_accademic_university (student_id_accademic_university, student_accademic_university_year, student_accademic_university_semester, student_accademic_university_gpa, student_accademic_university_credits)
VALUES ('$id', '$accademic_year', '$semester', '$gpa', '$credits')";

if ($conn->query($sql) === TRUE) {
}

header('Location: ../index.php');
 ?>
