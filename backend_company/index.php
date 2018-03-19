<?php
session_start();
require_once('../db/dbconn.php');

$company_email=$_SESSION['email'];
$_SESSION['email']=$company_email;

/////////////////////////////////////////Student details//////////////////////////////////////////////
$sql_company = "SELECT * FROM company_profile WHERE company_profile_email = '$company_email'";
$result_company = $conn->query($sql_company);

//// Table : student_profile ////
      if ($result_company->num_rows > 0) {
          // output data of each row
          while($row_company_profile = $result_company->fetch_assoc()) {
            $company_profile_name=$row_company_profile["company_profile_name"];
            $company_profile_slogon=$row_company_profile["company_profile_slogon"];
            $company_profile_propic=$row_company_profile["company_profile_propic"];
            $company_profile_about=$row_company_profile["company_profile_about"];
            $company_profile_linkedin=$row_company_profile["company_profile_linkedin"];
            $company_profile_facebook=$row_company_profile["company_profile_facebook"];
            $company_profile_gplus=$row_company_profile["company_profile_gplus"];
            $company_profile_twitter=$row_company_profile["company_profile_twitter"];
            $company_profile_website=$row_company_profile["company_profile_website"];
            $company_profile_location=$row_company_profile["company_profile_location"];
            $company_profile_since=$row_company_profile["company_profile_since"];
            $idcompany_profile=$row_company_profile["idcompany_profile"];
            $company_profile_hq=$row_company_profile["company_profile_hq"];
            $company_profile_hq_contact=$row_company_profile["company_profile_hq_contact"];
          }
      }
