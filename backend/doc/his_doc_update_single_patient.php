<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['update_patient']))
		{
            //$pat_i = $_GET['pat_id'];
			$pat_title=$_POST['pat_title'];
			$pat_regnumber=$_GET['pat_regnumber'];
			// $pat_number=$_POST['pat_number'];
			$dependency=$_POST['dependency'];
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
            //sql to insert captured values
			$query="UPDATE  his_pat_data  SET pat_title=?, dependency=?, pat_fname=?, pat_mname=?, pat_lname=?, pat_dob=?, pat_gender=?, pat_status=?, pat_religion=?, pat_trade=?, pat_unit=?, pat_phone=?, pat_email=?, pat_height=?, pat_weight=?, pat_bmi=?, pat_address=?, nok_fullname=?, nok_phone=?, nok_address=? WHERE pat_regnumber=?";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssssssssssssssssss', $pat_title, $dependency, $pat_fname, $pat_mname, $pat_lname, $pat_dob, $pat_gender,  $pat_status, $pat_religion, $pat_trade, $pat_unit, $pat_phone, $pat_email, $pat_height, $pat_weight, $pat_bmi, $pat_address, $nok_fullname, $nok_phone, $nok_address, $pat_regnumber);
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
if(isset($_GET['pat_regnumber']))
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
                                <h4 class="page-title">Update Patient Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                   
                    <!-- Form row -->
                    <!--LETS GET DETAILS OF SINGLE PATIENT GIVEN THEIR ID-->
                    <?php
                            $pat_regnumber=$_GET['pat_regnumber'];
                            $ret="SELECT * FROM his_pat_data WHERE pat_regnumber=?";
                            $stmt= $mysqli->prepare($ret) ;
                            $stmt->bind_param('s',$pat_regnumber);
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
                                <div class="form-row bg-success p-1">
                                    <h3 class="header-title text-light">Patient Information</h3>
                                </div>
                                    <!--Add Patient Form-->
                                    <form method="post">
                                        <div class="form-row">
                                        <div class="form-group col-md-2">
                                                <label for="pat_title" class="col-form-label">Title</label>
                                                <select id="pat_title" required="required" name="pat_title" class="form-control choice">
                                                    <option value="Air Mshl" <?php if($row->pat_title==='Air Mshl') echo 'selected' ?>>Air Mshl</option>
                                                    <option value="AVM" <?php if($row->pat_title==='AVM') echo 'selected' ?>>AVM</option>
                                                    <option value="Air Cdre" <?php if($row->pat_title==='Air Cdre') echo 'selected' ?>>Air Cdre</option>
                                                    <option value="Gp Capt" <?php if($row->pat_title==='Gp Capt') echo 'selected' ?>>Gp Capt</option>
                                                    <option value="Wg Cdr" <?php if($row->pat_title==='Wg Cdr') echo 'selected' ?>>Wg Cdr</option>
                                                    <option value="Sqn Ldr" <?php if($row->pat_title==='Sqn Ldr') echo 'selected' ?>>Sqn Ldr</option>
                                                    <option value="Flt Lt" <?php if($row->pat_title==='Flt Lt') echo 'selected' ?>>Flt Lt</option>
                                                    <option value="Fg Offr" <?php if($row->pat_title==='Fg Offr') echo 'selected' ?>>Fg Offr</option>
                                                    <option value="Plt Offr" <?php if($row->pat_title==='Plt Offr') echo 'selected' ?>>Plt Offr</option>
                                                    <option value="AWO" <?php if($row->pat_title==='AWO') echo 'selected' ?>>AWO</option>
                                                    <option value="MWO" <?php if($row->pat_title==='MWO') echo 'selected' ?>>MWO</option>
                                                    <option value="WO" <?php if($row->pat_title==='WO') echo 'selected' ?>>WO</option>
                                                    <option value="FS" <?php if($row->pat_title==='FS') echo 'selected' ?>>FS</option>
                                                    <option value="Sgt" <?php if($row->pat_title==='Sgt') echo 'selected' ?>>Sgt</option>
                                                    <option value="Cpl" <?php if($row->pat_title==='Cpl') echo 'selected' ?>>Cpl</option>
                                                    <option value="LCpl" <?php if($row->pat_title==='LCpl') echo 'selected' ?>>LCpl</option>
                                                    <option value="ACM" <?php if($row->pat_title==='ACM') echo 'selected' ?>>ACM</option>
                                                    <option value="ACW" <?php if($row->pat_title==='ACW') echo 'selected' ?>>ACW</option>
                                                    <option value="Mr" <?php if($row->pat_title==='Mr') echo 'selected' ?>>Mr</option>
                                                    <option value="Mrs" <?php if($row->pat_title==='Mrs') echo 'selected' ?>>Mrs</option>
                                                    <option value="Miss" <?php if($row->pat_title==='Miss') echo 'selected' ?>>Miss</option>
                                                    <option value="Chief" <?php if($row->pat_title==='Chief') echo 'selected' ?>>Chief</option>
                                                    <option value="Alhaji" <?php if($row->pat_title==='Alhaji') echo 'selected' ?>>Alhaji</option>
                                                    <option value="Alhaja" <?php if($row->pat_title==='Alhaja') echo 'selected' ?>>Alhaja</option>
                                                    <option value="Others" <?php if($row->pat_title==='Others') echo 'selected' ?>>Others</option>
                                                </select>
                                            </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_number" class="col-form-label">Pat No</label>
                                            <input type="text" disabled value="<?php echo $row->pat_number;?>" name="pat_number" class="form-control" id="pat_number" placeholder="Patient Number">
                                        </div>
                                        <div class="form-group col-md-2">
                                        <label for="dependency" class="col-form-label">Dependency</label>
                                                <select id="dependency" required="required" name="dependency" class="form-control choice">
                                                    <option value="Self" <?php if($row->dependency==='Self') echo 'selected' ?>>Self</option>
                                                    <option value="Wife" <?php if($row->dependency==='Wife') echo 'selected' ?>>Wife</option>
                                                    <option value="Husband" <?php if($row->dependency==='Husband') echo 'selected' ?>>Husband</option>
                                                    <option value="Son" <?php if($row->dependency==='Son') echo 'selected' ?>>Son</option>
                                                    <option value="Daughter" <?php if($row->dependency==='Daughter') echo 'selected' ?>>Daughter</option>
                                                </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_fname" class="col-form-label">First Name</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_fname;?>" name="pat_fname" class="form-control" id="pat_fname" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_mname" class="col-form-label">Middle Name</label>
                                            <input type="text" value="<?php echo $row->pat_mname;?>" name="pat_mname" class="form-control" id="pat_mname" placeholder="Middle Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_lname" class="col-form-label">Last Name</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_lname;?>" name="pat_lname" class="form-control" id="pat_lname" placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_dob" class="col-form-label">Date of Birth</label>
                                            <input type="date" required="required" value="<?php echo $row->pat_dob;?>" name="pat_dob" class="form-control" id="pat_dob">
                                        </div>
                                        <div class="form-group col-md-2">
                                                <label for="pat_gender" class="col-form-label">Gender</label>
                                                <select id="pat_gender" required="required" name="pat_gender" class="form-control choice">
                                                    <option value="Male" <?php if($row->pat_gender==='Male') echo 'selected' ?>>Male</option>
                                                    <option value="Female" <?php if($row->pat_gender==='Female') echo 'selected' ?>>Female</option>
                                                </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                                <label for="pat_status" class="col-form-label">Marital Status</label>
                                                <select id="pat_status" required="required" name="pat_status" class="form-control choice">
                                                    <option value="Celibate" <?php if($row->pat_status==='Celibate') echo 'selected' ?>>Celibate</option>
                                                    <option value="Complicated" <?php if($row->pat_status==='Complicated') echo 'selected' ?>>Complicated</option>
                                                    <option value="Divorce" <?php if($row->pat_status==='Divorce') echo 'selected' ?>>Divorce</option>
                                                    <option value="Married" <?php if($row->pat_status==='Married') echo 'selected' ?>>Married</option>
                                                    <option value="Others" <?php if($row->pat_status==='Others') echo 'selected' ?>>Others</option>
                                                    <option value="Single" <?php if($row->pat_status==='Single') echo 'selected' ?>>Single</option>
                                                </select>
                                            </div>
                                        <div class="form-group col-md-2">
                                        <label for="pat_religion" class="col-form-label">Religion</label>
                                                <select id="pat_religion" required="required" name="pat_religion" class="form-control choice">
                                                    <option value="Christianity" <?php if($row->pat_religion==='Christianity') echo 'selected' ?>>Christianity</option>
                                                    <option value="Islam" <?php if($row->pat_religion==='Islam') echo 'selected' ?>>Islam</option>
                                                    <option value="Others" <?php if($row->pat_religion==='Others') echo 'selected' ?>>Others</option>
                                                </select>
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_trade" class="col-form-label">Trade</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_trade;?>" name="pat_trade" class="form-control" id="pat_trade">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_unit" class="col-form-label">Unit</label>
                                            <input type="text" value="<?php echo $row->pat_unit;?>" name="pat_unit" class="form-control" id="pat_unit">
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label for="pat_phone" class="col-form-label">Phone</label>
                                            <input type="text" required="required" value="<?php echo $row->pat_phone;?>" name="pat_phone" class="form-control" id="pat_phone">
                                        </div>
                                        <div class="col-md-2">
                                                    <label for="pat_height" class="col-form-label">Height</label>
                                                    <input type="text" value="<?php echo $row->pat_height;?>" name="pat_height" class="form-control" id="pat_height" placeholder="Height (m)">
                                        </div>
                                        <div class="col-md-2">
                                                    <label for="pat_weight" class="col-form-label">Weight</label>
                                                    <input type="text" value="<?php echo $row->pat_weight;?>" name="pat_weight" class="form-control" id="pat_weight" placeholder="Weight (Kg)">
                                        </div>
                                        <div class="col-md-2">
                                                    <label for="pat_bmi" class="col-form-label">BMI</label>
                                                    <input type="text" disabled value="<?php echo $row->pat_bmi;?>" name="pat_bmi" class="form-control" id="pat_bmi" placeholder="BMI (Kg/m2)">
                                        </div>
                                        <div class="form-group col-md-2">
                                                <label for="pat_email" class="col-form-label">Email</label>
                                                <input type="email" value="<?php echo $row->pat_email;?>" name="pat_email" class="form-control" id="pat_email" placeholder="Optional">
                                        </div>
                                    </div>
                                    <div class="form-row bg-success p-1">
                                        <h3 class="header-title text-light">Next of Kin</h3>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                                    <label for="nok_fullname" class="col-form-label">Full Name</label>
                                                    <input type="text" required="required" value="<?php echo $row->nok_fullname;?>" name="nok_fullname" class="form-control" id="nok_fullname" placeholder="Full Name">
                                        </div>
                                        <div class="form-group col-md-2">
                                                    <label for="nok_phone" class="col-form-label">NOK Phone</label>
                                                    <input type="tel" required="required" value="<?php echo $row->nok_phone;?>" name="nok_phone" class="form-control" id="nok_phone" placeholder="Phone Number">
                                        </div> 
                                    </div>
                                    <div class="form-row bg-success p-1">
                                        <h3 class="header-title text-light">Contacts</h3>
                                    </div>
                                    <div class="form-row">                                            
                                        <div class="form-group col-md-6">
                                            <label for="pat_address" class="col-form-label">Patient Address</label>
                                            <textarea required="required" class="form-control" name="pat_address" id="pat_address" rows="5" placeholder="Contact Address"><?php echo $row->pat_address;?></textarea>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="nok_address" class="col-form-label">NOK Address</label>
                                            <textarea class="form-control" required="required" name="nok_address" id="nok_address" rows="5" placeholder="Contact Address"><?php echo $row->nok_address;?></textarea>
                                        </div>                                            
                                    </div>

                                    <button type="submit" name="update_patient" class="ladda-button btn btn-success" data-style="expand-right">Update</button>

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
  <h2 class="lead">This page cannot be loaded without patient number.</h2>
  <h3>Go back to <a class="navbar-item" href="his_doc_dashboard.php" role="button">Dashboard</a></h3>
    </body>
    </html>
<?php
}

?>