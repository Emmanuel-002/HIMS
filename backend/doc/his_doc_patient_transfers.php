<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['transfer_patient']))
		{
           
			$admission_number=$_GET['admission_number'];
            $pat_regnumber = $_GET['pat_regnumber'];
			$ref_number=$_POST['ref_number'];
			$pat_fullname=$_POST['pat_fullname'];
			$facility=$_POST['facility'];
            $diagnosis = $_POST['diagnosis'];
            $doc_number=$_SESSION['doc_number'];
            $ref_date=date('Y-m-d h:i:sa');

            $ret = "INSERT INTO his_patient_transfers (ref_number, pat_regnumber, pat_fullname, diagnosis, facility, doc_number, ref_date) 
            VALUES(?,?,?,?,?,?,?)";
            $stmt0 = $mysqli->prepare($ret);
            $res = $stmt0->bind_param('sssssss', $ref_number, $pat_regnumber, $pat_fullname, $diagnosis, $facility, $doc_number, $ref_date);
            $stmt0->execute();
            
            //sql to insert captured values
			$query="UPDATE his_admission_history SET date_transfered=? WHERE admission_number=?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('ss', $ref_date, $admission_number);
			$stmt->execute();

            $query1="DELETE FROM his_pat_admission WHERE admission_number=?";
			$stmt1 = $mysqli->prepare($query1);
			$rc1=$stmt1->bind_param('s', $admission_number);
			$stmt1->execute();
			
			if($stmt)
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
                                <h4 class="page-title">Update Patient Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                   
                    <!-- Form row -->
                    <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                    <?php
                            $admission_number=$_GET['admission_number'];
                            $pat_regnumber = $_GET['pat_regnumber'];
                    
                            $pat_title; $pat_fname; $pat_mname; $pat_lname;
                            $query2 = "SELECT * FROM his_pat_data WHERE pat_regnumber=?";
                            $stmt2 = $mysqli->prepare($query2);
                            $stmt2->bind_param('s',$pat_regnumber);
                            $stmt2->execute();
                            $res2=$stmt2->get_result();
                                if($row=$res2->fetch_object()){
                                    $pat_title = $row->pat_title;
                                    $pat_fname = $row->pat_fname;
                                    $pat_mname = $row->pat_mname;
                                    $pat_lname = $row->pat_lname;
                                }

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
                                    <h4 class="header-title">Fill all fields</h4>
                                    <!--Add Patient Form-->
                                    <form action="" method="post">
                                        <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="ref_number" class="col-form-label">Reference Number</label>
                                            <input type="text" name="ref_number" class="form-control" id="ref_number" placeholder="Reference Number">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="pat_fullname" class="col-form-label">Patient Full Name</label>
                                            <input type="text" value="<?php echo $pat_title . ' '; echo $pat_fname . ' '; echo $pat_mname . ' '; echo $pat_lname; ?>" name="pat_fullname" class="form-control" id="pat_fullname" placeholder="Patient Title">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="diagnosis" class="col-form-label">diagnosis</label>
                                            <input type="text" value="<?php echo $row->diagnosis ?>" name="diagnosis" class="form-control" id="diagnosis" placeholder="Diagnosis">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="facility" class="col-form-label">Facility</label>
                                            <input type="text" name="facility" class="form-control" id="facility" placeholder="Facility">
                                        </div>
                                    </div>
                                    <button type="submit" name="transfer_patient" class="ladda-button btn btn-success" data-style="expand-right">Transfer</button>
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