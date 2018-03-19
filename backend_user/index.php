<?php
session_start();
require_once('../db/dbconn.php');

$email=$_SESSION['email'];
$_SESSION['email']=$email;

  /////////////////////////////////////////Student details//////////////////////////////////////////////
  $sql_student_profile = "SELECT * FROM student_profile WHERE student_email = '$email'";
  $result_student_profile = $conn->query($sql_student_profile);

  //// Table : student_profile ////
        if ($result_student_profile->num_rows > 0) {
            // output data of each row
            while($row_student_profile = $result_student_profile->fetch_assoc()) {
                $account_active=$row_student_profile["account_active"];
                $student_id=$row_student_profile["idstudent_profile"];
                $student_first_name=$row_student_profile["student_first_name"];
                $student_last_name=$row_student_profile["student_last_name"];
                $student_full_name=$row_student_profile["student_full_name"];
                $student_address=$row_student_profile["student_address"];
                $student_district=$row_student_profile["student_district"];
                $student_university=$row_student_profile["student_university"];
                $student_course=$row_student_profile["student_course"];
                $student_accademic_start=$row_student_profile["student_accademic_start"];
                $student_rating=$row_student_profile["student_rating"];
                $student_pro_pic=$row_student_profile["student_pro_pic"];
                $student_about=$row_student_profile["student_about"];
            }
        }

    $_SESSION['id']=$student_id;

  //// Account active check ////
  if ($account_active==1) {
    # code...
  }
  else {
    $message="Your account is not active yet. Please activate ! <i><a href=''>Activate Now</a></i>";
  }

  //// University Logo ////
  switch ($student_university) {
    case "University of Kelaniya":
      $uni_logo="uok.png";
      break;
    case "University of Colombo":
      $uni_logo="uoc.png";
      break;
    case "University of Moratuwa":
      $uni_logo="uom.png";
      break;
    case "University of Peradeniya":
      $uni_logo="uop.png";
      break;
    case "University of Sri Jayawardhanapura":
      $uni_logo="uoj.png";
      break;
  }

  //// Profile Pic ////
  if ($student_pro_pic) {
    $pro_pic=$student_pro_pic;
  }
  else {
    $pro_pic="ppd.jpg";
  }

 ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Job Hunter</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
	  <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href=".//css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Arima+Madurai:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:400" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Abel" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Orbitron" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Geo" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
	<!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
  </head>
  <body background="assets/img/pattern.jpg">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container">
        <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><span class="text-title"> <img class="img-thumbnail img-responsive" src="assets/img/logo_small.jpg" width="50"> Job Hunter</span></a>

        </div>
        <a href="logout.php" style="text-decoration:none;">
          <button type="button" class="btn btn-success btn-lg btn-block">Log Out</button>
        </a>
      </div>
    </nav>

    <div class="row">
        <div class="col-md-12">
            <!-- Prifile Heading -->
            <div class="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:10px; background-color:white;">
             <div class="row">
               <div class="col-2">
                 <?php echo "<img src='assets/img/university/$uni_logo' width='100%' vspace='25px' class='rounded'>"; ?>
               </div>
               <div class="col-2">
                 <?php echo "<img src='assets/img/profile_pics/$student_pro_pic' width='100%'' vspace='25px' class='rounded'>"; ?>
               </div>
               <div class="col-6" style="padding-top:9px; font-size:20px; font-family: 'Alegreya Sans SC', sans-serif;">
                 <table>
                   <tr>
                     <p style="font-family: 'Alegreya Sans SC', sans-serif;"><td><i class="fa fa-user" aria-hidden="true"></i> </td><td><?php echo $student_first_name." ".$student_last_name; ?></td>
                   </tr><tr>
                     <td><i class="fa fa-building" aria-hidden="true"></i> </td><td><?php echo $student_university; ?></td>
                   </tr><tr>
                     <td><i class="fa fa-graduation-cap" aria-hidden="true"></i> </td><td><?php echo $student_course; ?></td>
                   </tr><tr>
                     <td><i class="fa fa-calendar" aria-hidden="true"></i> </td><td>Accademic started on <?php echo $student_accademic_start; ?></td>
                   </tr><tr>
                     <td><i class="fa fa-star-half-o" aria-hidden="true"></i> </td><td>Rating <span class="badge badge-success"><?php echo $student_rating; ?> / 10</span></td></p>
                 </tr>
                 </table >
               </div>
               <div class="col-2" style="padding-top:20px; font-family: 'Raleway', sans-serif;">
                 <button type="button" data-toggle="modal" data-target="#1stPanelModal" class="btn btn-outline-success btn-lg btn-block" style="height:90%"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
               </div>
             </div>
            </div>

            <!-- Vacancy panel -->
            <div class="container"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:10px; background-color:white; padding:5px;">
              <div class="col-12" style="padding-top:10px; padding-bottom:10px; padding-right:20px">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col">
                        <a href="#" style="text-decoration:none;">
                          <button type="button" class="btn btn-outline-primary btn-lg btn-block">Look for Vacacies <span class="badge badge-primary">23</span></button>
                        </a>
                      </div>
                      <div class="col">
                        <a href="#" style="text-decoration:none;">
                          <button type="button" class="btn btn-outline-danger btn-lg btn-block">My Vacancies <span class="badge badge-danger">4</span></button>
                        </a>
                      </div>
                      <div class="col">
                        <a href="#" style="text-decoration:none;">
                          <button type="button" class="btn btn-outline-success btn-lg btn-block">Messages <span class="badge badge-success">1</span></button>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- 2nd panel -->
            <div class="container"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:10px; background-color:white; padding:5px;">
              <div class="col-12" style="padding-top:10px; padding-bottom:10px; padding-right:20px">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-10">
                        <h4 class="card-title">Who am I?</h4>
                      </div>
                      <div class="col-2">
                        <button type="button" data-toggle="modal" data-target="#2ndPanelModal" class="btn btn-outline-success btn-block" style="height:90%;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                      </div>
                    </div>
                      <p style="font-family: 'Arima Madurai', cursive; font-size:20px; color:#383535;">
                        <?php echo $student_about; ?>
                      </p>
                  </div>
                </div>
              </div>
            </div>

            <!-- 3rd panel -->
            <div class="container" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:10px; background-color:white; padding:5px;">
              <div class="row" style="margin-top:15px">
                <div class="col-7">
                  <!-- Left Panel -->
                  <div class="col-12">
                    <!-- Personal Details Panel -->
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-7">
                            <h4 class="card-title">Personal Details</h4>
                          </div>
                          <div class="col-5">
                            <button type="button" data-toggle="modal" data-target="#PersonalPanelModal" class="btn btn-outline-success btn-block" style="height:90%"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                          </div>
                        </div>
                        <table class="table table-hover">
                          <tbody>
                            <tr>
                              <th>Full name</th>
                              <td><?php echo $student_full_name; ?></td>
                            </tr>
                            <tr>
                              <th>Street address</th>
                              <td><?php echo $student_address; ?></td>
                            </tr>
                            <tr>
                              <th>District</th>
                              <td><?php echo $student_district; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div class="col-12" style="margin-top:20px">
                    <!-- Projrcts Panel -->
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-7">
                            <h4 class="card-title">My Projects</h4>
                          </div><br>
                          <div class="col-5">
                            <button type="button" data-toggle="modal" data-target=".bd-projects-modal-lg" class="btn btn-outline-success btn-block" style="height:90%"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                          </div>
                        </div>
                        <div class="list-group">
                          <?php
                            $sql_projects = "SELECT * FROM student_projects WHERE student_profile_idstudent_profile = '$student_id'";
                            $result_projects = $conn->query($sql_projects);

                            if ($result_projects->num_rows > 0) {
                                // output data of each row
                                while($row_projects = $result_projects->fetch_assoc()) {

                                  $idstudent_projects=$row_projects["idstudent_projects"];
                                  $student_projects_title=$row_projects["student_projects_title"];
                                  $student_projects_short_description=$row_projects["student_projects_short_description"];
                                  $student_projects_year=$row_projects["student_projects_year"];
                                  $student_projects_image=$row_projects["student_projects_image"];
                                  $student_projects_client=$row_projects["student_projects_client"];
                          ?>
                            <a href="#" data-toggle="modal" data-target=".bd-<?php echo $idstudent_projects; ?>-modal-lg" class="list-group-item list-group-item-action flex-column align-items-start">
                              <div class="row">
                                <div class="col-3">
                                  <img src="assets/img/projects/<?php echo $student_projects_image; ?>" width="100%" class="rounded">
                                </div>
                                <div class="col-9">
                                  <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1"><?php echo $student_projects_title; ?></h5>
                                    <small><?php echo $student_projects_year; ?></small>
                                  </div>
                                  <p class="mb-1"><?php echo $student_projects_short_description; ?></p>
                                  <small><?php echo $student_projects_client; ?></small>
                                </div>
                              </div>
                            </a>
                          <?php }
                        } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-5" style="margin-left:-25px">
                  <!-- Exam Results Panel -->
                  <div class="row">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-8">
                              <h4 class="card-title">University Accademic</h4>
                            </div>
                            <div class="col-4">
                              <button type="button" data-toggle="modal" data-target="#Uni_Acc_PanelModal" class="btn btn-outline-success btn-block" style="height:90%"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                            </div>
                          </div>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>GPA</th>
                                <th>Credits</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              $sql_university_accademic = "SELECT * FROM student_accademic_university WHERE student_id_accademic_university = '$student_id'";
                              $result_university_accademic = $conn->query($sql_university_accademic);

                              if ($result_university_accademic->num_rows > 0) {
                                  // output data of each row
                                  while($row_university_accademic = $result_university_accademic->fetch_assoc()) {

                                    $student_accademic_university_year=$row_university_accademic["student_accademic_university_year"];
                                    $student_accademic_university_semester=$row_university_accademic["student_accademic_university_semester"];
                                    $student_accademic_university_gpa=$row_university_accademic["student_accademic_university_gpa"];
                                    $student_accademic_university_credits=$row_university_accademic["student_accademic_university_credits"];
                            ?>
                              <tr>
                                <th scope="row"><?php echo $student_accademic_university_year; ?></th>
                                <td><?php echo $student_accademic_university_semester; ?></td>
                                <td><?php echo $student_accademic_university_gpa; ?></td>
                                <td><?php echo $student_accademic_university_credits; ?></td>
                              </tr>
                              <?php }
                            } ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="col-12" style="margin-top:20px">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-8">
                              <h4 class="card-title">Advanced Level Results</h4>
                            </div>
                            <div class="col-4">
                              <button type="button" data-toggle="modal" data-target="#AL_PanelModal" class="btn btn-outline-success btn-block" style="height:90%"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                            </div>
                          </div>
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th>Year</th>
                                <th>Subject</th>
                                <th>Grade</th>
                              </tr>
                            </thead>
                            <tbody>
                            <?php
                              $sql_al = "SELECT * FROM student_accademic_al WHERE student_accademic_al_profile_id = '$student_id'";
                              $result_al = $conn->query($sql_al);

                              if ($result_al->num_rows > 0) {
                                  // output data of each row
                                  while($row_al = $result_al->fetch_assoc()) {

                                    $student_accademic_al_year=$row_al["student_accademic_al_year"];
                                    $student_accademic_al_subject=$row_al["student_accademic_al_subject"];
                                    $student_accademic_al_grade=$row_al["student_accademic_al_grade"];
                                    $student_accademic_al_index=$row_al["student_accademic_al_index"];
                            ?>
                              <tr>
                                <th scope="row"><?php echo $student_accademic_al_year; ?></th>
                                <td><?php echo $student_accademic_al_subject; ?></td>
                                <td><?php echo $student_accademic_al_grade; ?></td>
                              </tr>
                              <?php }
                            } ?>
                              <tr>
                                <th colspan="3">Index No. : <?php echo $student_accademic_al_index; ?></th>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- 2nd panel -->
              <div class="col-12" style="margin-top:10px; background-color:white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding:20px;">
                <div class="row row align-items-end">
                  <div class="col-1" align="right">
                    <a href="http://zacseed.com/"><img src="assets/img/zacseed.jpg" width="60%" alt="zaxsee.com"></a>
                  </div>
                  <div class="col-10">
                    <p style="font-family: 'Open Sans Condensed', sans-serif;">This website was created and developed by <a href="https://www.facebook.com/vimukthi.sineth?ref=bookmarks">Vimukthi Sineth</a> &amp; <a href="https://www.facebook.com/heshani.bandaranayake.1">Heshani Prabodha</a> @ <a href="http://zacseed.com/">ZacSeed IT Solutions PVT LTD</a> | All rights reserved</p>
                  </div>
                </div>
              </div>

        </div>
    </div>

    <!--////////////////////////// Add / Edit Modals //////////////////////////////-->

    <!--////////// 1st Panel ///////////////////-->
      <div class="modal fade" id="1stPanelModal" tabindex="-1" role="dialog" aria-labelledby="1stPanelModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <form role="form" method="post" action="add_edit/1stPanel.php" enctype="multipart/form-data">
              <div class="modal-header">
                <h5 class="modal-title" id="1stPanelModalLabel">Add / Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">What is your Course (Ex: B.Sc. in Software Engineering)</label>
                  <input type="text" class="form-control" name="student_course" value="<?php echo $student_course; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">When did your accademic started</label>
                  <input type="date" class="form-control" name="student_accademic_start" value="<?php echo $student_accademic_start; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Profile Picture</label>
                  <input type="file" name="student_pro_pic" class="form-control-file" id="student_pro_pic">
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <!--////////// 2nd Panel ///////////////////-->
        <div class="modal fade" id="2ndPanelModal" tabindex="-1" role="dialog" aria-labelledby="2ndPanelModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form role="form" method="post" action="add_edit/2ndPanel.php">
                <div class="modal-header">
                  <h5 class="modal-title" id="2ndPanelModalLabel">Add / Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Give a straight attractive description about yourself</label>
                    <textarea rows="6" class="form-control" name="student_about" id="student_about" rows="3"><?php echo $student_about; ?></textarea>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>

        <!--////////// Personal Panel ///////////////////-->
          <div class="modal fade" id="PersonalPanelModal" tabindex="-1" role="dialog" aria-labelledby="PersonalPanelModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form role="form" method="post" action="add_edit/personalPanel.php" enctype="multipart/form-data">
                  <div class="modal-header">
                    <h5 class="modal-title" id="PersonalPanelModalLabel">Add / Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">What is your Full Name</label>
                      <input type="text" class="form-control" name="student_full_name" value="<?php echo $student_full_name; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">What is your Street Address</label>
                      <input type="text" class="form-control" name="student_address" value="<?php echo $student_address; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">What is your District</label>
                      <input type="text" class="form-control" name="student_district" value="<?php echo $student_district; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!--////////// University Accademic Panel ///////////////////-->
            <div class="modal fade" id="Uni_Acc_PanelModal" tabindex="-1" role="dialog" aria-labelledby="Uni_Acc_PanelModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">

                  <form role="form" method="post" action="add_edit/Uni_Acc_Panel_add.php" enctype="multipart/form-data">
                    <div class="modal-header">
                      <h5 class="modal-title" id="Uni_Acc_PanelModalLabel">Add new semester record</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">What is the accademic year ?</label>
                        <input type="year" class="form-control" name="accademic_year" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Which semester ?</label>
                        <input type="text" class="form-control" name="semester" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">What is your GPA this semester ?</label>
                        <input type="text" class="form-control" name="gpa" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">How many credits for the semester ?</label>
                        <input type="text" class="form-control" name="credits" id="exampleInputEmail1" aria-describedby="emailHelp">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
