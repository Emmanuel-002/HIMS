<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['enrol_patient']))
		{
            $check_self=0;
            $pat_regnumber=$_POST['pat_regnumber'];
			$pat_title=$_POST['pat_title'];
			$pat_number=$_POST['pat_number'];
            $dependency = $_POST['dependency'];
			$pat_fname=$_POST['pat_fname'];
			$pat_mname=$_POST['pat_mname'];
			$pat_lname=$_POST['pat_lname'];
			$pat_dob=$_POST['pat_dob'];
			$pat_gender=$_POST['pat_gender'];
            $pat_status=$_POST['pat_status'];
            $pat_religion=$_POST['pat_religion'];
			$pat_trade=$_POST['pat_trade'];
            $pat_phone=$_POST['pat_phone'];
            $pat_email=$_POST['pat_email'];
            $pat_address=$_POST['pat_address'];
            $pat_height = $_POST['pat_height'];
            $pat_weight = $_POST['pat_weight'];
            $pat_bmi = number_format($pat_weight/($pat_height ** 2), 2);
            $pat_unit = $_POST['pat_unit'];
            $nok_fullname = $_POST['nok_fullname'];
            $nok_phone = $_POST['nok_phone'];
            $nok_address = $_POST['nok_address'];
            $date_enrolled = date('y.m.d h:i:sa');
            
            $query0 = "SELECT * FROM his_pat_data WHERE pat_number='" . $pat_number . "'";
            $stmt0 = $mysqli->prepare($query0);
            $stmt0->execute();
            $res=$stmt0->get_result();
            // $row=$res->fetch_object();
            $rowCount = 0;
            while($row=$res->fetch_object()){
                if($row->dependency==='Self'){
                    $check_self++;
                }
                $rowCount++;
            }          
            if($rowCount<6){
                if($check_self>=2){
                    $err = "You cannot register self with the same patient number";
                }  
                else{
            //sql to insert captured values
			$query="INSERT INTO his_pat_data (pat_regnumber, pat_title, pat_number, dependency, pat_fname, pat_mname, pat_lname, pat_dob, pat_gender, pat_status, pat_religion, pat_trade, pat_phone, pat_email, pat_address, pat_unit, pat_height, pat_weight, pat_bmi, nok_fullname, nok_phone, nok_address, date_enrolled) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssssssssssssssssss', $pat_regnumber, $pat_title, $pat_number, $dependency, $pat_fname, $pat_mname, $pat_lname, $pat_dob, $pat_gender, $pat_status, $pat_religion, $pat_trade, $pat_phone, $pat_email, $pat_address, $pat_unit, $pat_height, $pat_weight, $pat_bmi, $nok_fullname, $nok_phone, $nok_address, $date_enrolled);
			$stmt->execute();
			
			if($stmt)
			{
				$success = "Patient Registration Was Successful. Reg No Is " . $pat_regnumber;
			}
			else {
				$err = "Patient Registration Failed";
			}
			}
        }
			else{
                $err = "Registration Limit For $pat_number Is Reached";
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
                                <h4 class="page-title">Add Patient</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                
                    <!-- Form row -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                <div class="form-row bg-success p-1">
                                    <h3 class="header-title text-light">Patient Information</h3>
                                </div>
                                    <!--Add Patient Form-->
                                    <form method="post">
                                        <div class="form-row">
                                            <div class="form-group col-md-2">
                                                <label for="pat_title" class="col-form-label">Title</label>
                                                <select id="pat_title" required="required" name="pat_title" class="form-control">
                                                    <option value="0">Select Title</option>
                                                    <option value="Air Mshl">Air Mshl</option>
                                                    <option value="AVM">AVM</option>
                                                    <option value="Air Cdre">Air Cdre</option>
                                                    <option value="Gp Capt">Gp Capt</option>
                                                    <option value="Wg Cdr">Wg Cdr</option>
                                                    <option value="Sqn Ldr">Sqn Ldr</option>
                                                    <option value="Flt Lt">Flt Lt</option>
                                                    <option value="Fg Offr">Fg Offr</option>
                                                    <option value="Plt Offr">Plt Offr</option>
                                                    <option value="AWO">AWO</option>
                                                    <option value="MWO">MWO</option>
                                                    <option value="WO">WO</option>
                                                    <option value="FS">FS</option>
                                                    <option value="Sgt">Sgt</option>
                                                    <option value="Cpl">Cpl</option>
                                                    <option value="LCpl">LCpl</option>
                                                    <option value="ACM">ACM</option>
                                                    <option value="ACW">ACW</option>
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Miss">Miss</option>
                                                    <option value="Chief">Chief</option>
                                                    <option value="Alhaji">Alhaji</option>
                                                    <option value="Alhaja">Alhaja</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_number" class="col-form-label">Patient Number</label>
                                                <input type="text" required="required" name="pat_number" class="form-control" id="pat_number">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="dependency" class="col-form-label">Dependency</label>
                                                <select id="dependency" name="dependency" class="form-control">
                                                    <option  value="0">Select Dependency</option>
                                                    <option value="Self">Self</option>
                                                    <option value="Dependant">Wife</option>
                                                    <option value="Husband">Husband</option>
                                                    <option value="Son">Son</option>
                                                    <option value="Daughter">Daughter</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_fname" class="col-form-label">First Name</label>
                                                <input required="required" type="text" name="pat_fname" class="form-control single-word" id="pat_fname" placeholder="First Name">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_mname" class="col-form-label">Middle Name</label>
                                                <input type="text" name="pat_mname" class="form-control single-word" id="pat_mname" placeholder="Optional">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_lname" class="col-form-label">Last Name</label>
                                                <input required="required" type="text" name="pat_lname" class="form-control single-word" id="pat_lname" placeholder="Last Name">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_dob" class="col-form-label">Date of Birth</label>
                                                <input required="required" type="date" name="pat_dob" class="form-control" id="pat_dob">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_gender" class="col-form-label">Gender</label>
                                                <select id="pat_gender" name="pat_gender" class="form-control choice">
                                                    <option  value="0">Select Gender</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_status" class="col-form-label">Marital Status</label>
                                                <select id="pat_status" name="pat_status" class="form-control">
                                                    <option  value="0">Select Status</option>
                                                    <option value="Celibate">Celibate</option>
                                                    <option value="Complicated">Complicated</option>
                                                    <option value="Divorce">Divorce</option>
                                                    <option value="Married">Married</option>
                                                    <option value="Others">Others</option>
                                                    <option value="Single">Single</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_religion" class="col-form-label">Religion</label>
                                                <select id="pat_religion" name="pat_religion" class="form-control">
                                                    <option  value="0">Select Religion</option>
                                                    <option value="Christianity">Christianity</option>
                                                    <option value="Islam">Islam</option>
                                                    <option value="Others">Others</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_trade" class="col-form-label">Trade</label>
                                                <input required="required" type="text" name="pat_trade" class="form-control" id="pat_trade">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="pat_unit" class="col-form-label">Unit</label>
                                                <input type="text" name="pat_unit" class="form-control" id="pat_unit" placeholder="Optional">
                                            </div>
                                            <div class="form-group col-md-2">
                                                    <label for="pat_phone" class="col-form-label">Phone</label>
                                                    <input type="tel" required="required" name="pat_phone" class="form-control number" id="pat_phone" placeholder="Phone Number">
                                            </div>
                                            <div class="col-md-2">
                                                    <label for="pat_height" class="col-form-label">Height</label>
                                                    <input type="text" name="pat_height" class="form-control float" id="pat_height" placeholder="Height (m)">
                                            </div>
                                            <div class="col-md-2">
                                                    <label for="pat_weight" class="col-form-label">Weight</label>
                                                    <input type="text" name="pat_weight" class="form-control float" id="pat_weight" placeholder="Weight (Kg)">
                                            </div>
                                            <div class="col-md-2">
                                                    <label for="pat_bmi" class="col-form-label">BMI</label>
                                                    <input type="text" disabled name="pat_bmi" class="form-control float" id="pat_bmi" placeholder="BMI (Kg/m2)">
                                            </div>
                                            <div class="form-group col-md-2">
                                                    <label for="pat_email" class="col-form-label">Email</label>
                                                    <input type="email" name="pat_email" class="form-control email" id="pat_email" placeholder="Optional">
                                            </div>
                                        </div>
                                        <div class="form-row bg-success p-1">
                                            <h3 class="header-title text-light">Next of Kin</h3>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-4">
                                                <label for="nok_fullname" class="col-form-label">Full Name</label>
                                                <input type="text" required="required" name="nok_fullname" class="form-control initialCap" id="nok_fullname" placeholder="Full Name">
                                            </div>
                                            <div class="form-group col-md-2">
                                                <label for="nok_phone" class="col-form-label">NOK Phone</label>
                                                <input type="tel" required="required" name="nok_phone" class="form-control number" id="nok_phone" placeholder="Phone Number">
                                            </div> 
                                        </div>
                                        <div class="form-row bg-success p-1">
                                            <h3 class="header-title text-light">Contacts</h3>
                                        </div>
                                        <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="pat_address" class="col-form-label">Contact Address</label>
                                            <textarea class="form-control" required="required" name="pat_address" id="pat_address" rows="5" placeholder="Contact Address"></textarea>
                                            </div>
                                            <div class="form-group col-md-6">
                                            <label for="nok_address" class="col-form-label">Contact Address</label>
                                            <textarea class="form-control" required="required" name="nok_address" id="nok_address" rows="5" placeholder="Contact Address"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-2" style="display:none">
                                                <?php 
                                                        $length = 5;    
                                                        $pat_regnumber =  substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
                                                    ?>
                                                <label for="pat_regnumber" class="col-form-label">Registration Number</label>
                                                <input type="text" name="pat_regnumber" value="<?php echo $pat_regnumber;?>" class="form-control" id="pat_regnumber">
                                            </div>
                                        </div>

                                        <button type="submit" id="enrol" name="enrol_patient" class="ladda-button btn btn-success" data-style="expand-right">Enrol Patient</button>

                                    </form>
                                    <!--End Patient Form-->
                                </div> <!-- end card-body -->
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