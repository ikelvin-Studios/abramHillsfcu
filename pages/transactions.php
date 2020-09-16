<?php
    $title = "Transaction Management";

    include ('includes/header.php');

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


    function pin_generate() {

    $generated_pin = rand(100000,999999);
    return $generated_pin;

    }

if (isset($_POST['add_submit'])) {


    $target_id = $_POST['target_id'];
    //$process_method = $_POST['process_method'];
	$bankname = $_POST['bankname'];
    $description = $_POST['description'];

    $pay_type = $_POST['pay_type'];
    $value = $_POST['value'];
    $date = $_POST['date'];
    $time = date('Y-m-d h:i');
    $status = "enabled";
    $acc_dir = $target_id;

    //echo '<script>alert("hey '.$target_id.'")</script>';



    $add_query = mysqli_query($con,"INSERT INTO `transact_tb` (`acc_dir`, `bankname`, `description`, `pay_type`, `value`, `date`, `time`, `status`) VALUES ('$acc_dir', '$bankname', '$description', '$pay_type', '$value', '$date', '$time', '$status');") or die(mysqi_error($con));

    if($add_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}

if (isset($_POST['update_submit'])) {

    $bankname = $_POST['bankname'];
    $target_id = $_POST['target_id'];
    $trans_id = $_POST['trans_id'];
    $description = $_POST['description'];
    //$process_method = $_POST['process_method'];
    $pay_type = $_POST['pay_type'];
    $value = $_POST['value'];
    $date = $_POST['date'];



    $up_query = mysqli_query($con,"UPDATE `transact_tb` SET `bankname` = '$bankname', `description` = '$description', `pay_type` = '$pay_type', `value` = '$value', `date` = '$date' WHERE `transact_tb`.`dir` = '$trans_id';") or die(mysqli_error($con));

    if($up_query){

        //echo '<script>alert("up submit '.$acc_id.'");</script>';
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';

    }
}


if (isset($_GET['edit_submit'])) {

    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];


    $edit_q = mysqli_query($con,"SELECT * FROM `transact_tb` WHERE `dir` = '$trans_id';") or die(mysqi_error($con));

    if(mysqli_num_rows($edit_q) > 0){

        $edit = mysqli_fetch_array($edit_q);

		$bankname = $edit['bankname'];
        $description = $edit['description'];
        //$process_method = $edit['process_method'];
        $pay_type = $edit['pay_type'];
        $value = $edit['value'];
        $date = $edit['date'];

        $updater = 1;

        // echo '<script>alert("edit submit '.$acc_id.'");</script>';

    }
}

