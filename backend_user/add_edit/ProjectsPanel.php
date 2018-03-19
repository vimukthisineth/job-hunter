<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

  $student_projects_title=$_POST['student_projects_title'];
  $student_projects_short_description=$_POST['student_projects_short_description'];
  $student_projects_description=$_POST['student_projects_description'];
  $student_projects_year=$_POST['student_projects_year'];
  $student_projects_client=$_POST['student_projects_client'];
  $student_projects_institute=$_POST['student_projects_institution'];
  $student_projects_budjet=$_POST['student_projects_budjet'];
  $student_projects_link=$_POST['student_projects_link'];
  $student_projects_superviser=$_POST['student_projects_superviser'];
  $student_projects_superviser_contact=$_POST['student_projects_superviser_contact'];

//////////////////////////// Logo ///////////////////////////////////////
  $target_dir_logo = "../assets/img/projects/";
  $target_file_logo = $target_dir_logo .$id.$student_projects_title.$student_projects_year.".jpg";
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file_logo,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["student_projects_image"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["student_projects_image"]["tmp_name"], $target_file_logo)) {
    } else {
    }
}

//////////////////////////// img1 ///////////////////////////////////////
  $target_dir_img1 = "../assets/img/projects/projects_img/";
  $target_file_img1 = $target_dir_img1 .$id.$student_projects_title.$student_projects_year."1.jpg";
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file_img1,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["student_projects_img1"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["student_projects_img1"]["tmp_name"], $target_file_img1)) {
    } else {
    }
}

//////////////////////////// img2 ///////////////////////////////////////
  $target_dir_img2 = "../assets/img/projects/projects_img/";
  $target_file_img2 = $target_dir_img2 .$id.$student_projects_title.$student_projects_year."2.jpg";
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file_img2,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["student_projects_img2"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["student_projects_img2"]["tmp_name"], $target_file_img2)) {
    } else {
    }
}

//////////////////////////// img3 ///////////////////////////////////////
  $target_dir_img3 = "../assets/img/projects/projects_img/";
  $target_file_img3 = $target_dir_img3 .$id.$student_projects_title.$student_projects_year."3.jpg";
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file_img3,PATHINFO_EXTENSION);

  // Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["student_projects_img3"]["tmp_name"]);
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
    if (move_uploaded_file($_FILES["student_projects_img3"]["tmp_name"], $target_file_img3)) {
    } else {
    }
}

$logo=$id.$student_projects_title.$student_projects_year.".jpg";
$img1=$id.$student_projects_title.$student_projects_year."1.jpg";
$img2=$id.$student_projects_title.$student_projects_year."2.jpg";
$img3=$id.$student_projects_title.$student_projects_year."3.jpg";

$sql_student_projects = "INSERT INTO student_projects (student_projects_title, student_projects_short_description, student_projects_description, student_projects_year, student_projects_image, student_projects_img1, student_projects_img2, student_projects_img3, student_projects_client, student_projects_institute, student_projects_budjet, student_projects_link, student_projects_superviser, student_projects_superviser_contact, student_profile_idstudent_profile)
VALUES ('$student_projects_title','$student_projects_short_description','$student_projects_description','$student_projects_year','$logo','$img1','$img2','$img3','$student_projects_client','$student_projects_institute','$student_projects_budjet','$student_projects_link','$student_projects_superviser','$student_projects_superviser_contact','$id')";
if ($conn->query($sql_student_projects) === TRUE) {

}


header('Location: ../index.php');
 ?>
