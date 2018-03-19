<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

  $company_recognitions_year=$_POST['company_recognitions_year'];
  $company_recognitions_title=$_POST['company_recognitions_title'];
  $company_recognitions_content=$_POST['company_recognitions_content'];
  $company_recognitions_author=$_POST['company_recognitions_author'];
  $company_recognitions_venue=$_POST['company_recognitions_venue'];

$sql_recognitions = "INSERT INTO company_recognitions (company_recognitions_year, company_recognitions_title, company_recognitions_content, company_recognitions_author, company_recognitions_venue, company_profile_idcompany_profile)
VALUES ('$company_recognitions_year','$company_recognitions_title','$company_recognitions_content','$company_recognitions_author','$company_recognitions_venue','$id')";
if ($conn->query($sql_recognitions) === TRUE) {
echo "string";
}
else {
  echo "mskk";
}


header('Location: ../index.php');
 ?>
