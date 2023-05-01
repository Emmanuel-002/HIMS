<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id=$_SESSION['doc_id'];

  if(isset($_GET['admission_number'])){
    $admission_number = $_GET['admission_number'];
      $ret="DELETE FROM his_pat_admission WHERE admission_number=?";
      $stmt= $mysqli->prepare($ret) ;
      $stmt->bind_param('s',$admission_number);
      $stmt->execute() ;//ok
      $res=$stmt->get_result();
      
      $date_discharged = date('Y-m-d h:i:sa');
      $query = "UPDATE his_admission_history SET date_discharged=? WHERE admission_number=?";
      $stmt1 = $mysqli->prepare($query);
      $stmt1->bind_param('ss',$date_discharged,$admission_number);
      $stmt1->execute();
      $res1=$stmt1->get_result(); 

      if($stmt && $stmt1)
      {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <?php
            include('assets/inc/head.php');
        ?>
        <body class="jumbotron text-success jumbotron-fluid text-center">
          <h1 class="display-4">Discharge</h1>
          <h2 class="lead">Admission <?php $_GET['admission_number'] ?> has been deleted</h2>
          <h3>Go back to <a class="navbar-item" href="his_doc_dashboard.php" role="button">Dashboard</a></h3>
            </body>
        </html>
        <?php 
      }
      else {
        ?>
      <body class="jumbotron text-danger jumbotron-fluid text-center">
          <h1 class="display-4">Error</h1>
          <h2 class="lead">Discharge <?php $_GET['admission_number'] ?> failed</h2>
          <h3>Go back to <a class="navbar-item" href="his_doc_dashboard.php" role="button">Dashboard</a></h3>
            </body>
        </html>
        <?php 
      }
}
?>