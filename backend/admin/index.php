<?php
    session_start();
    include('assets/inc/config.php');//get configuration file
    if(isset($_POST['admin_login']))
    {
        $ad_email=$_POST['ad_email'];
        $ad_pwd= $_POST['ad_pwd'];//double encrypt to increase security
        $stmt=$mysqli->prepare("SELECT ad_email ,ad_pwd , ad_id FROM his_admin WHERE ad_email=? AND ad_pwd=? ");//sql to log in user
        $stmt->bind_param('ss',$ad_email,$ad_pwd);//bind fetched parameters
        $stmt->execute();//execute bind
        $stmt -> bind_result($ad_email,$ad_pwd,$ad_id);//bind result
        $rs=$stmt->fetch();
        $_SESSION['ad_id']=$ad_id;//Assign session to admin id
        //$uip=$_SERVER['REMOTE_ADDR'];
        //$ldate=date('d/m/Y h:i:s', time());
        if($rs)
            {//if its sucessfull
                header("location:his_admin_dashboard.php");
            }

        else
            {
            #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
                $err = "Access Denied Please Check Your Credentials";
            }
    }
?>
<!--End Login-->
<!DOCTYPE html>
<html lang="en">
<!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->

<head>
    <meta charset="utf-8" />
    <title>041 CD Medical Center</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="" name="MartDevelopers" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">
    <!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->
    <!-- App css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/styles.css" rel="stylesheet" type="text/css" />
    <!--Load Sweet Alert Javascript-->

    <script src="assets/js/swal.js"></script>
    <!--Inject SWAL-->
    <?php if(isset($success)) {?>
    <!--This code for injecting an alert-->
    <script>
    setTimeout(function() {
            swal("Success", "<?php echo $success;?>", "success");
        },
        100);
    </script>

    <?php } ?>

    <?php if(isset($err)) {?>
    <!--This code for injecting an alert-->
    <script>
    setTimeout(function() {
            swal("Failed", "<?php echo $err;?>", "Failed");
        },
        100);
    </script>

    <?php } ?>

</head>

<body>

<div class="main-area"> 
                            <header></header>
                            <div class="row justify-content-center m-2">
                            
                            <form method='post' class="col-sm-6 p-4">
                            <div class="text-center w-75 m-auto">
                                <a href="../../../index.php">
                                    <img src="../../assets/images/logo/logo.JPG" alt="Hello" height="50" width="80">
                                </a>
                                <h3>Login as Admin</h3>
                            </div>

                            <form method='post'>

                                <div class="form-group mb-3">
                                    <label for="emailaddress">Email address</label>
                                    <input class="form-control" name="ad_email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">Password</label>
                                    <input class="form-control" name="ad_pwd" type="password" required="" id="password" placeholder="Enter your password">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn btn-primary btn-block" name="admin_login" type="submit"> Admin Log In </button>
                                </div>

                            </form>
                          
                            </div>

<footer class="text-light text-center p-2">
Designed by IT Squadron 041 CD Shasha<br/>
<span id="year"></span> &copy; copyright reserved.

</footer>
</div>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.min.js"></script>
    <script>
    document.getElementById('year').innerText = new Date().getFullYear();
    </script>
</body>
<!-- Author By: MH RONY
Author Website: https://developerrony.com
Github Link: https://github.com/dev-mhrony
Youtube Link: https://www.youtube.com/channel/UChYhUxkwDNialcxj-OFRcDw
-->

</html>