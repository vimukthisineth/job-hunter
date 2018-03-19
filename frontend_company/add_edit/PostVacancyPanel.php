<?php
session_start();
require_once('../../db/dbconn.php');
$email=$_SESSION['email'];
$id=$_SESSION['id'];

$company_vacancy_position=$_POST['company_vacancy_position'];
$company_vacancy_sallary=$_POST['company_vacancy_sallary'];
$company_vacancy_branch=$_POST['company_vacancy_branch'];
$company_vacancy_count=$_POST['company_vacancy_count'];
$company_vacancy_additional=$_POST['company_vacancy_additional'];
$company_vacancy_catagory=$_POST['company_vacancy_catagory'];
$company_vacancy_level=$_POST['company_vacancy_level'];

$sql_company_vacancy = "INSERT INTO company_vacancy (company_vacancy_position, company_vacancy_sallary, company_vacancy_branch, company_vacancy_count, company_vacancy_additional, company_vacancy_catagory, company_vacancy_level, company_profile_idcompany_profile)
VALUES ('$company_vacancy_position','$company_vacancy_sallary','$company_vacancy_branch','$company_vacancy_count','$company_vacancy_additional','$company_vacancy_catagory','$company_vacancy_level','$id')";
if ($conn->query($sql_company_vacancy) === TRUE) {

}

header('Location: ../index.php');
 ?>
