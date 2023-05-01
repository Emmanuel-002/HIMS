<?php
	session_start();
	include('assets/inc/config.php');
        $height=0; $weight=0; $bmi=0; $pat_fullname="";$pat_age=0;$pat_gender="";$dependency=""; 
    $pat_num=$_GET['pat_regnumber'];
    $check_pat=false;
    $getQuery = "SELECT * FROM his_pat_data WHERE pat_regnumber=?";
    $stmtQuery = $mysqli->prepare($getQuery);
    $stmtQuery->bind_param('s', $pat_num);
    $stmtQuery->execute();
    $queryRes=$stmtQuery->get_result();
        if($row=$queryRes->fetch_object()){
            $check_pat=true;
            $today = date('Y-m-d');
            $thisyear = date('Y',strtotime($today));
            $dob = date($row->pat_dob);
            $yob = date('Y',strtotime($dob));
            $pat_fullname = $row->pat_fname . ' ' . $row->pat_mname . ' ' . $row->pat_lname;
            $height=$row->pat_height;
            $weight=$row->pat_weight;
            $bmi=$row->pat_bmi;
            $pat_age=$thisyear-$yob;
            $pat_gender=$row->pat_gender;
            $dependency=$row->dependency;
        }

		if(isset($_POST['record_diagnosis']))
		{
			$diagnosis_number=$_POST['diagnosis_number'];
			$pat_regnumber=$_GET['pat_regnumber'];
            $pat_bp = $_POST['pat_bp'];
            $pat_height = $_POST['pat_height'];
            $pat_weight = $_POST['pat_weight'];
            $pat_bmi = number_format($pat_weight/($pat_height ** 2), 2);
            $pat_temp = $_POST['pat_temp'];
			$presenting_complain=$_POST['presenting_complain'];
			$examination=$_POST['examination'];
            $diagnosis=$_POST['diagnosis'];
            $management=$_POST['management'];
            $doc_number=$_SESSION['doc_number'];
            $date_rec=date('y-m-d');
            
            $query0 = "SELECT * FROM his_pat_data WHERE pat_regnumber='$pat_regnumber'";
            $stmt0 = $mysqli->prepare($query0);
            $stmt0->execute();
            $res=$stmt0->get_result();
            $row=$res->fetch_object();
                       
            if(isset($row)){
            $query1 = "SELECT * FROM his_diagnosis_record WHERE pat_regnumber='$pat_regnumber' AND date_rec='$date_rec'";
            $stmt1 = $mysqli->prepare($query1);
            $stmt1->execute();
            $res=$stmt1->get_result();
            $row=$res->fetch_object();
            if(!isset($row)){
            //sql to insert captured values
			$query="INSERT INTO his_diagnosis_record (diagnosis_number, pat_regnumber, pat_fullname, pat_age, pat_gender, dependency, pat_bp, pat_height, pat_weight, pat_bmi, pat_temp, presenting_complain, examination, diagnosis, management, doc_number, date_rec) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssssssssssss', $diagnosis_number, $pat_regnumber, $pat_fullname, $pat_age, $pat_gender, $dependency, $pat_bp, $pat_height, $pat_weight, $pat_bmi, $pat_temp, $presenting_complain, $examination, $diagnosis, $management, $doc_number, $date_rec);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Diagnosis Record Was Successful. Diagnosis No Is " . $diagnosis_number;
			}
			else {
				$err = "Diagnosis Record Failed.";
			}
			
			}
			else{
			    $err = "Patient Has Been Diagnosed Today. Please Update Diagnosis";
			}
			}
			else{
                $err = "Patient Has Not Been Registered.";
			}
		}
?>

<!--End Server Side-->
<!--End Patient Registration-->
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
                                        <li class="breadcrumb-item"><a href="his_doc_dashboard.php">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        <li class="breadcrumb-item active">Add Patient</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Add Diagnosis Record</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                <?php
                                        if($check_pat===true){                                      
                                    ?>
                                    <!-- <h4 class="header-title">Fill all fields</h4> -->
                                    <!-- Record Diagnosis Form-->
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="pat_regnumber" class="col-form-label">Patient Number</label>
                                                <input type="text" value="<?php echo $pat_num ?>" disabled name="pat_regnumber" class="form-control" id="pat_regnumber" placeholder="Patient Number">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="pat_fullname" class="col-form-label">Full Name</label>
                                                <input type="text" value="<?php echo $pat_fullname ?>" disabled name="pat_fullname" class="form-control" id="pat_fullname" placeholder="Full Name">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="pat_age" class="col-form-label">Age</label>
                                                <input type="text" value="<?php echo $pat_age ?>" disabled name="pat_age" class="form-control" id="pat_age" placeholder="Age">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="pat_gender" class="col-form-label">Gender</label>
                                                <input type="text" value="<?php echo $pat_gender ?>" disabled name="pat_gender" class="form-control" id="pat_age" placeholder="Age">
                                            </div>
                                            <div class="form-group col-md-3">
                                            <label for="dependency" class="col-form-label">Dependency</label>
                                                <input type="text" value="<?php echo $dependency ?>" disabled name="dependency" class="form-control" id="dependency" placeholder="Dependency">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_height" class="col-form-label">Height</label>
                                                <input type="text" value="<?php echo $height ?>" name="pat_height" class="form-control" id="pat_height" placeholder="Height">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_weight" class="col-form-label">Weight</label>
                                                <input type="text" value="<?php echo $weight ?>" name="pat_weight" class="form-control" id="pat_weight" placeholder="Weight">
                                            </div>
                                            <div class="form-group col-md-1">
                                                <label for="pat_bmi" class="col-form-label">BMI</label>
                                                <input type="text" disabled value="<?php echo $bmi ?>" name="pat_bmi" class="form-control" id="pat_bmi" placeholder="BMI">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_bp" class="col-form-label">Blood Pressure</label>
                                                <input type="text" required name="pat_bp" class="form-control" id="pat_bp" placeholder="Blood Pressure">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_temp" class="col-form-label">Temperature</label>
                                                <input type="text" required name="pat_temp" class="form-control" id="pat_temp" placeholder="Temperature (degree celcius)">
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label for="presenting_complain" class="col-form-label">Presenting Complain</label>
                                                <textarea required="required" name="presenting_complain" id="presenting_complain" rows="3" class="form-control" placeholder="Presenting Complain"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="examination" class="col-form-label">Examination</label>
                                                <textarea required="required" type="text" name="examination" class="form-control" rows="3" id="examination" placeholder="Examination"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="diagnosis" class="col-form-label">Diagnosis</label>
                                                <textarea required="required" type="text" name="diagnosis" class="form-control" rows="3" id="diagnosis" placeholder="Diagnosis"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="management" class="col-form-label">Managament</label>
                                                <textarea required="required" type="text" name="management" class="form-control" rows="3" id="management" placeholder="Management"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2" style="display:none">
                                                <?php 
                                                        $length = 6;    
                                                        $diagnosis_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                <label for="diagnosis_number" class="col-form-label">Diagnosis Number</label>
                                                <input type="text" name="diagnosis_number" value="<?php echo $diagnosis_number;?>" class="form-control" id="diagnosis_number">
                                            </div>
                                        </div>

                                        <button type="submit" name="record_diagnosis" class="ladda-button btn btn-primary" data-style="expand-right">Record</button>

                                    </form>
                                    <!--End Diagnosis Form-->
                                </div> <!-- end card-body -->
                                <?php }
                                else{
                                    echo "No such patient number in the record";
                                }
                                ?>
                            </div> <!-- end card-->
                        </div> <!-- end col -->
                    </div>
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