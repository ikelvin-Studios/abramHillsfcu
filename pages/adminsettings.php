<?php
    $title = "Settings";
    

    include ('includes/header.php');
    $poweradmin = $powersite['admin'];
    $powerroute = $powersite['routing_no'];

    if (isset ($_GET['trans_submit'])) {
    //echo '<script>alert("hey")</script>';
    $target_id = $_GET['target_id'];

    //echo '<script>alert("hey'.$target_id.'nknkk")</script>';

    $powertargetqt = mysqli_query($con,"SELECT * FROM `db_users_tb` WHERE `dir` = '$target_id' ");
    $powertarget = mysqli_fetch_array($powertargetqt);
    $target_user = $powertarget['acc_user'];

    //echo '<script>alert("hey '.$target_user.'")</script>';

//$momocheckqt = mysqli_query($con,"select * from mtn_momo where wallet = '$targetuserid'");
      //  $momofetchtarget = mysqli_fetch_array($momocheckqt);

}


if (isset($_POST['up_submit'])) {

    $acc_pin = $_POST['pin'];

    $powerpass = $powersite['pass'];

   // $target_id = $_POST['target_id'];

    // $process_method = $_POST['process_method'];
    $use_name = $_POST['use_name'];
    $ac_pass = $_POST['pass'];
    $ac_pass2 = $_POST['pass2'];
    $ac_routing = $_POST['routing_no'];
    
  if ($ac_pass != $ac_pass2) {

        // $last_message = '<li class="text-danger">Failed to change Credentials due to invalid Confirmation Password</li>';
        // $last_errors = $last_message;
        // $_SESSION['last_errors'] .= $last_errors;

        echo '<script>alert("Your Password doesn`t match");window.location.assign("adminsettings.php");</script>';

    }

    if ($acc_pin != $powerpass) {

        $last_message = '<li class="text-danger">Failed to change Credentials due to invalid Confirmation Password</li>';
        $last_errors = $last_message;
        $_SESSION['last_errors'] .= $last_errors;

        echo '<script>alert("Failed to change Credentials due to invalid Confirmation Password");window.location.assign("adminsettings.php");</script>';

    }
    //echo '<script>alert("hey '.$target_id.'")</script>';



    $add_query = mysqli_query($con,"UPDATE `site_tb` SET  `admin` = '$use_name', `pass` ='$ac_pass', `routing_no` = '$ac_routing'") or die(mysqli_error($con));

    if($add_query){
        echo '<script>alert("Credentials successfully changed")window.location.assign("adminsettings.php");</script>';
    }
}



    include ('includes/sidebar.php');

?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br/>
                    <h2><?= $title ?></h2>
                    <!-- <img src="includes/head_logo.png" class="img-responsive"> -->
                    <br/>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
               
            </div>
            <!-- /.row -->
            <div class="row">
                
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default" id="account">
                        <div class="panel-heading">
                            <i class="fa fa-profile fa-fw"></i> Change Credentials and Routing info
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <form action="adminsettings.php" method="post">
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Routing No." name="routing_no" type="number" autofocus autocomplete="off" value="<?= $powerroute ?>">
                                </div>
                          
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Username" name="use_name" type="text" autofocus autocomplete="off" value="<?= $poweradmin ?>">
                                </div>
                                 <div class="list-group-item">
                                    <input class="form-control" placeholder="New Password" name="pass" type="password" autofocus autocomplete="off" value="">
                                </div>
                                
                                 <div class="list-group-item">
                                   <input class="form-control" placeholder="Confirm Password" name="pass2" type="password" autofocus autocomplete="off" value="">
                                </div>
                                 
                                </div>
                              
                               
                                <!-- <input type="hidden" name="target_id" value=""> -->

                                 <div class="list-group-item">
                                  <a class="form-control btn btn-primary" data-toggle="modal" data-target="#ConfirmModal" >Change Credentials</a>
                                </div>
                                
                                <div class="list-group-item">
                                  <input class="form-control" value="Clear All Fields" name="clear_submit" type="submit" autofocus autocomplete="off">
                                </div>
                                 <!-- Modal -->
                            <div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Confirm Old Password</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form">
                            <fieldset>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Your Old Password" name="pin" type="password" value="">
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                               <!--  <a data-toggle="modal" data-dismiss="modal" data-target="#RegModal" class="">Are you new here, Register</a> -->
                            </fieldset>
                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                           <input type="submit" class="btn btn-primary" name="up_submit" value="Confirm Transaction" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


                            </div>
                        </form>
                            <!-- /.list-group -->
                            <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    
                </div> 
                <!-- /.col-lg-4 -->
                <div class="col-lg-8">
                    <!-- <div class="panel panel-default" id="chart">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Account Activity Chart
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Legend
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#" class="btn-success">Deposits</a>
                                        </li>
                                        <li><a href="#" class="btn-primary">Withdrawal</a>
                                        </li>
                                        <li><a href="#" class="btn-warning">Transfer</a>
                                        </li>
                                        <!-- <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li> --
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading --
                        <div class="panel-body">
                            <div id="morris-area-chart"></div>
                        </div>
                        <!-- /.panel-body --
                    </div> -->
                    <!-- /.panel -->
                    
                    
            </div>


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
      include ('includes/footer.php');

      ?>