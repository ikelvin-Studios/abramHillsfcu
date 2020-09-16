<?php
    $title = "Account Management";

    include ('includes/header.php');

    function pin_generate(){

    // global $con;

    $generated_pin = rand(100000,999999);
    return $generated_pin;
    // $ref_pin_query = mysqli_query($con, "select * from deposits where `pin` = '$generated_ref' and `status` = 'open'");

    // if(mysqli_num_rows($ref_pin_query)>0){
    //     ref_generate();
    // }
    // else{
    //     return $generated_ref;
    // }
}

if (isset($_POST['add_submit'])) {

     //echo '<script>alert("manageusers.php");</script>';

    $acc_user = $_POST['acc_user'];
    $acc_pass = $_POST['acc_pass'];
    $acc_name = $_POST['acc_name'];
    $acc_type = $_POST['acc_type'];
    $acc_num = $_POST['acc_num'];
    $acc_dob = $_POST['acc_dob'];
    $acc_balance = $_POST['acc_balance'];
    $has_invest = $_POST['has_invest'];
    $invest_revenue = $_POST['invest_revenue'];
    $invest_plan = $_POST['invest_plan'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $reg_date = date('Y-m-d');
    $start_date = date('Y-m-d');
    $end_date = $_POST['end_date'];
    // $end_date =
    $status = "enabled";
    $acc_pin = pin_generate();
    $buyer = $_POST['buyer'];
    $qn1 = $_POST['qn1'];
    $qn1_ans = $_POST['qn1_ans'];
    $qn2 = $_POST['qn2'];
    $qn2_ans = $_POST['qn2_ans'];



    $add_query = mysqli_query($con,"INSERT INTO `db_users_tb` (`acc_user`, `acc_pass`, `acc_name`, `acc_type`, `acc_num`, `acc_dob`, `acc_balance`, `has_invest`, `invest_revenue`, `invest_plan`, `country`, `state`, `region`, `city`, `reg_date`, `start_date`, `end_date`, `status`, `acc_pin`, `buyer`, `qn1`, `qn1_ans`, `qn2`, `qn2_ans`) VALUES ('$acc_user', '$acc_pass', '$acc_name', '$acc_type', '$acc_num', '$acc_dob', '$acc_balance', '$has_invest', '$invest_revenue', '$invest_plan', '$country', '$state', '$region', '$city', '$reg_date', '$start_date', '$end_date', '$status', '$acc_pin', '$buyer', '$qn1', '$qn1_ans', '$qn2', '$qn2_ans');") or die(mysqli_error($con));

    if($add_query){
        echo '<script>window.location.assign("manageusers.php");</script>';
    }
}

if (isset($_POST['update_submit'])) {

    $acc_user = $_POST['acc_user'];
    $acc_pass = $_POST['acc_pass'];
    $acc_name = $_POST['acc_name'];
    $acc_type = $_POST['acc_type'];
    $acc_num = $_POST['acc_num'];
    $acc_dob = $_POST['acc_dob'];
    $acc_balance = $_POST['acc_balance'];
    $has_invest = $_POST['has_invest'];
    $invest_revenue = $_POST['invest_revenue'];
    $invest_plan = $_POST['invest_plan'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $region = $_POST['region'];
    $city = $_POST['city'];

    $end_date = $_POST['end_date'];

    $buyer = $_POST['buyer'];
    $qn1 = $_POST['qn1'];
    $qn1_ans = $_POST['qn1_ans'];
    $qn2 = $_POST['qn2'];
    $qn2_ans = $_POST['qn2_ans'];

    $acc_id = $_POST['confirm_id'];

    $up_query = mysqli_query($con,"UPDATE `db_users_tb` SET `acc_user` = '$acc_user', `acc_pass` = '$acc_pass', `acc_name` = '$acc_name', `acc_type` = '$acc_type', `acc_num` = '$acc_num', `acc_dob` = '$acc_dob', `acc_balance` = '$acc_balance', `has_invest` = '$has_invest', `invest_revenue` = '$invest_revenue', `invest_plan` = '$invest_plan', `country` = '$country', `state` = '$state', `region` = '$region', `city` = '$city', `reg_date` = '$reg_date', `end_date` = '$end_date', `buyer` = '$buyer', `qn1` = '$qn1', `qn1_ans` = '$qn1_ans', `qn2` = '$qn2', `qn2_ans` = '$qn2_ans' WHERE `db_users_tb`.`dir` = '$acc_id';") or die(mysqli_error($con));

    if($up_query){

        //echo '<script>alert("up submit '.$acc_id.'");</script>';
        echo '<script>window.location.assign("manageusers.php");</script>';

    }
}


if (isset($_GET['edit_submit'])) {

    

    $acc_id = $_GET['confirm_id'];
    



    $edit_q = mysqli_query($con,"SELECT * FROM `db_users_tb` WHERE `dir` = '$acc_id';") or die(mysqi_error($con));

    if(mysqli_num_rows($edit_q) > 0){

        $edit = mysqli_fetch_array($edit_q);

        $acc_user = $edit['acc_user'];
        $acc_pass = $edit['acc_pass'];
        $acc_name = $edit['acc_name'];
        $acc_type = $edit['acc_type'];
        $acc_num = $edit['acc_num'];
        $acc_dob = $edit['acc_dob'];
        $acc_balance = $edit['acc_balance'];
        $has_invest = $edit['has_invest'];
        $invest_revenue = $edit['invest_revenue'];
        $invest_plan = $edit['invest_plan'];
        $country = $edit['country'];
        $state = $edit['state'];
        $region = $edit['region'];
        $city = $edit['city'];
        
        $end_date = $edit['end_date'];
       
        
        $acc_pin = $edit['acc_pin'];
        $buyer = $edit['buyer'];
        $qn1 = $edit['qn1'];
        $qn1_ans = $edit['qn1_ans'];
        $qn2 = $edit['qn2'];
        $qn2_ans = $edit['qn2_ans'];

        $updater = 1;

        // echo '<script>alert("edit submit '.$acc_id.'");</script>';

    }
}
if (isset($_GET['delete_submit'])) {

     //echo '<script>alert("enable");</script>';
     $acc_id = $_GET['confirm_id'];

 $enable_query = mysqli_query($con," UPDATE `db_users_tb` SET `status`='deleted' WHERE `dir` = '$acc_id';") or die(mysqli_error($con));

    if($enable_query){
        echo '<script>window.location.assign("manageusers.php");</script>';
    }
}

if (isset($_GET['enable_submit'])) {

     //echo '<script>alert("enable");</script>';
     $acc_id = $_GET['confirm_id'];

 $enable_query = mysqli_query($con," UPDATE `db_users_tb` SET `status`='enabled' WHERE `dir` = '$acc_id';") or die(mysqli_error($con));

    if($enable_query){
        echo '<script>window.location.assign("manageusers.php");</script>';
    }
}

if (isset($_GET['disable_submit'])) {

 //echo '<script>alert("dissable");</script>';
 $acc_id = $_GET['confirm_id'];

 $disable_query = mysqli_query($con," UPDATE `db_users_tb` SET `status`='disabled' WHERE `dir` = '$acc_id';") or die(mysqi_error($con));

    if($disable_query){
        echo '<script>window.location.assign("manageusers.php");</script>';
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
                            <i class="fa fa-profile fa-fw"></i> Add Account
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <form action="manageusers.php" method="post">
                                <div class="list-group-item">
                                   <input class="form-control" placeholder="Banking ID" name="acc_user" type="text" autofocus autocomplete="off" value="<?= $acc_user ?>">
                                </div> 
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Password" name="acc_pass" type="text" autofocus autocomplete="off"  value="<?= $acc_pass ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Full Name" name="acc_name" type="text" autofocus autocomplete="off"  value="<?= $acc_name ?>">
                                </div>
                               
                                <div class="list-group-item">
                                    <label>Account Type</label>
                                   <select class="form-control"  name="acc_type" >
                                       <option value="Savings" 
                                       <?php if ($acc_type == "Savings") {
                                        echo "selected";
                                    }
                                    ?> >Savings</option>
                                       <option value="Military"<?php if ($acc_type == "Military") {
                                        echo "selected";
                                    }
                                    ?> >Military</option>
                                       <option value="Credit" <?php if ($acc_type == "Credit") {
                                        echo "selected";
                                    }
                                    ?> >Credit</option>
                                       <option value="Business"<?php if ($acc_type == "Business") {
                                        echo "selected";
                                    }
                                    ?> >Business</option>
                                   </select>
                                </div>
                                <div class="list-group-item">
                                   <input class="form-control" placeholder="Account No." name="acc_num" type="text" autofocus autocomplete="off" value="<?= $acc_num ?>">
                                </div> 
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Account Balance" name="acc_balance" type="text" autofocus autocomplete="off" value="<?= $acc_balance ?>">
                                </div>
                                
                                <div class="list-group-item">
                                    <label>Has Investment</label>
                                   <select class="form-control"  name="has_invest" >
                                       <option value="yes" <?php if ($has_invest == "yes") {
                                        echo "selected";
                                    }
                                    ?>>Yes</option>
                                       <option value="no" <?php if ($has_invest == "no") {
                                        echo "selected";
                                    }
                                    ?>>No</option>
                                       
                                   </select>
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Investment Plan" name="invest_plan" type="text" autofocus autocomplete="off" value="<?= $invest_plan ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Investment Revenue" name="invest_revenue" type="text" autofocus autocomplete="off" value="<?= $invest_revenue ?>">
                                </div>
                                
                                <div class="list-group-item">
                                    <label>Security QnA</label>
                                    <input class="form-control" placeholder="1st Question" name="qn1" type="text" autofocus autocomplete="off" value="<?= $qn1 ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="1st Answer" name="qn1_ans" type="text" autofocus autocomplete="off" value="<?= $qn1_ans ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="2st Question" name="qn2" type="text" autofocus autocomplete="off" value="<?= $qn2 ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="2st Answer" name="qn2_ans" type="text" autofocus autocomplete="off" value="<?= $qn2_ans ?>">
                                </div>
                                
                                <div class="list-group-item">
                                    <label>Location</label>
                                    <input class="form-control" placeholder="Country" name="country" type="text" autofocus autocomplete="off" value="<?= $country ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="state" name="state" type="text" autofocus autocomplete="off" value="<?= $state ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Region" name="region" type="text" autofocus autocomplete="off" value="<?= $region?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="City" name="city" type="text" autofocus autocomplete="off" value="<?= $city ?>">
                                </div>
                                
                                <div class="list-group-item">
                                    <label>Buyer Contract</label>
                                    <input class="form-control" placeholder="Buyer" name="buyer" type="text" autofocus autocomplete="off" value="<?= $buyer ?>">
                                </div>
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="End Date (dd/mm/yyyy)" name="end_date" type="date" autofocus autocomplete="off" value="<?= $end_date ?>">
                                </div>
                                <?php  if ($updater == 0) { ?>
                                <div class="list-group-item">
                                  <input class="form-control" value="Add Account" name="add_submit" type="submit" autofocus autocomplete="off">
                                </div>
                                <?php }
                                 if ($updater == 1) { ?>
                                <input type="hidden" name="confirm_id" value="<?=$acc_id;?>">
                                 <div class="list-group-item">
                                  <input class="form-control" value="Update Account" name="update_submit" type="submit" autofocus autocomplete="off">
                                </div>
                                <?php } ?>
                                <div class="list-group-item">
                                  <input class="form-control" value="Clear All Fields" name="clear_submit" type="submit" autofocus autocomplete="off">
                                </div>


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
                    <div class="panel panel-default" id="transactions">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Manage Accounts
                           <!--  <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        Actions
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Action</a>
                                        </li>
                                        <li><a href="#">Another action</a>
                                        </li>
                                        <li><a href="#">Something else here</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="dataTables-example" class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    
                                                    <th>Action</th>
                                                    <th>End Date</th>
                                                    <th>Banking ID</th>
                                                    <th>Pin</th>
                                                    <th>Buyer</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i=1;
                                                    $query = mysqli_query($con,"SELECT * FROM `db_users_tb`  WHERE `status` != 'deleted' order by dir desc");

                                                    if(mysqli_num_rows($query)>0){
                                                        while($row = mysqli_fetch_array($query)){
                                                            $id = $row['dir'];
                                                            $date = $row['end_date'];
                                                            $buyer = $row['buyer'];
                                                            $acc_user = $row['acc_user'];
                                                            $pin = $row['acc_pin'];
                                                            $status = $row['status'];
                                                            
                                                            ?>
                                                                                      

                                                <tr>
                                                     <td> <form method="get" action="transactions.php">
                                                  
                                                    <input type="hidden" name="target_id" value="<?=$id?>">
                                                    <input type="submit" name="trans_submit" value="Transactions" class="btn btn-info"></form>

                                                <form method="get" action="manageusers.php">
                                                    
                                                    <input type="hidden" name="confirm_id" value="<?= $id ?>">

                                                    <input type="submit" name="edit_submit" value="Edit" class="btn btn-primary">
													<input type="submit" name="delete_submit" value="Delete" class="btn btn-danger">
                                                    <?php  if ($status == "disabled") { ?>

                                                    <input type="submit" name="enable_submit" value="Enable" class="btn btn-success">
                                                    <?php }
                                                     if ($status == "enabled") { ?>
                                                    <input type="submit" name="disable_submit" value="Disable" class="btn btn-warning">
													
                                                    <?php  } ?>
                                                </form> </td>
                                                    <td><?= $date ?></td>
                                                    <td><?= $acc_user ?></td>
                                                    <td><?= $pin ?></td>
                                                    <td><?= $buyer ?></td>
                                                </tr>
                                                <?php

                                                            $i++;
                                                        }

                                                    }
                                                    else{
                                                        ?>
                                                        <tr>
                                                            <td colspan="5">You Have No Accounts Yet</td>
                                                        </tr>


                                                        <?php
                                                    }

                                                ?>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                                <!-- /.col-lg-4 (nested) -->
                                <!-- <div class="col-lg-8">
                                    <div id="morris-bar-chart"></div>
                                </div> -->
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   
                </div> -->
            </div>


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
      include ('includes/footer.php');

      ?>