$_SESSION['id']=$idcompany_profile;


   $sql_vacancy = "SELECT * FROM company_vacancy WHERE company_profile_idcompany_profile = '$idcompany_profile'";
   $result_vacancy = $conn->query($sql_vacancy);

   $vacancy_count=0;
   //// Table : student_profile ////
         if ($result_vacancy->num_rows > 0) {
             // output data of each row
             while($row_vacancy = $result_vacancy->fetch_assoc()) {
               $vacancy_count++;
             }
           }

    $sql_st_count = "SELECT * FROM student_profile";
    $result_st_count = $conn->query($sql_st_count);

      $student_count=0;
       //// Table : student_profile ////
           if ($result_st_count->num_rows > 0) {
             // output data of each row
             while($row_st_count = $result_st_count->fetch_assoc()) {
               $student_count++;
            }
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
	<!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.fa {
  padding: 5px;                   ///Social media icons///
  font-size: 16px;
  width: 8%;
  text-align: center;
  text-decoration: none;
  margin-left: 5px;
  margin-right: 3px;
  border-radius: 80%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook {
  background: #3B5998;
  color: white;
}

.fa-twitter {
  background: #55ACEE;
  color: white;
}

      .fa-google {
      background: #dd4b39;
      color: white;
    }

      .fa-linkedin {
      background: #007bb5;
      color: white;
    }
    .fa-linkedin {
      background: #007bb5;
      color: white;
    }
    a:visited {     /*contact us panel-link*/
    color: blue;
    }


    </style>
  </head>
  <body background="assets/img/pattern.jpg">
    <nav class="navbar navbar navbar-dark bg-primary">
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
             <div class="col-12" style="padding-top:20px; padding-bottom:20px; padding-right:5px; padding-left:5px;">
               <div class="card">
                 <div class="card-body">
                   <div class="row">
                     <div class="col-2">
                        <img src="assets/img/profile_pics/<?php echo $company_profile_propic; ?>" style="margin-left:50px" width="100%">
                     </div>
                     <div class="col-6" style="padding-top:40px; font-size:20px; margin-left:70px;">
                      <h2 style="text-align:center"><?php echo $company_profile_name; ?></h2>
                      <p style="text-align:center"><?php echo $company_profile_slogon; ?></p>
                     </div>
                   </div>
                   <div class="row">
                     <div class="col-4" style="margin-left:50px; margin-top:10px; margin-bottom:15px">
                       <a style="text-decoration:none" href="<?php echo $company_profile_facebook; ?>" class="fa fa-facebook"></a>
                       <a style="text-decoration:none" href="<?php echo $company_profile_twitter; ?>" class="fa fa-twitter"></a>
                       <a style="text-decoration:none" href="<?php echo $company_profile_gplus; ?>" class="fa fa-google"></a>
                       <a style="text-decoration:none" href="<?php echo $company_profile_linkedin; ?>" class="fa fa-linkedin"></a>
                     </div>
                     <div class="col-2" style="padding-top:20px; padding-right:5px; margin-left:450px; margin-bottom:15px;">
                       <button type="button" data-toggle="modal" data-target="#1stPanelModal" class="btn btn-outline-success btn-sm btn-block" style="margin-right"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                     </div>
                   </div>
                 </div>
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
                         <button type="button" data-toggle="modal" data-target="#PostVacancyPanelModal" class="btn btn-outline-primary btn-lg btn-block">Post a Vacancy</button>
                       </a>
                     </div>
                     <div class="col">
                       <a href="#" style="text-decoration:none;">
                         <button type="button" data-toggle="modal" data-target=".bd-VacancyView-modal-lg" class="btn btn-outline-success btn-lg btn-block">My Vacancies <span class="badge badge-success"><?php echo $vacancy_count; ?></span></button>
                       </a>
                     </div>
                     <div class="col">
                       <a href="#" style="text-decoration:none;">
                         <button type="button" class="btn btn-outline-warning btn-lg btn-block">Applications <span class="badge badge-warning">12</span></button>
                       </a>
                     </div>
                     <div class="col">
                       <a href="#" style="text-decoration:none;">
                         <button type="button" data-toggle="modal" data-target=".bd-UsersView-modal-lg" class="btn btn-outline-danger btn-lg btn-block">Browse Users <span class="badge badge-danger"><?php echo $student_count; ?></span></button>
                       </a>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>


            <!-- 2nd panel -->
            <div class="container"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:10px; background-color:white; padding-top:5px; padding-bottom:5px; padding-right:20px">
              <div class="row">
                <!--About us panel-->
                <div class="col-6" style="padding-top:10px; padding-bottom:15px; padding-right:10px; padding-left:20px; margin-bottom:1px">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-5">
                        <h4 class="card-title">About us</h4>
                        </div>
                      </div>
                      <div class="row" style="margin-left:2px">
                        <p style=" font-size:16px; color:#383535;">
                          <?php echo $company_profile_about; ?>
                       </p>
                      </div>
                      <div class="row" style="margin-right:2px; margin-bottom:1px;">
                        <button type="button" data-toggle="modal" data-target="#aboutPanelModal" class="btn btn-outline-success btn-sm btn" style="margin-left:400px; margin-bottom:5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                      </div>

                    </div>
                  </div>
                </div>
                <!--Contact us panel-->
                <div class="col-6" style="padding-top:10px;padding-bottom:10px; padding-left:1px;">
                    <div class="card">
                      <div class="card-body">
                        <div class="row">
                          <div class="col-6">
                            <h4 class="card-title">Contact us</h4>
                           </div>
                          </div>
                        <div class="row" style="margin-left:2px">
                          <table>
                            <th>Our Head Office</th>
                            <tr>
                              <td><i class="fa fa-map-marker"aria-hidden="true"></i><?php echo $company_profile_hq; ?></td>
                            </tr>
                            <tr>
                              <td><i class="fa fa-phone"></i><?php echo $company_profile_hq_contact; ?></td>
                            </tr>
                          </table>
                        </div>
                        <br>
                        <div class="row" style="margin-left:2px">
                          <h6>More details</h6>
                        </div>
                        <div class="row" style="margin-left:2px">
                          <a style="text-decoration:none" href="<?php echo $company_profile_website; ?>"><?php echo $company_profile_website; ?></a>  <!--Link for more details-->
                        </div>
                        <div class="row">
                        <div class="col-3"tyle="margin-left:50px">
                          <button type="button" data-toggle="modal" data-target="#contactPanelModal" class="btn btn-outline-success btn-sm btn-block" style="margin-left:400px; margin-bottom:5px;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                        </div>
                        </div>
                      </div>
                    </div>
                </div>

              </div>
            </div>
          </div>
        </div>



            <!-- 3rd panel -->

            <div class="container"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:10px; background-color:white; padding:0px;">
              <div class="row">
                <!--Executives panel-->
                <div class="col-7" style="padding-top:20px; padding-bottom:20px; padding-right:10px; padding-left:35px;">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-6">
                          <h4 class="card-title">Executives</h4>
                        </div>
                        <div class="col-4" style="margin-left:50px;">
                          <button type="button" data-toggle="modal" data-target="#exePanelModal" class="btn btn-outline-success btn-sm btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                        </div>
                      </div>
                      <!--Scroll window-->
                      <div class="scroll" style="overflow: auto; height:400px; width:100%;">
                        <div class="row" style="margin-top:5px;">
                      <?php
                        $sql_exe = "SELECT * FROM company_profile_executives WHERE company_profile_idcompany_profile = '$idcompany_profile'";
                        $result_exe = $conn->query($sql_exe);

                        //// Table : student_profile ////
                              if ($result_exe->num_rows > 0) {
                                  // output data of each row
                                  while($row_exe = $result_exe->fetch_assoc()) {
                                    $company_profile_executives_name=$row_exe["company_profile_executives_name"];
                                    $company_profile_executives_position=$row_exe["company_profile_executives_position"];
                                    $company_profile_executives_contact=$row_exe["company_profile_executives_contact"];
                        ?>

                          <div class="col-4" style="margin-top:10px;">
                            <div class="card"style="box-shadow:0 4px 8px 0 rgba(0, 0, 0, 0.2); max-width:90%; height:360px; margin: auto;text-align: center;font-family: arial; margin-left:10px;margin-right:0px">
                              <div class="card-body">
                                <img src="assets/img/profile_pics/ppd.jpg" alt="John" style="width:100%">
                                <h7><?php echo $company_profile_executives_name; ?></h7><hr>
                                <p><?php echo $company_profile_executives_position; ?></p>
                                <a href="<?php echo $company_profile_executives_contact; ?>">
                                  <button type="button" class="btn btn-info">Contact</button>
                                </a>
                              </div>
                            </div>
                          </div>

                        <?php
                                  }
                              }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!--Vacancies panel-->
                <div class="col-5" style="padding-top:20px; padding-bottom:10px; padding-right:35px; padding-left:5px;">
                  <div class="card">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-8">
                          <h4 class="card-title">Vacancies</h4>
                        </div>
                      </div>
                        <div style="overflow: auto; height:400px; width:100%;">
                          <div class="row">
                            <table class="table table-hover" style="margin-left:5px;">
                              <thead>
                                <tr>
                                  <th>Possition</th>
                                  <th>Salary</th>
                                  <th>Persons</th>
                                  <th>Status</th>
                                  </tr>
                                </thead>
                              <tbody>
                                <?php
                                  $sql_vacancy = "SELECT * FROM company_vacancy WHERE company_profile_idcompany_profile = '$idcompany_profile'";
                                  $result_vacancy = $conn->query($sql_vacancy);

                                  //// Table : student_profile ////
                                        if ($result_vacancy->num_rows > 0) {
                                            // output data of each row
                                            while($row_vacancy = $result_vacancy->fetch_assoc()) {
                                              $company_vacancy_position=$row_vacancy["company_vacancy_position"];
                                              $company_vacancy_sallary=$row_vacancy["company_vacancy_sallary"];
                                              $company_vacancy_count=$row_vacancy["company_vacancy_count"];
                                              $company_vacancy_status=$row_vacancy["company_vacancy_status"];
                                  ?>

                              <tr>
                                <td><?php echo $company_vacancy_position; ?></td>
                                <td>LKR <?php echo $company_vacancy_sallary; ?>.00</td>
                                <td><?php echo $company_vacancy_count ?></td>
                                  <?php
                                  if ($company_vacancy_status==0) {
                                    echo "<td><button type='button' class='btn btn-success'>Available</button></td>";
                                  }
                                  else {
                                    echo "<td><button type='button' class='btn btn-danger'>Expired</button></td>";
                                  }
                                   ?>

                              </tr>

                              <?php
                            }
                          } ?>

                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--4th panel-->
            <div class="container"style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); margin-top:10px; background-color:white; padding:5px;">
              <div class="row"style="padding-top:15px; padding-bottom:10px; padding-right:10px; padding-left:15px;">
                <div class="col-8"><!--Awards and recongition panel-->
                  <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Awards and recognitions</h4>
                        <table class="table table-hover">
                          <thead>
                            <tr>
                              <th>Year</th>
                              <th>Award/recognition</th>
                              <th>catogory</th>
                              <th>Recognized by</th>
                              <th>venue</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $sql_recognitions = "SELECT * FROM company_recognitions WHERE company_profile_idcompany_profile = '$idcompany_profile'";
                              $result_recognitions = $conn->query($sql_recognitions);

                              //// Table : student_profile ////
                                    if ($result_recognitions->num_rows > 0) {
                                        // output data of each row
                                        while($row_recognitions = $result_recognitions->fetch_assoc()) {
                                          $company_recognitions_author=$row_recognitions["company_recognitions_author"];
                                          $company_recognitions_title=$row_recognitions["company_recognitions_title"];
                                          $company_recognitions_content=$row_recognitions["company_recognitions_content"];
                                          $company_recognitions_year=$row_recognitions["company_recognitions_year"];
                                          $company_recognitions_venue=$row_recognitions["company_recognitions_venue"];
                              ?>
                            <tr>
                              <td><?php echo $company_recognitions_year; ?></td>
                              <td><?php echo $company_recognitions_title; ?></td>
                              <td><?php echo $company_recognitions_content; ?></td>
                              <td><?php echo $company_recognitions_author; ?></td>
                              <td><?php echo $company_recognitions_venue; ?></td>
                      <?php }
                    } ?>
                            </tr>
                          </tbody>
                        </table>
                        <div class="row">
                          <button type="button" data-toggle="modal" data-target="#recognitionsPanelModal" class="btn btn-outline-success btn-sm btn" style="margin-left:460px; margin-bottom:3px; padding:2px 20px "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                        </div>
                    </div>
                  </div>
                </div>

              <!--Our branches panel-->
              <div class="col-4" style="margin-left:-15px">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Our Branches</h4>
                    <ul style="list-style: none;">
                      <?php
                        $sql_branches = "SELECT * FROM company_branches WHERE company_branches_idcompany = '$idcompany_profile'";
                        $result_branches = $conn->query($sql_branches);

                              if ($result_branches->num_rows > 0) {
                                  // output data of each row
                                  while($row_branches = $result_branches->fetch_assoc()) {
                                    $company_branches_name=$row_branches["company_branches_name"];
                                    $idcompany_branches=$row_branches["idcompany_branches"];
                        ?>
                      <li style="margin-bottom:2px;"><i class="fa fa-map-marker"aria-hidden="true"></i><?php echo $company_branches_name; ?> <button type="button" data-toggle="modal" data-target="#<?php echo $idcompany_branches;?>BranchPanelModal" class="btn btn-primary btn-sm">Details</button></li>
              <?php }
            } ?>
                    </ul>
                    <div class="row">
                      <button type="button" data-toggle="modal" data-target="#BranchesAddPanelModal" class="btn btn-outline-success btn-sm btn" style="margin-left:150px; margin-bottom:5px; padding:2px 20px "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Add / Edit</button>
                    </div>
                  </div>
                </div>
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
            <form role="form" method="post" action="add_edit/1stPanel.php">
              <div class="modal-header">
                <h5 class="modal-title" id="1stPanelModalLabel">Add / Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Name</label>
                  <input type="text" class="form-control" name="company_profile_name" value="<?php echo $company_profile_name; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Company Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Company Slogon</label>
                  <input type="text" class="form-control" name="company_profile_slogon" value="<?php echo $company_profile_slogon; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Slogon">
                </div>
                <div class="form-group">
                  <label for="exampleFormControlFile1">Profile Picture</label>
                  <input type="file" name="student_pro_pic" class="form-control-file" id="student_pro_pic">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Facebook</label>
                  <input type="text" class="form-control" name="company_profile_facebook" value="<?php echo $company_profile_facebook; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Facebook Link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Twitter</label>
                  <input type="text" class="form-control" name="company_profile_twitter" value="<?php echo $company_profile_twitter; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Twitter Link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Google Plus</label>
                  <input type="text" class="form-control" name="company_profile_gplus" value="<?php echo $company_profile_gplus; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Google + Link">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Linkedin</label>
                  <input type="text" class="form-control" name="company_profile_linkedin" value="<?php echo $company_profile_linkedin; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Linkedin Link">
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

      <!--////////// About Us Panel ///////////////////-->
        <div class="modal fade" id="aboutPanelModal" tabindex="-1" role="dialog" aria-labelledby="aboutPanelModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <form role="form" method="post" action="add_edit/2ndPanel.php">
                <div class="modal-header">
                  <h5 class="modal-title" id="aboutPanelModalLabel">Add / Edit</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Give a description about your Company</label>
                    <textarea name="about_us" class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $company_profile_about; ?></textarea>
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

        <!--////////// Contact Panel ///////////////////-->
          <div class="modal fade" id="contactPanelModal" tabindex="-1" role="dialog" aria-labelledby="contactPanelModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form role="form" method="post" action="add_edit/contactPanel.php">
                  <div class="modal-header">
                    <h5 class="modal-title" id="contactPanelModalLabel">Add / Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Head Office</label>
                      <input type="text" class="form-control" name="company_profile_hq" value="<?php echo $company_profile_hq; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Head Office Address">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Head Office Tele :</label>
                      <input type="text" class="form-control" name="company_profile_hq_contact" value="<?php echo $company_profile_hq_contact; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Head Office tele.">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Website</label>
                      <input type="text" class="form-control" name="company_profile_website" value="<?php echo $company_profile_website; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Company Website">
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

          <!--////////// Executives Panel ///////////////////-->
            <div class="modal fade" id="exePanelModal" tabindex="-1" role="dialog" aria-labelledby="exePanelModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form role="form" method="post" action="add_edit/exePanel.php">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exePanelModalLabel">Add / Edit</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Executive's name</label>
                        <input type="text" class="form-control" name="company_profile_executives_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Executive's name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Position</label>
                        <input type="text" class="form-control" name="company_profile_executives_position" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Executive's Position">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Facebook / Linkedin Profile</label>
                        <input type="text" class="form-control" name="company_profile_executives_contact" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Link here">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlFile1">Profile Picture</label>
                        <input type="file" name="file" class="form-control-file" id="file">
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

            <!--////////// Recognitions Panel ///////////////////-->
              <div class="modal fade" id="recognitionsPanelModal" tabindex="-1" role="dialog" aria-labelledby="recognitionsPanelModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <form role="form" method="post" action="add_edit/RecognitionsPanel.php">
                      <div class="modal-header">
                        <h5 class="modal-title" id="recognitionsPanelModalLabel">Add / Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleInputEmail1">Year</label>
                          <input type="year" class="form-control" name="company_recognitions_year" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="year">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Award / Recognitions</label>
                          <input type="text" class="form-control" name="company_recognitions_title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">What was it about ?</label>
                          <input type="text" class="form-control" name="company_recognitions_content" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Catagory">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Recognized By</label>
                          <input type="text" class="form-control" name="company_recognitions_author" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Recognized by">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Venue</label>
                          <input type="text" class="form-control" name="company_recognitions_venue" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Venue">
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

              <!--////////// Branches Panels ///////////////////-->
              <?php
                $sql_branches = "SELECT * FROM company_branches WHERE company_branches_idcompany = '$idcompany_profile'";
                $result_branches = $conn->query($sql_branches);

                      if ($result_branches->num_rows > 0) {
                          // output data of each row
                          while($row_branches = $result_branches->fetch_assoc()) {
                            $company_branches_name=$row_branches["company_branches_name"];
                            $company_branches_address=$row_branches["company_branches_address"];
                            $company_branches_tele=$row_branches["company_branches_tele"];
                            $idcompany_branches=$row_branches["idcompany_branches"];
                ?>
                <div class="modal fade" id="<?php echo $idcompany_branches;?>BranchPanelModal" tabindex="-1" role="dialog" aria-labelledby="<?php echo $idcompany_branches;?>BranchPanelModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form role="form">
                        <div class="modal-header">
                          <h5 class="modal-title" id="<?php echo $idcompany_branches;?>BranchPanelModalLabel">Branch information</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h3><?php echo $company_branches_name; ?></h3>
                          <hr>
                          <h5>Address : <?php echo $company_branches_address; ?></h5>
                          <h5>Contact : <?php echo $company_branches_tele; ?></h5>
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


        <!--////////// Branches Add Panel ///////////////////-->
          <div class="modal fade" id="BranchesAddPanelModal" tabindex="-1" role="dialog" aria-labelledby="BranchesAddPanelModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form role="form" method="post" action="add_edit/BranchesAddPanel.php">
                  <div class="modal-header">
                    <h5 class="modal-title" id="BranchesAddPanelModalLabel">Add / Edit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Branch Name</label>
                      <input type="text" class="form-control" name="company_branches_name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Branch Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Branch Tele.</label>
                      <input type="text" class="form-control" name="company_branches_tele" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Branch Tele.">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Branch Address</label>
                      <input type="text" class="form-control" name="company_branches_address" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Branch Address">
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

          <!--////////// Post Vacancy Panel ///////////////////-->
            <div class="modal fade" id="PostVacancyPanelModal" tabindex="-1" role="dialog" aria-labelledby="PostVacancyPanelModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form role="form" method="post" action="add_edit/PostVacancyPanel.php">
                    <div class="modal-header">
                      <h5 class="modal-title" id="PostVacancyPanelModalLabel">Post a Vacancy</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Position</label>
                        <input type="text" class="form-control" name="company_vacancy_position" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Position">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Sallary</label>
                        <input type="text" class="form-control" name="company_vacancy_sallary" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sallary">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Branch</label>
                        <input type="text" class="form-control" name="company_vacancy_branch" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Branch">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">How many employees do you want ?</label>
                        <input type="text" class="form-control" name="company_vacancy_count" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter a number">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Adiitional Details, Requirements and etc.</label>
                        <textarea class="form-control" name="company_vacancy_additional" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Vacancy Catagory</label>
                        <select class="form-control" name="company_vacancy_catagory" id="exampleFormControlSelect1">
                          <option value="IT, Software Engineering, Computing etc.">IT, Software Engineering, Computing etc.</option>
                          <option value="Managment, Accountant etc">Managment, Accountant etc</option>
                          <option value="Administration and HR">Administration and HR</option>
                          <option value="Research">Research</option>
                          <option value="Public Relations">Public Relations</option>
                          <option value="Law">Law</option>
                          <option value="Engineering and Technicals">Engineering and Technicals</option>
                          <option value="Healthcare">Healthcare</option>
                          <option value="Agriculture">Agriculture</option>
                          <option value="Language experts">Language experts</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlSelect1">Expert Level</label>
                        <select class="form-control" name="company_vacancy_level" id="exampleFormControlSelect1">
                          <option value="Trainee">Trainee</option>
                          <option value="Trained beginer">Trained beginer</option>
                          <option value="Experianced">Experianced</option>
                          <option value="Expert">Expert</option>
                        </select>
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


            <!--/////////////////////// Vacancy View modal ////////////////////////////-->
            <div class="modal fade bd-VacancyView-modal-lg" tabindex="-1" role="dialog" aria-labelledby="VacancyViewModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Position</th>
                        <th>Sallary</th>
                        <th>Branch</th>
                        <th>No. of employees</th>
                        <th>Additional Details</th>
                        <th>Catagory</th>
                        <th>Expert Level</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        $sql_vacancy = "SELECT * FROM company_vacancy WHERE company_profile_idcompany_profile = '$idcompany_profile'";
                        $result_vacancy = $conn->query($sql_vacancy);
                        $count=0;
                              if ($result_vacancy->num_rows > 0) {
                                  // output data of each row
                                  while($row_vacancy = $result_vacancy->fetch_assoc()) {
                                    $company_vacancy_position=$row_vacancy["company_vacancy_position"];
                                    $company_vacancy_count=$row_vacancy["company_vacancy_count"];
                                    $company_vacancy_sallary=$row_vacancy["company_vacancy_sallary"];
                                    $company_vacancy_branch=$row_vacancy["company_vacancy_branch"];
                                    $company_vacancy_additional=$row_vacancy["company_vacancy_additional"];
                                    $company_vacancy_status=$row_vacancy["company_vacancy_status"];
                                    $company_vacancy_catagory=$row_vacancy["company_vacancy_catagory"];
                                    $company_vacancy_level=$row_vacancy["company_vacancy_level"];
                                    $count++;
                        ?>
                      <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $company_vacancy_position; ?></td>
                        <td><?php echo $company_vacancy_sallary; ?></td>
                        <td><?php echo $company_vacancy_branch; ?></td>
                        <td><?php echo $company_vacancy_count; ?></td>
                        <td><?php echo $company_vacancy_additional; ?></td>
                        <td><?php echo $company_vacancy_catagory; ?></td>
                        <td><?php echo $company_vacancy_level; ?></td>
                      </tr>
                    <?php
                  }
                } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <!--/////////////////////// Users View modal ////////////////////////////-->
            <div class="modal fade bd-UsersView-modal-lg" tabindex="-1" role="dialog" aria-labelledby="UsersViewModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Profile Picture</th>
                        <th>Name</th>
                        <th>University</th>
                        <th>Course</th>
                        <th>From</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                        $sql_users = "SELECT * FROM student_profile";
                        $result_users = $conn->query($sql_users);
                              if ($result_users->num_rows > 0) {
                                  // output data of each row
                                  while($row_users = $result_users->fetch_assoc()) {
                                    $user_pic=$row_users["student_pro_pic"];
                                    $user_name=$row_users["student_first_name"]." ".$row_users["student_last_name"];
                                    $user_university=$row_users["student_university"];
                                    $user_course=$row_users["student_course"];
                                    $user_from=$row_users["student_district"];
                                    $user_email=$row_users["student_email"];
                        ?>
                      <tr>
                        <th scope="row"><img src="../backend_user/assets/img/profile_pics/<?php echo $user_pic; ?>" alt="" width="50px"></th>
                        <td><?php echo $user_name; ?></td>
                        <td><?php echo $user_university; ?></td>
                        <td><?php echo $user_course; ?></td>
                        <td><?php echo $user_from ?></td>
                        <td><a target="_blank" style="text-decoration:none" href="../front_end_user/index.php?visit_email=<?php echo $user_email; ?>"><button type="button" class="btn btn-info">Visit Profile</button></a></td>
                      </tr>
                    <?php
                  }
                } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

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