<!--
                  <form role="form" method="post" action="add_edit/Uni_Acc_Panel_edit.php" enctype="multipart/form-data">
                    <div class="modal-header">
                      <h5 class="modal-title" id="Uni_Acc_PanelModalLabel">Edit accademic records</h5>
                    </div>
                    <div class="modal-body">
                      <table class="table table-hover">
                        <thead>
                          <tr>
                            <th>Year</th>
                            <th>Semester</th>
                            <th>GPA</th>
                            <th>Credits</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                        /*
                          $sql_university_accademic = "SELECT * FROM student_accademic_university";
                          $result_university_accademic = $conn->query($sql_university_accademic);

                          if ($result_university_accademic->num_rows > 0) {
                              // output data of each row
                              while($row_university_accademic = $result_university_accademic->fetch_assoc()) {

                                $student_accademic_university_year=$row_university_accademic["student_accademic_university_year"];
                                $student_accademic_university_semester=$row_university_accademic["student_accademic_university_semester"];
                                $student_accademic_university_gpa=$row_university_accademic["student_accademic_university_gpa"];
                                $student_accademic_university_credits=$row_university_accademic["student_accademic_university_credits"];
                        ?>
                          <tr>
                            <th scope="row">
                              <div class="form-group">
                                <input type="text" class="form-control" name="<?php echo ; ?>" value="<?php echo $student_accademic_university_year; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </th>
                            <td>
                              <div class="form-group">
                                <input type="text" class="form-control" name="gpa" value="<?php echo $student_accademic_university_semester; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input type="text" class="form-control" name="gpa" value="<?php echo $student_accademic_university_gpa; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </td>
                            <td>
                              <div class="form-group">
                                <input type="text" class="form-control" name="gpa" value="<?php echo $student_accademic_university_credits; ?>" id="exampleInputEmail1" aria-describedby="emailHelp">
                              </div>
                            </td>
                          </tr>
                          <?php }
                        } */?>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  </form>
          -->
                </div>
              </div>
            </div>

            <!--////////// University Accademic Panel ///////////////////-->
              <div class="modal fade" id="AL_PanelModal" tabindex="-1" role="dialog" aria-labelledby="AL_PanelModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <form role="form" method="post" action="add_edit/AL_Panel_add.php" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title" id="AL_PanelModalLabel">Add a result for a subject</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">What is the year you faced the exam ?</label>
                          <input type="year" class="form-control" name="al_year" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">What is the subject ?</label>
                          <input type="text" class="form-control" name="al_subject" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">What is your Grade ?</label>
                          <input type="text" class="form-control" name="al_grade" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">What was your index No. ?</label>
                          <input type="text" class="form-control" name="al_index" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

            <!--////////// Projects Panel ///////////////////-->
              <div class="modal fade bd-projects-modal-lg" id="ProjectsPanelModal" tabindex="-1" role="dialog" aria-labelledby="ProjectsPanelModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <form role="form" method="post" action="add_edit/ProjectsPanel.php" enctype="multipart/form-data">
                      <div class="modal-header">
                        <h5 class="modal-title" id="ProjectsPanelModalLabel">Add a new project</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Project title</label>
                          <input type="text" class="form-control" name="student_projects_title" placeholder="Project title" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Give a short description for your project</label>
                          <input type="text" class="form-control" name="student_projects_short_description" placeholder="Short description" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">More details of your project</label>
                          <textarea rows="6" class="form-control" name="student_projects_description" id="student_about" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Project Year</label>
                          <input type="year" class="form-control" name="student_projects_year" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlFile1">A picture for the poject logo</label>
                          <input type="file" name="student_projects_image" class="form-control-file" id="student_pro_pic">
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-4">
                              <label for="exampleFormControlFile1">Additional pictures</label>
                              <input type="file" name="student_projects_img1" class="form-control-file" id="student_pro_pic">
                            </div>
                            <div class="col-4">
                              <label for="exampleFormControlFile1">Additional pictures</label>
                              <input type="file" name="student_projects_img2" class="form-control-file" id="student_pro_pic">
                            </div>
                            <div class="col-4">
                              <label for="exampleFormControlFile1">Additional pictures</label>
                              <input type="file" name="student_projects_img3" class="form-control-file" id="student_pro_pic">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Was your project done for a client? If yes, mention it here</label>
                          <input type="text" class="form-control" name="student_projects_client" placeholder="Client name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Was your project done for an institution? If yes, mention it here</label>
                          <input type="text" class="form-control" name="student_projects_institution" placeholder="Institution name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">What was the Budget ?</label>
                          <input type="text" class="form-control" name="student_projects_budjet" placeholder="Budget" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Link to your project</label>
                          <input type="text" class="form-control" name="student_projects_link" placeholder="http://example.com/" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Project superviser</label>
                          <input type="text" class="form-control" name="student_projects_superviser" placeholder="Superviser name" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Project superviser Contact</label>
                          <input type="text" class="form-control" name="student_projects_superviser_contact" placeholder="Superviser's Phone number or Email" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

