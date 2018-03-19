<?php
session_start();
  $email= $_POST['email'];
  $pwd= $_POST['pwd'];

require_once('db/dbconn.php');

$sql = "SELECT * FROM student_profile WHERE student_email = '$email'";
$result = $conn->query($sql);

$sql_company_profile = "SELECT * FROM company_profile WHERE company_profile_email = '$email'";
$result_company_profile = $conn->query($sql_company_profile);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $r_pwd=$row["pwd"];
        $account_active=$row["account_active"];

        if ($pwd==$r_pwd) {
          if ($account_active==1) {
            $_SESSION['email']=$email;
            header('Location: backend_user/index.php');
            die();
          }
          else {
            $_SESSION['email']=$email;
            header('Location: account_not_activated.php');
            die();
          }
        }
        else {
          $message="The password you entered is wrong !";
        }
    }
}
else if ($result_company_profile->num_rows > 0) {
  while($row_company_profile = $result_company_profile->fetch_assoc()) {
      $r_company_pwd=$row_company_profile["company_profile_pwd"];
      $account_active_company=$row_company_profile["company_profile_active"];

      if ($pwd==$r_company_pwd) {
        if ($account_active_company==1) {
          $_SESSION['email']=$email;
          header('Location: backend_company/index.php');
          die();
        }
        else {
          $_SESSION['email']=$email;
          header('Location: company_account_not_activated.php');
          die();
        }
      }
      else {
        $message="The password you entered is wrong !";
      }
  }
}
else {
  $message="You haven't registered yet. Please Sign-up";
}

$conn->close();
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Job Hunter</title>
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  	  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="css/style.css">
      <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
      <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
      <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
  	<!-- Plugin CSS -->
      <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">
   </head>
   <body>

     <div class="row">
       <!-- intro area -->
       <div class="col-md-7" style="height: 100vh;" id="grad_intro">
         <br>
         <div class="row">
           <div class="col-1">

           </div>
           <div class="col-4">
             <!-- Social Buttons -->
             <div class="row">
               <div class="col-1" align="center">
                 <a href="#"><i class="fa fa-facebook-square fa-lg fbhover" aria-hidden="true" style="color:white"></i></a>
               </div>
               <div class="col-1" align="center">
                 <a href="#"><i class="fa fa-linkedin-square fa-lg fbhover" aria-hidden="true" style="color:white"></i></a>
               </div>
               <div class="col-1" align="center">
                 <a href="#"><i class="fa fa-google-plus-square fa-lg fbhover" aria-hidden="true" style="color:white"></i></a>
               </div>
             </div>
           </div>
         </div>
         <br><br><br><br><br><br><br><br>
         <!-- Intro body -->
         <div class="row">
           <div class="col-md-3">

           </div>
           <div class="col-9">
             <p style="color:white; font-family: 'Raleway', sans-serif;">Welcome to the</p>
             <H1 style="color:white">Job | Hunter</H1>
             <hr class="colorgraph">
             <br><br>
             <p style="color:white; font-family: 'Open Sans Condensed', sans-serif;">The ultimate hive of industry and job hunting. Get yourself in the world of <br>job hunting and find a perfect pray</p>
           </div>
         </div>
         <br><br><br><br><br><br>
         <div class="row">
           <div class="col-11">
               <p style="color:white; font-size:10px; font-family: 'PT Sans Narrow', sans-serif;">A product of &copy; Zacseed IT Soutions | All rights reserved | <a href="http://zacseed.com/">zacseed.com</a></p>
           </div>
         </div>
       </div>
       <!-- sign up area -->
       <div class="col-md-5" style="height: 100vh;">
         <!-- Home button -->
         <br>
         <div class="row justify-content-end">
           <div class="col-3">
             <a href="index.html">
             <button type="button" class="btn btn-outline-info" style="border-radius:15px 15px 15px 15px">Home</button>
           </a>
           </div>
         </div>
         <br><br><br><br><br>
         <div class="row align-items-center">
           <div class="col-1">

           </div>
           <div class="col-10">
             <div class="card">
               <div class="card-header">
                  Something is wrong
               </div>
               <div class="card-body">
                 <h5 class="card-title" style="color:red;"><?php echo $message; ?></h5>
                 <hr>
                   <div class="row">
                    <a href="index.html">
             				    <div class="col-xs-12 col-md-12"><input type="submit" value="Go to Homepage" class="btn btn-primary btn-block btn-lg" tabindex="7" style="width:100%; color:white; border-radius:25px 25px 25px 25px; font-family: 'Quicksand', sans-serif;"></div>
                    </a>
                  </div>
               </div>
             </div>
           </div>
         </div>
       </div>
     </div>





          <!-- Optional JavaScript -->
          <!-- jQuery first, then Popper.js, then Bootstrap JS -->
          <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
          <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
      	<!-- Bootstrap core JavaScript -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/popper/popper.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

          <!-- Plugin JavaScript -->
          <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
          <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
          <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        </body>
 </html>
