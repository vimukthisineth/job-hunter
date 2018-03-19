<?php
session_start();
require_once('../db/dbconn.php');

$company_email=$_GET['email'];
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
                        <img src="../backend_company/assets/img/profile_pics/<?php echo $company_profile_propic; ?>" style="margin-left:50px" width="100%">
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
                                <img src="../backend_company/assets/img/profile_pics/ppd.jpg" alt="John" style="width:100%">
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
                  </div>
                </div>
              </div>
            </div>
          </div>
              </div>
            </div>
    <!--////////////////////////// Add / Edit Modals //////////////////////////////-->

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


      <div class="col-12" style="margin-top:10px; background-color:white; box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); padding:20px;">
        <div class="row row align-items-end">
          <div class="col-1" align="right">
            <a href="http://zacseed.com/"><img src="../backend_company/assets/img/zacseed.jpg" width="60%" alt="zaxsee.com"></a>
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
