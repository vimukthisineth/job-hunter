<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

  $company_profile_name=$_POST['company_profile_name'];
  $company_profile_slogon=$_POST['company_profile_slogon'];
  $company_profile_facebook=$_POST['company_profile_facebook'];
  $company_profile_twitter=$_POST['company_profile_twitter'];
  $company_profile_linkedin=$_POST['company_profile_linkedin'];
  $company_profile_gplus=$_POST['company_profile_gplus'];

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
$sql_pro_pic = "UPDATE company_profile SET company_profile_propic='$file' WHERE company_profile_email='$email'";
if ($conn->query($sql_pro_pic) === TRUE) {
}

$sql_course = "UPDATE company_profile SET company_profile_name='$company_profile_name' WHERE company_profile_email='$email'";
if ($conn->query($sql_course) === TRUE) {
}

$sql_accademic_start = "UPDATE company_profile SET company_profile_slogon='$company_profile_slogon' WHERE company_profile_email='$email'";
if ($conn->query($sql_accademic_start) === TRUE) {
}

$sql_facebook = "UPDATE company_profile SET company_profile_facebook='$company_profile_facebook' WHERE company_profile_email='$email'";
if ($conn->query($sql_facebook) === TRUE) {
}

$sql_linkedin = "UPDATE company_profile SET company_profile_linkedin='$company_profile_linkedin' WHERE company_profile_email='$email'";
if ($conn->query($sql_linkedin) === TRUE) {
}

$sql_twitter = "UPDATE company_profile SET company_profile_twitter='$company_profile_twitter' WHERE company_profile_email='$email'";
if ($conn->query($sql_twitter) === TRUE) {
}

$sql_gplus = "UPDATE company_profile SET company_profile_gplus='$company_profile_gplus' WHERE company_profile_email='$email'";
if ($conn->query($sql_gplus) === TRUE) {
}

header('Location: ../index.php');
 ?>
