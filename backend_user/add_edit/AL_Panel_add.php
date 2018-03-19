<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

$student_accademic_al_year=$_POST['al_year'];
$student_accademic_al_subject=$_POST['al_subject'];
$student_accademic_al_grade=$_POST['al_grade'];
$student_accademic_al_index=$_POST['al_index'];

$sql = "INSERT INTO student_accademic_al (student_accademic_al_profile_id, student_accademic_al_year, student_accademic_al_subject, student_accademic_al_grade, student_accademic_al_index)
VALUES ('$id', '$student_accademic_al_year', '$student_accademic_al_subject', '$student_accademic_al_grade', '$student_accademic_al_index')";

if ($conn->query($sql) === TRUE) {
}

header('Location: ../index.php');
 ?>
