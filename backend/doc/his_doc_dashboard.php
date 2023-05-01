<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $doc_id=$_SESSION['doc_id'];
  $doc_number = $_SESSION['doc_number'];
  $pat_title;$id;
?>

<!DOCTYPE html>
<html lang="en">

<!--Head Code-->
<?php include("assets/inc/head.php");?>

<body>

    <!-- Begin page -->
    <div id="wrapper">
      
        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php');?>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <?php include('assets/inc/sidebar.php');?>
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
                            <label for="pat_regnumber" class="col-form-label">Registration Number</label>
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

                                <h2 class="py-2 bg-light">Record</h2>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->

                    <div class="row">

                    <!--Start Profile-->

                    <div class="col-md-6 col-xl-4">
                            <a href="his_doc_account.php">
                            <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border-success">
                                                <i class="fas fa-user-tag font-22 avatar-title text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"></span>Profile</h3>
                                                <p class="text-secondary">My Profile</p>
                                            </div>
                                        </div>
                                    </div> <!-- end row-->
                                </div>
                            </a> <!-- end widget-rounded-circle-->
                        </div>
                        <!-- end col-->
                        <!--End Profile-->
        
                        <!--Start Patients-->
                        <a href="his_doc_view_patients.php" class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border-success">
                                            <i class="fab fa-accessible-icon  font-22 avatar-title text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                                    //code for summing up number of out patients 
                                                    $result ="SELECT count(*) FROM his_pat_data  ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($patient);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $patient;?></span></h3>
                                            <p class="text-secondary mt-1"><?php if($patient>1) echo "Patients"; else echo "Patient"; ?></p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </a> <!-- end col-->
                        <!--End Patients-->

                        <!--Start Referals-->
                        <a href="his_doc_view_transfers.php" class="col-md-6 col-xl-4">
                            <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border-success">
                                            <i class="fab fa-accessible-icon  font-22 avatar-title text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                                    //code for summing up number of out patients 
                                                    $result ="SELECT count(*) FROM his_patient_transfers";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($referal);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $referal;?></span></h3>
                                            <p class="text-secondary mt-1"><?php if($referal>1) echo "Referals"; else echo "Referal"; ?></p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </a> <!-- end col-->
                        <!--End Referals-->

                        <!--Start Assets-->
                        <div class="col-md-6 col-xl-6">
                        <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success">
                                            <i class="mdi mdi-flask font-22 avatar-title text-danger"></i>
                                        </div>
                                    </div>
                     
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                                    /* 
                                                     * code for summing up number of assets,
                                                     */ 
                                                    $result ="SELECT count(*) FROM his_equipments ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($assets);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $assets;?></span></h3>
                                            <p class="text-secondary mt-1">Assets</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div>
                        <!--End InPatients-->
                        
                        <!--Start Pharmaceuticals-->
                        <div class="col-md-6 col-xl-6">
                        <div class="widget-rounded-circle card-box">
                                <div class="row">
                                    <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-soft-success border-success">
                                            <i class="mdi mdi-pill font-22 avatar-title text-danger"></i>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="text-right">
                                            <?php
                                                    /* 
                                                     * code for summing up number of pharmaceuticals,
                                                     */ 
                                                    $result ="SELECT count(*) FROM his_pharmaceuticals ";
                                                    $stmt = $mysqli->prepare($result);
                                                    $stmt->execute();
                                                    $stmt->bind_result($phar);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                ?>
                                            <h3 class="text-dark mt-1"><span data-plugin="counterup"><?php echo $phar;?></span></h3>
                                            <p class="text-secondary mt-1">Pharmaceuticals</p>
                                        </div>
                                    </div>
                                </div> <!-- end row-->
                            </div> <!-- end widget-rounded-circle-->
                        </div> <!-- end col-->
                        <!--End Pharmaceuticals-->

                           
                        <!--Start Payroll-->
                        <!-- <div class="col-md-6 col-xl-4">
                            <a href="his_doc_view_payrolls.php">
                            <div class="widget-rounded-circle card-box">
                                    <div class="row">
                                        <div class="col-6">
                                        <div class="avatar-lg rounded-circle bg-soft-success border-success">
                                                <i class="mdi mdi-flask font-22 avatar-title text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-right">
                                                <h3 class="text-dark mt-1"></span>0</h3>
                                                <p class="text-secondary mt-1">My Payroll</p>
                                            </div>
                                        </div> -->
                                 <!--   </div> end row-->
                                <!-- </div> -->
                         <!--   </a> end widget-rounded-circle-->
                     <!--   </div>  end col-->
                        <!--End Payroll-->
                    </div>

                    <!--Patients on Admission-->
                    <div class="row ">
                        <div class="col-xl-12">
                            <div class="card-box">
                                <h4 class="header-title mb-3">Admission Status</h4>
                                <?php
                                    $ret="SELECT * FROM his_pat_admission"; 
                                    $stmt= $mysqli->prepare($ret) ;
                                    $stmt->execute() ;//ok
                                    $res=$stmt->get_result();
                                    $cnt=1;
                                if($row=$res->fetch_object()){
                                ?>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-hover table-centered m-0" data-page-size="7">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>Patient Number</th>
                                                <th>Full Name</th>
                                                <th>Diagnosis</th>
                                                <th>BMI</th>
                                                <th>Blood Pressure</th>
                                                <th>Pulse Rate</th>
                                                <th>Temperature</th>
                                                <th>Sp0<sub>2</sub?</th>
                                                <th>Room</th>
                                                <th>Bed</th>
                                                <th>Admitted By</th>
                                                <th>Date of Admission</th>
                                                <th colspan="3">Actions</th>
                                            </tr>
                                        </thead>                    
                                        <?php
                                                // $pat_regnumber=$_GET['pat_regnumber'];
                                                $ret="SELECT * FROM his_pat_admission ORDER BY date_admitted DESC"; 
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                                $pat_regnumber = $row->pat_regnumber;
                                                $pat_fullname = $row->pat_fullname;
                                                $query="SELECT * FROM his_pat_data WHERE pat_regnumber=?"; 
                                                $stmt1= $mysqli->prepare($query) ;
                                                $stmt1->bind_param('s',$pat_regnumber);
                                                $stmt1->execute() ;//ok
                                                $res1=$stmt1->get_result();
                                                if($row1=$res1->fetch_object())
                                                {
                                                    $admission_number = $row->admission_number;
                                                }
                                            ?>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <?php echo $row->pat_regnumber;?>
                                                </td>
                                                <td>
                                                <?php echo $pat_fullname;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->diagnosis;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->pat_bmi;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->pat_bp;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->pulse_rate;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->pat_temp;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->sp02;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->room_number;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->bed_number;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->doc_number;?>
                                                </td>
                                                <td>
                                                    <?php echo $row->date_admitted;?>
                                                </td>
                                                <td>
                                                <a href="his_doc_update_single_admission.php?admission_number=<?php echo $row->admission_number;?>" class="btn btn-xs btn-success"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                </td>
                                                <td>
                                                <a href="his_doc_discharge_patient.php?admission_number=<?php echo $row->admission_number;?>" class="btn btn-xs btn-success"><i class="mdi mdi-check-box-outline "></i> Discharge</a>
                                                </td>
                                                <td>
                                                <a href="his_doc_patient_transfers.php?admission_number=<?php echo $row->admission_number;?>&&pat_regnumber=<?php echo $row->pat_regnumber;?>" class="btn btn-xs btn-success"><i class="mdi mdi-check-box-outline "></i> Refer</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php }?>
                                    </table>
                                </div>
                                <?php } else {
                                 echo "No patient on admission";   
                                }?>          
                            </div>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->
                 </div> <!-- container -->
            </div> <!-- content -->

            <?php
    if(isset($_POST['discharge_patient'])){
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
        $success = "Patient Was Discharged At " . $date_discharged;
        }
        else {
        $err = "Discharge Failed.";
        }
 }?>
            <!-- Footer Start -->
            <?php include('assets/inc/footer.php');?>
            <!-- end Footer -->

        </div>

    </div>
    <!-- END wrapper -->

    <!-- Right Sidebar -->
    <div class="right-bar">
        <div class="rightbar-title">
            <a href="javascript:void(0);" class="right-bar-toggle float-right">
                <i class="dripicons-cross noti-icon"></i>
            </a>
            <h5 class="m-0 text-white">Settings</h5>
        </div>
        <div class="slimscroll-menu">
            <!-- User box -->
            <div class="user-box">
                <div class="user-img">
                    <img src="assets/images/users/user-1.jpg" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                    <a href="javascript:void(0);" class="user-edit"><i class="mdi mdi-pencil"></i></a>
                </div>

                <h5><a href="javascript: void(0);">Geneva Kennedy</a> </h5>
                <p class="text-muted mb-0"><small>Admin Head</small></p>
            </div>
            <!-- Settings -->
            <hr class="mt-0" />
            <h5 class="pl-3">Basic Settings</h5>
            <hr class="mb-0" />

            <div class="p-3">
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox1" type="checkbox" checked>
                    <label for="Rcheckbox1">
                        Notifications
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox2" type="checkbox" checked>
                    <label for="Rcheckbox2">
                        API Access
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox3" type="checkbox">
                    <label for="Rcheckbox3">
                        Auto Updates
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-2">
                    <input id="Rcheckbox4" type="checkbox" checked>
                    <label for="Rcheckbox4">
                        Online Status
                    </label>
                </div>
                <div class="checkbox checkbox-primary mb-0">
                    <input id="Rcheckbox5" type="checkbox" checked>
                    <label for="Rcheckbox5">
                        Auto Payout
                    </label>
                </div>
            </div>
            <!-- Timeline -->
            <hr class="mt-0" />
            <h5 class="px-3">Messages <span class="float-right badge badge-pill badge-danger">25</span></h5>
            <hr class="mb-0" />
            <div class="p-3">
                <div class="inbox-widget">
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Tomaslau</a></p>
                        <p class="inbox-item-text">I've finished it! See you so...</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Stillnotdavid</a></p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Kurafire</a></p>
                        <p class="inbox-item-text">Nice to meet you</p>
                    </div>

                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Shahedk</a></p>
                        <p class="inbox-item-text">Hey! there I'm available...</p>
                    </div>
                    <div class="inbox-item">
                        <div class="inbox-item-img"><img src="assets/images/users/user-6.jpg" class="rounded-circle" alt=""></div>
                        <p class="inbox-item-author"><a href="javascript: void(0);" class="text-dark">Adhamdannaway</a></p>
                        <p class="inbox-item-text">This theme is awesome!</p>
                    </div>
                </div> <!-- end inbox-widget -->
            </div> <!-- end .p-3-->

        </div> <!-- end slimscroll-menu-->
    </div>
    <!-- /Right-bar -->
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Plugins js-->
    <script src="assets/libs/flatpickr/flatpickr.min.js"></script>
    <script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
    <script src="assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.time.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.tooltip.min.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.selection.js"></script>
    <script src="assets/libs/flot-charts/jquery.flot.crosshair.js"></script>

    <!-- Dashboar 1 init js-->
    <script src="assets/js/pages/dashboard-1.init.js"></script>
    <!-- App js-->
    <script src="assets/js/app.min.js"></script>

</body>

</html>