if (isset($_GET['status_submit'])) {

     //echo '<script>alert("enable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];

    $status_query = mysqli_query($con," UPDATE `transact_tb` SET `trans_status`='declined' WHERE `dir` = '$trans_id';") or die(mysqli_error($con));

    if($status_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}

if (isset($_GET['statusProcess_submit'])) {

     //echo '<script>alert("enable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];

    $status_query = mysqli_query($con," UPDATE `transact_tb` SET `trans_status`='processed' WHERE `dir` = '$trans_id';") or die(mysqli_error($con));

    if($status_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}

if (isset($_GET['enable_submit'])) {

     //echo '<script>alert("enable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];

    $enable_query = mysqli_query($con," UPDATE `transact_tb` SET `status`='enabled' WHERE `dir` = '$trans_id';") or die(mysqli_error($con));

    if($enable_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}

if (isset($_GET['disable_submit'])) {

 //echo '<script>alert("dissable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];
    $disable_query = mysqli_query($con," UPDATE `transact_tb` SET `status`='disabled' WHERE `dir` = '$trans_id';") or die(mysqli_error($con));

    if($disable_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}

if (isset($_GET['delete_submit'])) {

 //echo '<script>alert("dissable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];
    $disable_query = mysqli_query($con," UPDATE `transact_tb` SET `status`='deleted' WHERE `dir` = '$trans_id';") or die(mysqli_error($con));

    if($disable_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}


    include ('includes/sidebar.php');

?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br/>
                    <h2><?= $title." for ".$target_user ?></h2>
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
                            <i class="fa fa-profile fa-fw"></i> Add Transaction
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <form action="transactions.php" method="post">
								                <div class="list-group-item">
                                   <input class="form-control" placeholder="Bank Name" name="bankname" type="text" autofocus autocomplete="off" value="<?= $bankname ?>">
                                </div>

                                <div class="list-group-item">
                                    <label>Transaction Info</label>
                                   <textarea class="form-control"  name="description" autofocus placeholder="Enter Transaction Detail Here. For Example, Payment At Melcom or Deposit" value="<?= $description ?>"><?= $description ?></textarea>
                                </div>
                                 <div class="list-group-item">
                                   <input class="form-control" placeholder="Value" name="value" type="text" autofocus autocomplete="off" value="<?= $value ?>">
                                </div>
                                <!--<div class="list-group-item">
                                    <input class="form-control" placeholder="Account Balance" name="acc_balance" type="text" autofocus autocomplete="off" value="<?= $acc_balance ?>">
                                </div> -->

                                <div class="list-group-item">
                                    <label>Payment Type</label>
                                   <select class="form-control"  name="pay_type" >
                                       <option value="deposit" <?php if ($pay_type == "deposit") {
                                        echo "selected";
                                    }
                                    ?>>Pay In</option>
                                       <option value="withdrawal" <?php if ($pay_type == "withdrawal") {
                                        echo "selected";
                                    }
                                    ?>>Pay Out</option>

                                   </select>
                                </div>

                                <div class="list-group-item">
                                    <label>Transaction Date</label>
                                    <input class="form-control" placeholder="Date (dd/mm/yyyy)" name="date" type="date" autofocus autocomplete="off" value="<?= $end_date ?>">
                                </div>
                                <input type="hidden" name="target_id" value="<?= $target_id ?>">
                                <?php  if ($updater == 0) { ?>
                                <div class="list-group-item">
                                  <input class="form-control" value="Add Transaction" name="add_submit" type="submit" autofocus autocomplete="off">
                                </div>
                                <?php }
                                 if ($updater == 1) { ?>

                                <input type="hidden" name="trans_id" value="<?= $trans_id ?>">
                                 <div class="list-group-item">
                                  <input class="form-control" value="Update Transaction" name="update_submit" type="submit" autofocus autocomplete="off">
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

                    <!-- /.panel -->
                    <div class="panel panel-default" id="transactions">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Manage Transactions

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
                                                    <th>Date</th>
                                                    <th>Value</th>
                                                    <th>Type</th>
                                                    <th>Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                    $query = mysqli_query($con,"SELECT * FROM `transact_tb`  WHERE `status` != 'deleted' AND `acc_dir` = '$target_id' order by dir asc");

                                                    if(mysqli_num_rows($query)>0){
                                                        while($row = mysqli_fetch_array($query)){
                                                            $id = $row['dir'];
                                                            $date = $row['date'];
                                                            $value = $row['value'];
                                                            $pay_type = $row['pay_type'];
                                                            $description = $row['description'];
                                                            $process_method = $row['process_method'];
                                                            $status = $row['status'];
                                                            $trans_status = $row['trans_status'];


                                                            ?>


                                                <tr>
                                                     <td> <!-- <form method="get" action="transactions.php">
                                                    <input type="hidden" name="wallet" value="<?php/* echo*/ $wallet ?>">

                                                    <input type="hidden" name="target_id" value="<?php /*echo */$id; ?>">
                                                    <input type="submit" name="trans_submit" value="Transactions" class="btn btn-info"></form> -->

                                                <form method="get" action="transactions.php">

                                                    <input type="hidden" name="trans_id" value="<?= $id ?>">
                                                    <input type="hidden" name="target_id" value="<?= $target_id ?>">

                                                    <input type="submit" name="edit_submit" value="Edit" class="btn btn-primary">
                                                    <?php  if ($status == "disabled") { ?>

                                                    <input type="submit" name="enable_submit" value="Enable" class="btn btn-success">
                                                    <?php }
                                                     if ($status == "enabled") { ?>
                                                    <input type="submit" name="disable_submit" value="Disable" class="btn btn-warning">
                                                    <?php  } ?>
                                                    <input type="submit" name="delete_submit" value="Delete" class="btn btn-danger">
                                                    <?php
                                                    if ($trans_status == "pending"){
                                                        ?>
                                                         <input type="submit" name="status_submit" value="Decline" class="btn btn-info">
													<input type="submit" name="statusProcess_submit" value="Process" class="btn btn-success">

                                                        <?php } ?>
                                                </form> </td>
                                                    <td><?= $date ?></td>
                                                    <td>$<?= $value ?></td>
                                                    <td><?= $pay_type ?></td>
                                                    <td><?= $description." [".$trans_status."]" ?></td>
                                                </tr>
                                                <?php

                                                            $i++;
                                                        }

                                                    }
                                                    else{
                                                        ?>
                                                        <tr>
                                                            <td colspan="5">You Have No Transactions Yet</td>
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

            </div>


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php
      include ('includes/footer.php');

      ?>
