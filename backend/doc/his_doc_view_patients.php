<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  //$aid=$_SESSION['ad_id'];
  $doc_id = $_SESSION['doc_id']
?>

<!DOCTYPE html>
<html lang="en">

<?php include('assets/inc/head.php');?>

<body>

    <!-- Begin page -->
    <div id="wrapper">
     
        <!-- Topbar Start -->
        <?php include('assets/inc/nav.php');?>
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
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">Patients</a></li>
                                        <li class="breadcrumb-item active">View Patients</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Patient Details</h4>
                            </div>
                        </div>
                    </div>
                    <!-- end page title -->
                   
                    <div class="row">
                        <div class="col-12">
                            <div class="card-box">
                                <h4 class="header-title"></h4>
                                <div class="mb-2">
                                    <div class="row">
                                        <div class="col-12 text-sm-center form-inline">
                                            <div class="form-group mr-2" style="display:none">
                                                <select id="demo-foo-filter-status" class="custom-select custom-select-sm">
                                                    <option value="">Show all</option>
                                                    <option value="Discharged">Discharged</option>
                                                    <option value="OutPatients">OutPatients</option>
                                                    <option value="InPatients">InPatients</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input id="demo-foo-search" type="text" placeholder="Search" class="form-control form-control-sm" autocomplete="on">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="table-responsive">
                                    <table id="demo-foo-filtering" class="table table-bordered toggle-circle mb-0" data-page-size="7">
                                        
                                            <tr>
                                                <th>Serial</th>
                                                <th data-toggle="true">Date Enrolled</th>
                                                <th data-toggle="true">Reg No</th>
                                                <th data-toggle="true">Staff/Svc No</th>
                                                <th data-toggle="true">Full Name</th>
                                                <th data-hide="phone">Date of Birth</th>
                                                <th data-hide="phone">Gender</th>
                                                <th data-hide="phone">Status</th>
                                                <th data-hide="phone">Religion</th>
                                                <th data-hide="phone">Trade</th>
                                                <th data-hide="phone">Phone Number</th>
                                                <th data-hide="phone">Email</th>
                                                <th data-hide="phone">Contact Address</th>
                                                <th data-hide="phone">Unit</th>
                                                <th data-hide="phone">NOK</th>
                                                <th data-hide="phone">NOK Phone</th>
                                                <th data-hide="phone">NOK Address</th>
                                                <th data-hide="phone"></th>
                                            </tr>
                                        
                                        <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_pat_data ORDER BY date_enrolled DESC "; 
                                                //sql code to get to ten docs  randomly
                                                $stmt= $mysqli->prepare($ret) ;
                                                $stmt->execute() ;//ok
                                                $res=$stmt->get_result();
                                                $cnt=1;
                                                while($row=$res->fetch_object())
                                                {
                                            ?>

                                        <tbody>
                                            <tr>
                                                <td><?php echo $cnt;?></td>
                                                <td><?php echo $row->date_enrolled;?></td>
                                                <td><?php echo $row->pat_regnumber;?></td>
                                                <td><?php echo $row->pat_number;?></td>
                                                <td><?php echo $row->pat_title;?> <?php echo $row->pat_fname;?> <?php echo $row->pat_mname;?> <?php echo $row->pat_lname;?></td>
                                                <td><?php echo $row->pat_dob?></td>
                                                <td><?php echo $row->pat_gender?></td>
                                                <td><?php echo $row->pat_status?></td>
                                                <td><?php echo $row->pat_religion?></td>
                                                <td><?php echo $row->pat_trade?></td>
                                                <td><?php echo $row->pat_phone?></td>
                                                <td><?php echo $row->pat_email?></td>
                                                <td><?php echo $row->pat_address;?></td>
                                                <td><?php echo $row->pat_unit;?></td>
                                                <td><?php echo $row->nok_fullname;?></td>
                                                <td><?php echo $row->nok_phone;?></td>
                                                <td><?php echo $row->nok_address;?></td>
                                                <td><a href="his_doc_view_single_patient.php?pat_regnumber=<?php echo $row->pat_regnumber;?>&&pat_number=<?php echo $row->pat_number;?>&&pat_name=<?php echo $row->pat_fname;?>_<?php echo $row->pat_mname;?>_<?php echo $row->pat_lname;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a></td>
                                            </tr>
                                        </tbody>
                                        <?php  $cnt = $cnt +1 ; }?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="18">
                                                    <div class="text-right">
                                                        <ul class="pagination pagination-rounded justify-content-end footable-pagination m-t-10 mb-0"></ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div> <!-- end .table-responsive-->
                            </div> <!-- end card-box -->
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

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- Footable js -->
    <script src="assets/libs/footable/footable.all.min.js"></script>

    <!-- Init js -->
    <script src="assets/js/pages/foo-tables.init.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>

</body>

</html>