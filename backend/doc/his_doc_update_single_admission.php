<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_admission']))
		{
            //$pat_i = $_GET['pat_id'];
			$admission_number=$_GET['admission_number'];
			$diagnosis=$_POST['diagnosis'];
            $pat_height = $_POST['pat_height'];
            $pat_weight = $_POST['pat_weight'];
            $pat_bmi = number_format($pat_weight/($pat_height ** 2), 2);
            $pulse_rate = $_POST['pulse_rate'];
            $pat_bp = $_POST['pat_bp'];
            $pat_temp = $_POST['pat_temp'];
            $sp02 = $_POST['sp02'];
			$room_number=$_POST['room_number'];
			$bed_number=$_POST['bed_number'];
            
            //sql to insert captured values
			$query="UPDATE his_pat_admission SET diagnosis=?, pat_height=?, pat_weight=?, pat_bmi=?, pulse_rate=?, pat_bp=?, pat_temp=?, sp02=?, room_number=?, bed_number=? WHERE admission_number=?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssssss', $diagnosis, $pat_height, $pat_weight, $pat_bmi, $pulse_rate, $pat_bp, $pat_temp, $sp02, $room_number, $bed_number, $admission_number);
			$stmt->execute();

            $queryHistory="UPDATE his_admission_history SET diagnosis=?, pat_height=?, pat_weight=?, pat_bmi=?, pulse_rate=?, pat_bp=?, pat_temp=?, sp02=?, room_number=?, bed_number=? WHERE admission_number=?";
			$stmtHistory = $mysqli->prepare($queryHistory);
			$rc=$stmtHistory->bind_param('sssssssssss', $diagnosis, $pat_height, $pat_weight, $pat_bmi, $pulse_rate, $pat_bp, $pat_temp, $sp02, $room_number, $bed_number, $admission_number);
			$stmtHistory->execute();
			
			if($stmt && $stmtHistory)
			{
				$success = "Admission Status Updated";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
		}
?>

<!--End Server Side-->
<!--End Patient Registration-->

<?php 
if(isset($_GET['admission_number']))
{
?>
<!DOCTYPE html>
<html lang="en">

<!--Head-->
<?php include('assets/inc/head.php');?>

<body>
    
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <?php include("assets/inc/nav.php");?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include("assets/inc/sidebar.php");?>
        <!-- Left Sidebar End -->

        <!-- Record Diagnosis Modal Form -->
        <div class="modal fade" id="record_diagnosis" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Diagnosis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="his_doc_patient_diagnosis.php" method="get">
            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pat_regnumber" class="col-form-label">Reg No</label>
                            <input type="text" required="required" name="pat_regnumber" class="form-control" id="pat_regnumber" placeholder="Registration Number">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            </div>
        </div>
        </div>
        <!-- End of Modal -->

        <!-- Admit Patient Modal Form -->
        <div class="modal fade" id="admit_patient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Admission</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="his_doc_admit_patient.php" method="get">
            <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="pat_regnumber" class="col-form-label">Reg No</label>
                            <input type="text" required="required" name="pat_regnumber" class="form-control" id="pat_regnumber" placeholder="Registration Number">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
            </div>
        </div>
        </div>
        <!-- End of Modal -->
        
        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">
                   
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box">
                                <div class="page-title-right">
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="his_admin_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        <li class="breadcrumb-item active">Manage Patients</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Update Admission Status</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                   
                    <!-- Form row -->
                    <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                    <?php
                            $admission_number=$_GET['admission_number'];
                            $ret="SELECT * FROM his_pat_admission WHERE admission_number=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('s',$admission_number);
                            $stmt->execute() ;//ok
                            $res=$stmt->get_result();
                            //$cnt=1;
                            while($row=$res->fetch_object())
                            {
                        ?>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- <h4 class="header-title">Fill all fields</h4> -->
                                    <!--Add Patient Form-->
                                    <form method="post">
                                        <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="date_admitted" class="col-form-label">Date of Admission</label>
                                            <input type="text" value="<?php echo $row->date_admitted ?>" disabled name="date_admitted" class="form-control" id="date_admitted" placeholder="Date of Admission">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="admission_number" class="col-form-label">Admission Number</label>
                                            <input type="text" value="<?php echo $row->admission_number ?>" disabled name="admission_number" class="form-control" id="admission_number" placeholder="Admission Number">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pat_regnumber" class="col-form-label">Patient Number</label>
                                            <input type="text" value="<?php echo $row->pat_regnumber ?>" disabled name="pat_regnumber" class="form-control" id="pat_regnumber" placeholder="Patient Number">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pat_fullname" class="col-form-label">Full Name</label>
                                            <input type="text" value="<?php echo $row->pat_fullname ?>" disabled name="pat_fullname" class="form-control" id="pat_fullname" placeholder="Full Name">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="diagnosis" class="col-form-label">Diagnosis</label>
                                            <input type="text" value="<?php echo $row->diagnosis ?>" name="diagnosis" class="form-control" id="diagnosis" placeholder="Diagnosis">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_height" class="col-form-label">Height (m)</label>
                                            <input type="text" value="<?php echo $row->pat_height ?>" name="pat_height" class="form-control" id="pat_height" placeholder="Height">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_weight" class="col-form-label">Weight (Kg)</label>
                                            <input type="text" value="<?php echo $row->pat_weight ?>" name="pat_weight" class="form-control" id="pat_weight" placeholder="Weight">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_bmi" class="col-form-label">BMI (Kg/m<sup>2</sup>)</label>
                                            <input type="text" disabled value="<?php echo $row->pat_bmi ?>" name="pat_bmi" class="form-control" id="pat_bmi" placeholder="BMI">
                                        </div>
                                        <div class="form-group col-md-3">
                                                <label for="" class="col-form-label">Pulse Rate</label>
                                                <input type="text" value="<?php echo $row->pulse_rate ?>" name="pulse_rate" class="form-control" id="pulse_rate" placeholder="Pulse Rate">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_bp" class="col-form-label">Blood Pressure</label>
                                                <input type="text" value="<?php echo $row->pat_bp ?>" name="pat_bp" class="form-control" id="pat_bp" placeholder="Blood Pressure">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_temp" class="col-form-label">Temperature</label>
                                                <input type="text" value="<?php echo $row->pat_temp ?>" name="pat_temp" class="form-control" id="pat_temp" placeholder="Temperature">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="sp02" class="col-form-label">Sp0<sub>2</sub></label>
                                                <input type="text" value="<?php echo $row->sp02 ?>" name="sp02" class="form-control" id="sp02" placeholder="SP02">
                                            </div>
                                        <div class="form-group col-md-2">
                                            <label for="room_number" class="col-form-label">Room Number</label>
                                            <input type="text" value="<?php echo $row->room_number ?>" name="room_number" class="form-control" id="room_number" placeholder="Room Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="bed_number" class="col-form-label">Bed Number</label>
                                            <input type="text" value="<?php echo $row->bed_number ?>" name="bed_number" class="form-control" id="bed_number" placeholder="Bed Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="doc_number" class="col-form-label">Admitted By</label>
                                            <input type="text" value="<?php echo $row->doc_number ?>" disabled name="doc_number" class="form-control" id="doc_number" placeholder="Doctor Number">
                                        </div>
                                    </div>

                                    <button type="submit" name="update_admission" class="ladda-button btn btn-success" data-style="expand-right">Update</button>

                                    </form>
                                    <!--End Patient Form-->
                                </div> <!-- end card-body -->
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
                    <?php  }?>
                    <!-- end row -->
                  
                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            <?php include('assets/inc/footer.php');?>
            <!-- end Footer -->

        </div>

    </div>
    <!-- END wrapper -->


    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

   <!-- Validation js -->
   <script src="assets/js/validation.js"></script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>
   
    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

    <!-- Loading buttons js -->
    <script src="assets/libs/ladda/spin.js"></script>
    <script src="assets/libs/ladda/ladda.js"></script>

    <!-- Buttons init js-->
    <script src="assets/js/pages/loading-btn.init.js"></script>

</body>

</html>
<?php }
else {
    include('assets/inc/head.php');
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Error Page</title>
    </head>
    <body class="jumbotron jumbotron-fluid text-center">
  <h1 class="display-4">Error Loading Page!</h1>
  <h2 class="lead">This page cannot be loaded without admission number.</h2>
  <h3>Go back to <a class="navbar-item" href="his_doc_dashboard.php" role="button">Dashboard</a></h3>
    </body>
    </html>
<?php
}

?>