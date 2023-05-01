<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  //$aid=$_SESSION['ad_id'];
  $doc_id = $_SESSION['doc_id'];
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
                                        <li class="breadcrumb-item active">Manage Patients</li>
                                    </ol>
                                </div>
                                <h4 class="page-title">Manage Patient Diagnosis</h4>
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
                                                <th data-toggle="true">Date</th>
                                                <th data-toggle="true">Diagnosis No</th>
                                                <th data-toggle="true">Reg No</th>
                                                <th data-toggle="true">Full Name</th>
                                                <th data-hide="phone">Age</th>
                                                <th data-hide="phone">Gender</th>
                                                <th data-hide="phone">Dependency</th>
                                                <th data-hide="phone">BP</th>
                                                <th data-hide="phone">Height</th>
                                                <th data-hide="phone">Weight</th>
                                                <th data-hide="phone">BMI</th>
                                                <th data-hide="phone">Temp</th>
                                                <th data-hide="phone">Presenting Complain</th>
                                                <th data-hide="phone">Examination</th>
                                                <th data-hide="phone">Diagnosis</th>
                                                <th data-hide="phone">Management</th>
                                                <th data-hide="phone">Doctor</th>
                                                <th data-hide="phone"></th>
                                            </tr>
                                        
                                        <?php
                                            /*
                                                *get details of allpatients
                                                *
                                            */
                                                $ret="SELECT * FROM  his_diagnosis_record ORDER BY date_rec DESC"; 
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
                                                <td><?php echo $row->date_rec;?></td>
                                                <td><?php echo $row->diagnosis_number;?></td>
                                                <td><?php echo $row->pat_regnumber;?></td>
                                                <td><?php echo $row->pat_fullname;?></td>
                                                <td><?php echo $row->pat_age;?></td>
                                                <td><?php echo $row->pat_gender;?></td>
                                                <td><?php echo $row->dependency;?></td>
                                                <td><?php echo $row->pat_bp;?></td>
                                                <td><?php echo $row->pat_height?></td>
                                                <td><?php echo $row->pat_weight?></td>
                                                <td><?php echo $row->pat_bmi?></td>
                                                <td><?php echo $row->pat_temp?></td>
                                                <td><?php echo $row->presenting_complain?></td>
                                                <td><?php echo $row->examination?></td>
                                                <td><?php echo $row->diagnosis?></td>
                                                <td><?php echo $row->management;?></td>
                                                <td><?php echo $row->doc_number;?></td>
                                                <td>
                                                    <a href="his_doc_view_single_diagnosis.php?diagnosis_number=<?php echo $row->diagnosis_number;?>" class="badge badge-success"><i class="mdi mdi-eye"></i> View</a>
                                                    <a href="his_doc_update_single_diagnosis.php?diagnosis_number=<?php echo $row->diagnosis_number;?>" class="badge badge-primary"><i class="mdi mdi-check-box-outline "></i> Update</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        <?php  $cnt = $cnt +1 ; }?>
                                        <tfoot>
                                            <tr class="active">
                                                <td colspan="15">
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