<!--/////////////////////////////////////////////// Projects View /////////////////////////////////////////////////////////////-->
<?php
  $sql_projects = "SELECT * FROM student_projects WHERE student_profile_idstudent_profile = '$student_id'";
  $result_projects = $conn->query($sql_projects);

  if ($result_projects->num_rows > 0) {
      // output data of each row
      while($row_projects = $result_projects->fetch_assoc()) {

        $idstudent_projects=$row_projects["idstudent_projects"];
        $student_projects_title=$row_projects["student_projects_title"];
        $student_projects_short_description=$row_projects["student_projects_short_description"];
        $student_projects_year=$row_projects["student_projects_year"];
        $student_projects_image=$row_projects["student_projects_image"];
        $student_projects_client=$row_projects["student_projects_client"];
        $student_projects_institution=$row_projects["student_projects_institution"];
        $student_projects_description=$row_projects["student_projects_description"];
        $student_projects_img1=$row_projects["student_projects_img1"];
        $student_projects_img2=$row_projects["student_projects_img2"];
        $student_projects_img3=$row_projects["student_projects_img3"];
        $student_projects_budjet=$row_projects["student_projects_budjet"];
        $student_projects_link=$row_projects["student_projects_link"];
        $student_projects_superviser=$row_projects["student_projects_superviser"];
        $student_projects_superviser_contact=$row_projects["student_projects_superviser_contact"];
?>

            <div class="modal fade bd-<?php echo $idstudent_projects; ?>-modal-lg" id="ProjectsPanelModal" tabindex="-1" role="dialog" aria-labelledby="ProjectsPanelModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <form role="form" method="post" action="add_edit/ProjectsPanel.php" enctype="multipart/form-data">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ProjectsPanelModalLabel"><?php echo $student_projects_title; ?></h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="row">
                        <div class="col-3">
                          <img src="assets/img/projects/<?php echo $student_projects_image; ?>" width="100%" alt="">
                        </div>
                        <div class="col-9">
                          <h1 style="font-family: 'Germania One', cursive;"><?php echo $student_projects_title; ?></h1>
                          <p style="font-family: 'Quicksand', sans-serif; font-size:20px;"><?php echo $student_projects_short_description; ?></p>
                          <p style="font-family: 'Quicksand', sans-serif; font-size:20px; color:grey;"><?php echo $student_projects_year; ?></p>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-12">
                          <p style="font-family: 'Abel', sans-serif; font-size:18px"><?php echo $student_projects_description; ?></p>
                          <a href="<?php echo $student_projects_link; ?>"><p style="font-family: 'Abel', sans-serif; font-size:18px"><?php echo $student_projects_link; ?></p></a>
                        </div>
                      </div>
                      <hr>
                      <div class="row">
                        <div class="col-4">
                          <img width="100%" src="assets/img/projects/projects_img/<?php echo $student_projects_img1; ?>" alt="">
                        </div>
                        <div class="col-4">
                          <img width="100%" src="assets/img/projects/projects_img/<?php echo $student_projects_img2; ?>" alt="">
                        </div>
                        <div class="col-4">
                          <img width="100%" src="assets/img/projects/projects_img/<?php echo $student_projects_img3; ?>" alt="">
                        </div>
                      </div>
                      <hr>
                      <div class="row" style="margin-top:15px">
                        <div class="col-6">
                          <p style="font-family: 'Abel', sans-serif; font-size:18px">The Client : <?php echo $student_projects_client; ?></p>
                        </div>
                        <div class="col-6">
                          <p style="font-family: 'Abel', sans-serif; font-size:18px">The Institution : <?php echo $student_projects_institution; ?></p>
                        </div>
                      </div>
                    <?php
                    if ($student_projects_budjet>0) {
                      ?>
                      <hr>
                      <div class="row">
                        <div class="col-12">
                          <p style="font-family: 'Orbitron', sans-serif; font-size:30px;">The Budget : <?php echo $student_projects_budjet; ?> /-</p>
                        </div>
                      </div>
                      <?php
                    }
                     ?>
                     <hr>
                     <div class="row">
                       <div class="col-6">
                         <p style="font-family: 'Quicksand', sans-serif; font-size:20px;">The Superviser : <?php echo $student_projects_superviser; ?></p>
                       </div>
                       <div class="col-6">
                         <p style="font-family: 'Quicksand', sans-serif; font-size:20px;">The Superviser Contact : <?php echo $student_projects_superviser_contact; ?></p>
                       </div>
                     </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

<?php }
} ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="../vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="../vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
  </body>
  </html>
