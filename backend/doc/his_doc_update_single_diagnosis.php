<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_diagnosis']))
		{
			$diagnosis_number=$_GET['diagnosis_number'];
			$pat_bp=$_POST['pat_bp'];
			$pat_height=$_POST['pat_height'];
			$pat_weight=$_POST['pat_weight'];
			$pat_bmi=number_format($pat_weight/($pat_height ** 2),2);
			$pat_temp=$_POST['pat_temp'];
            $presenting_complain=$_POST['presenting_complain'];
            $examination=$_POST['examination'];
			$diagnosis=$_POST['diagnosis'];
            $management=$_POST['management'];
            
            //sql to insert captured values
			$query="UPDATE his_diagnosis_record SET pat_bp=?, pat_height=?, pat_weight=?, pat_bmi=?, pat_temp=?, presenting_complain=?, examination=?, diagnosis=?, management=? WHERE diagnosis_number=?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ssssssssss', $pat_bp, $pat_height, $pat_weight, $pat_bmi, $pat_temp, $presenting_complain,  $examination, $diagnosis, $management, $diagnosis_number);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Patient Details Updated";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
		}
?>

<!--End Server Side-->
<!--End Patient Registration-->

<?php 
if(isset($_GET['diagnosis_number']))
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
                                <h4 class="page-title">Update Patient Diagnosis</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                   
                    <!-- Form row -->
                    <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                    <?php
                            $diagnosis_number=$_GET['diagnosis_number'];
                            $ret="SELECT * FROM his_diagnosis_record WHERE diagnosis_number=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('s',$diagnosis_number);
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
                                            <label for="date_rec" class="col-form-label">Date</label>
                                            <input type="text" disabled value="<?php echo $row->date_rec;?>" name="date_rec" class="form-control" id="date_rec" placeholder="Diagnosis date">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="doc_number" class="col-form-label">Doctor</label>
                                            <input type="text" disabled value="<?php echo $row->doc_number;?>" name="doc_number" class="form-control" id="doc_number" placeholder="Doctor Number">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="diagnosis_number" class="col-form-label">Diagnosis No</label>
                                            <input type="text" disabled value="<?php echo $row->diagnosis_number;?>" name="diagnosis_number" class="form-control" id="diagnosis_number" placeholder="Diagnosis Number">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pat_regnumber" class="col-form-label">Reg No</label>
                                            <input type="text" disabled value="<?php echo $row->pat_regnumber;?>" name="pat_regnumber" class="form-control" id="pat_regnumber" placeholder="Patient Number">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pat_fullname" class="col-form-label">Full Name</label>
                                            <input type="text" disabled value="<?php echo $row->pat_fullname;?>" name="pat_fullname" class="form-control" id="pat_fullname" placeholder="Full Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                                <label for="pat_age" class="col-form-label">Age</label>
                                                <input type="text" value="<?php echo $row->pat_age ?>" disabled name="pat_age" class="form-control" id="pat_age" placeholder="Age">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="pat_gender" class="col-form-label">Gender</label>
                                                <input type="text" value="<?php echo $row->pat_gender ?>" disabled name="pat_gender" class="form-control" id="pat_age" placeholder="Age">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="dependency" class="col-form-label">Dependency</label>
                                                <input type="text" value="<?php echo $row->dependency ?>" disabled name="dependency" class="form-control" id="dependency" placeholder="Dependency">
                                            </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_height" class="col-form-label">Height</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_height;?>" name="pat_height" class="form-control" id="pat_height" placeholder="Patient Height">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_weight" class="col-form-label">Weight</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_weight;?>" name="pat_weight" class="form-control" id="pat_weight" placeholder="Patient Weight">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_bmi" class="col-form-label">BMI</label>
                                            <input type="text" disabled value="<?php echo $row->pat_bmi;?>" name="pat_bmi" class="form-control" id="pat_bmi" placeholder="BMI">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pat_bp" class="col-form-label">Blood Pressure</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_bp;?>" name="pat_bp" class="form-control" id="pat_bp" placeholder="Blood Pressure">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="pat_temp" class="col-form-label">Temperature</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_temp;?>" name="pat_temp" class="form-control" id="pat_temp" placeholder="Temperature">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                                <label for="presenting_complain" class="col-form-label">Presenting Complain</label>
                                                <textarea class="form-control" required name="presenting_complain" id="presenting_complain" rows="5" placeholder="Presenting Complain"><?php echo $row->presenting_complain;?></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="examination" class="col-form-label">Examination</label>
                                                <textarea class="form-control" required name="examination" id="examination" rows="5" placeholder="Examination"><?php echo $row->examination;?></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="diagnosis" class="col-form-label">Diagnosis</label>
                                                <textarea class="form-control" required name="diagnosis" id="daignosis" rows="5" placeholder="Diagnosis"><?php echo $row->diagnosis;?></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                                <label for="management" class="col-form-label">Management</label>
                                                <textarea class="form-control" required name="management" id="management" rows="5" placeholder="Management"><?php echo $row->management;?></textarea>
                                        </div>
                                    </div>

                                    <button type="submit" name="update_diagnosis" class="ladda-button btn btn-success" data-style="expand-right">Update</button>

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

    <!-- Validation js -->
    <script src="assets/js/validation.js"></script>

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

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
  <h2 class="lead">This page cannot be loaded without Diagnosis number.</h2>
  <h3>Go back to <a class="navbar-item" href="his_doc_dashboard.php" role="button">Dashboard</a></h3>
    </body>
    </html>
<?php
}
?>