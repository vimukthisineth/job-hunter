<?php
session_start();
require_once('../../db/dbconn.php');
$id=$_SESSION['id'];
$email=$_SESSION['email'];

  $company_branches_name=$_POST['company_branches_name'];
  $company_branches_address=$_POST['company_branches_address'];
  $company_branches_tele=$_POST['company_branches_tele'];

  $sql_company_branches = "INSERT INTO company_branches (company_branches_name, company_branches_address, company_branches_tele, company_branches_idcompany)
  VALUES ('$company_branches_name','$company_branches_address','$company_branches_tele','$id')";
  if ($conn->query($sql_company_branches) === TRUE) {

  }

header('Location: ../index.php');
 ?>
