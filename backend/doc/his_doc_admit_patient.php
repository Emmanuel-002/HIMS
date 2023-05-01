<?php
	session_start();
	include('assets/inc/config.php');
			$pat_num=$_GET['pat_regnumber'];
            $height=0; $weight=0; $bmi=0; $pat_fullname;
            $check_pat=false;
            $getQuery = "SELECT * FROM his_pat_data WHERE pat_regnumber=?";
                    $stmtQuery = $mysqli->prepare($getQuery);
                    $stmtQuery->bind_param('s', $pat_num);
                    $stmtQuery->execute();
                    $queryRes=$stmtQuery->get_result();
                    if($row=$queryRes->fetch_object())
                  {
                    $check_pat=true;
                    $pat_fullname = $row->pat_fname . ' ' . $row->pat_mname . ' ' . $row->pat_lname;
                    $height=$row->pat_height;
                    $weight=$row->pat_weight;
                    $bmi=$row->pat_bmi;
                }

		if(isset($_POST['admit_patient']))
		{
			$admission_number=$_POST['admission_number'];
			$pat_regnumber=$_GET['pat_regnumber'];
            $diagnosis = $_POST['diagnosis'];
            $pat_height = $_POST['pat_height'];
            $pat_weight = $_POST['pat_weight'];
            $pat_bmi = number_format($pat_height/($pat_weight ** 2),2);
            $pulse_rate = $_POST['pulse_rate'];
            $pat_bp = $_POST['pat_bp'];
            $pat_temp = $_POST['pat_temp'];
            $sp02 = $_POST['sp02'];
            $room_number = $_POST['room_number'];
            $bed_number = $_POST['bed_number'];
            $doc_number = $_SESSION['doc_number'];
            $date_admitted = date('Y-m-d');
            $date_history = date('Y-m-d h:i:sa');
            
            $query0 = "SELECT * FROM his_pat_data WHERE pat_regnumber=?";
            $stmt0 = $mysqli->prepare($query0);
            $stmt0->bind_param('s', $pat_regnumber);
            $stmt0->execute();
            $res0=$stmt0->get_result();
            $row0=$res0->fetch_object();
                       
            if(isset($row0)){
            $query1 = "SELECT * FROM his_pat_admission WHERE pat_regnumber=? AND date_admitted=?";
            $stmt1 = $mysqli->prepare($query1);
            $stmt1->bind_param('ss', $pat_regnumber, $date_admitted);
            $stmt1->execute();
            $res1=$stmt1->get_result();
            $row1=$res1->fetch_object();
            if(!isset($row1)){
            //sql to insert captured values
			$query2="INSERT INTO his_pat_admission (admission_number, pat_regnumber, pat_fullname, diagnosis, pat_height, pat_weight, pat_bmi, pulse_rate, pat_bp, pat_temp, sp02, room_number, bed_number, doc_number, date_admitted) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt2 = $mysqli->prepare($query2);
			$rc2=$stmt2->bind_param('sssssssssssssss', $admission_number, $pat_regnumber, $pat_fullname, $diagnosis, $pat_height, $pat_weight, $pat_bmi, $pulse_rate, $pat_bp, $pat_temp, $sp02, $room_number, $bed_number, $doc_number, $date_admitted);
			$stmt2->execute();

            $query3="INSERT INTO his_admission_history (admission_number, pat_regnumber, pat_fullname, diagnosis, pat_height, pat_weight, pat_bmi, pulse_rate, pat_bp, pat_temp, sp02, room_number, bed_number, doc_number, date_admitted) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt3 = $mysqli->prepare($query3);
			$rc3=$stmt3->bind_param('sssssssssssssss', $admission_number, $pat_regnumber, $pat_fullname, $diagnosis, $pat_height, $pat_weight, $pat_bmi, $pulse_rate, $pat_bp, $pat_temp, $sp02, $room_number, $bed_number, $doc_number, $date_history);
			$stmt3->execute();
			
			if($stmt2 && $stmt3)
			{
				$success = "Patient's Admission Was Successful. Admission No Is " . $admission_number;
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
                                <h4 class="page-title">Admit Patient</h4>
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
                                    
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="pat_regnumber" class="col-form-label">Patient Number</label>
                                                <input disabled type="text" value="<?php echo $pat_num; ?>" name="pat_regnumber" class="form-control" id="pat_regnumber" placeholder="Registration Number">
                                            </div>
                                             <div class="form-group col-md-5">
                                                <label for="pat_fullname" class="col-form-label">Full Name</label>
                                                <input disabled type="text" value="<?php echo $pat_fullname; ?>" name="pat_fullname" class="form-control" id="pat_fullname" placeholder="Full Name">
                                            </div>
                                             <div class="form-group col-md-5">
                                                <label for="diagnosis" class="col-form-label">Diagnosis</label>
                                                <input type="text" required="required" name="diagnosis" class="form-control" id="diagnosis" placeholder="Diagnosis">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_height" class="col-form-label">Height (m)</label>
                                                <input type="text" required="required" value="<?php if($height>0){ echo $height;}else{echo "";} ?>" name="pat_height" class="form-control" id="pat_height" placeholder="Height">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_weight" class="col-form-label">Weight (Kg)</label>
                                                <input type="text" required="required" value="<?php if($weight>0){ echo $weight;}else{echo "";} ?>" name="pat_weight" class="form-control" id="pat_weight" placeholder="Weight">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_bmi" class="col-form-label">BMI (Kg/m<sup>2</sup>)</label>
                                                <input type="text" disabled value="<?php if($bmi>0){ echo $bmi;}else{echo "";} ?>" name="pat_bmi" class="form-control" id="pat_bmi" placeholder="BMI">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="" class="col-form-label">Pulse Rate</label>
                                                <input type="text" required="required" name="pulse_rate" class="form-control" id="pulse_rate" placeholder="Pulse Rate">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="pat_bp" class="col-form-label">Blood Pressure</label>
                                                <input type="text" required="required" name="pat_bp" class="form-control" id="pat_bp" placeholder="Blood Pressure">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label for="pat_temp" class="col-form-label">Temperature</label>
                                                <input type="text" required="required" name="pat_temp" class="form-control" id="pat_temp" placeholder="Temperature">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="sp02" class="col-form-label">Sp0<sub>2</sub></label>
                                                <input type="text" required="required" name="sp02" class="form-control" id="sp02" placeholder="SP02">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="room_number" class="col-form-label">Room Number</label>
                                                <input type="text" required="required" name="room_number" class="form-control" id="room_number" placeholder="Room Number">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="bed_number" class="col-form-label">Bed Number</label>
                                                <input type="text" required="required" name="bed_number" class="form-control" id="bed_number" placeholder="Bed Number">
                                            </div>
                                        </div> 
                                        <div class="form-row">
                                            <div class="form-group col-md-2" style="display:none">
                                                <?php 
                                                        $length = 7;    
                                                        $admission_number =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                <label for="admission_number" class="col-form-label">Diagnosis Number</label>
                                                <input type="text" name="admission_number" value="<?php echo $admission_number;?>" class="form-control" id="admission_number">
                                            </div>
                                        </div>
                                        <button type="submit" name="admit_patient" class="ladda-button btn btn-primary" data-style="expand-right">Admit</button>
                                    </form>
                                    <!--End Patient Form-->
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