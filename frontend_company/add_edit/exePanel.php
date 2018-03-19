<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

$pic = generateRandomString();

  $company_profile_executives_name=$_POST['company_profile_executives_name'];
  $company_profile_executives_position=$_POST['company_profile_executives_position'];
  $company_profile_executives_contact=$_POST['company_profile_executives_contact'];
  $target_dir = "assets/";
  $target_file = $target_dir .$pic.".jpg";
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


  // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    } else {
    }
}

/////////////// Set the profile picture ///////////////////
$file=$pic.".jpg";
$sql = "INSERT INTO company_profile_executives (company_profile_executives_name, company_profile_executives_position, company_profile_executives_pic, company_profile_idcompany_profile, company_profile_executives_contact)
VALUES ('$company_profile_executives_name','$company_profile_executives_position','$file','$id','$company_profile_executives_contact')";
if ($conn->query($sql) === TRUE) {

}

header('Location: ../index.php');
 ?>
