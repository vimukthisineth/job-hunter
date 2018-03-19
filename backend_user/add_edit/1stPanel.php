<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

  $student_course=$_POST['student_course'];
  $student_accademic_start=$_POST['student_accademic_start'];
  $target_dir = "../assets/img/profile_pics/";
  $target_file = $target_dir .$id.".jpg";
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["student_pro_pic"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["student_pro_pic"]["tmp_name"], $target_file)) {
    } else {
    }
}

/////////////// Set the profile picture ///////////////////
$file=$id.".jpg";
$sql_pro_pic = "UPDATE student_profile SET student_pro_pic='$file' WHERE student_email='$email'";
if ($conn->query($sql_pro_pic) === TRUE) {
}

$sql_course = "UPDATE student_profile SET student_course='$student_course' WHERE student_email='$email'";
if ($conn->query($sql_course) === TRUE) {
}

$sql_accademic_start = "UPDATE student_profile SET student_accademic_start='$student_accademic_start' WHERE student_email='$email'";
if ($conn->query($sql_accademic_start) === TRUE) {
}

header('Location: ../index.php');
 ?>
