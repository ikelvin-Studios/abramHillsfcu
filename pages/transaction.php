<?php
    $title = "Transactions";

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


    function pin_generate(){

    $generated_pin = rand(100000,999999);
    return $generated_pin;
 
    }

if (isset($_POST['add_submit'])) {

    //$acc_pin = $_POST['pin'];

    

   // $target_id = $_POST['target_id'];

    // $process_method = $_POST['process_method'];
    $ac_routing = $_POST['ac_routing'];
    $ac_name = $_POST['ac_name'];
    $ac_num = $_POST['ac_num'];
    $value = $_POST['value'];
    $pay_type = "withdrawal";
    $value = $_POST['value'];
    $date = date('Y-m-d');
    $time = date('Y-m-d h:i');
    $status = "enabled";
    $acc_dir = $powerid;
    $description = "Transaction made to Account Name: ".$ac_name.", Account Number: ".$ac_num." [Routing Number: ".$ac_routing."]";
    $trans_status = "pending";


   /* if ($acc_pin != $powerpin) {

        $last_message = '<li class="text-danger">Transaction of $'.$value.' to Account Name: '.$ac_name.', Account Number: '.$ac_num.' [Routing Number: '.$ac_routing.'] failed due to invalid Confirmation pin</li>';
        $last_errors = $last_message;
        $_SESSION['last_errors'] .= $last_errors;

        echo '<script>alert("Sorry couldn`t complete the transaction due to invalid Confirmation pin");window.location.assign("transaction.php");</script>';

    }*/
    //echo '<script>alert("hey '.$target_id.'")</script>';



    $add_query = mysqli_query($con,"INSERT INTO `transact_tb` (`acc_dir`, `pay_type`, `value`, `date`, `time`, `status`, `description`, `trans_status`) VALUES ('$acc_dir', 'deposit', '$value', '$date', '$time', '$status', '$description', '$trans_status');") or die(mysqli_error($con));

    if($add_query){
        echo '<script>window.location.assign("transaction.php");</script>';
    }
}

if (isset($_POST['update_submit'])) {

    
    $target_id = $_POST['target_id'];
    $trans_id = $_POST['trans_id'];

    $process_method = $_POST['process_method'];
    $pay_type = $_POST['pay_type'];
    $value = $_POST['value'];
    $date = $_POST['date'];
   
    

    $up_query = mysqli_query($con,"UPDATE `transact_tb` SET `process_method` = '$process_method', `pay_type` = '$pay_type', `value` = '$value', `date` = '$date' WHERE `transact_tb`.`dir` = '$trans_id';") or die(mysqli_error($con));

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

        $process_method = $edit['process_method'];
        $pay_type = $edit['pay_type'];
        $value = $edit['value'];
        $date = $edit['date'];

        $updater = 1;

        // echo '<script>alert("edit submit '.$acc_id.'");</script>';

    }
}

if (isset($_GET['enable_submit'])) {

     //echo '<script>alert("enable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];

    $enable_query = mysqli_query($con," UPDATE `transact_tb` SET `status`='enabled' WHERE `dir` = '$trans_id';") or die(mysqi_error($con));

    if($enable_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}

if (isset($_GET['disable_submit'])) {

 //echo '<script>alert("dissable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];
    $disable_query = mysqli_query($con," UPDATE `transact_tb` SET `status`='disabled' WHERE `dir` = '$trans_id';") or die(mysqi_error($con));

    if($disable_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
    }
}

if (isset($_GET['delete_submit'])) {

 //echo '<script>alert("dissable");</script>';
    $target_id = $_GET['target_id'];
    $trans_id = $_GET['trans_id'];
    $disable_query = mysqli_query($con," UPDATE `transact_tb` SET `status`='deleted' WHERE `dir` = '$trans_id';") or die(mysqi_error($con));

    if($disable_query){
        echo '<script>window.location.assign("transactions.php?target_id='.$target_id.'&trans_submit=Transactions");</script>';
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
                            <i class="fa fa-profile fa-fw"></i> Make Transaction
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <form action="transaction.php" method="post">
                          		
									<div class="list-group-item">
                                    <input class="form-control" placeholder="Bank Name" name="bank_name" type="text" autofocus autocomplete="off" value="">
                                </div>
									
                                <div class="list-group-item">
                                    <input class="form-control" placeholder="Routing Number" name="ac_routing" type="number" autofocus autocomplete="off" value="">
                                </div>
                                 <div class="list-group-item">
                                    <input class="form-control" placeholder="Account Name" name="ac_name" type="text" autofocus autocomplete="off" value="">
                                </div>
                                
                                 <div class="list-group-item">
                                   <input class="form-control" placeholder="Account Number" name="ac_num" type="number" autofocus autocomplete="off" value="">
                                </div>
                                 <div class="list-group-item">
                                    <div class="input-group">
                                    <span class="input-group-addon">$</span>
                                   <input class="form-control" placeholder="" name="value" type="number" autofocus autocomplete="off" value="">
                               </div>
                                </div>
                              
                               
                                <!-- <input type="hidden" name="target_id" value=""> -->

                                 <div class="list-group-item">
                                  <!--a class="form-control btn btn-primary" data-toggle="modal" data-target="#ConfirmModal" >Make Transaction</a-->
									 <input type="submit" class="form-control btn btn-primary" name="add_submit" value="Make Transaction" />
                                </div>
                                <?php /* if ($updater == 0) { ?>
                                <div class="list-group-item">
                                  <input class="form-control" value="Confirm" name="add_submit" type="submit" autofocus autocomplete="off">
                                </div>
                                <?php } */
                                 if ($updater == 1) { ?>
                                
                                <!-- <input type="hidden" name="trans_id" value="">
                                 <div class="list-group-item">
                                  <input class="form-control" value="Update Transaction" name="update_submit" type="submit" autofocus autocomplete="off">
                                </div> -->
                                <?php } ?>
                                <div class="list-group-item">
                                  <input class="form-control" value="Clear All Fields" name="clear_submit" type="submit" autofocus autocomplete="off">
                                </div></form>
                                 <!-- Modal -->
                            <div class="modal fade" id="ConfirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Confirm Transaction</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form role="form">
                            <fieldset>
                                
                                <div class="form-group">
                                    <input class="form-control" placeholder="Enter Your Pin" name="pin" type="password" value="">
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
                                           <input type="submit" class="btn btn-primary" name="add_submit" value="Confirm Transaction" />
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->


                            </div>
                        <!--/form-->
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
                            <i class="fa fa-bar-chart-o fa-fw"></i>Transactions
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
                                                    
                                                    
                                                    <th>Date</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <!-- <th>Type</th>  -->
                                                    <!-- <th>Status</th> -->
                                                   
                                                    <!-- <th>Balance</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i=1;
                                                    $query = mysqli_query($con,"SELECT * FROM `transact_tb`  WHERE `status` != 'deleted' AND `acc_dir` = '$powerid' order by dir desc");

                                                    if(mysqli_num_rows($query)>0){
                                                        while($row = mysqli_fetch_array($query)){
                                                            $id = $row['dir'];
                                                            $date = $row['date'];
                                                            $value = $row['value'];
                                                            $pay_type = $row['pay_type'];
                                                            // $process_method = $row['process_method'];
                                                            $info = $row['description'];
                                                            $status = $row['status'];
                                                            $balance = $row['balance'];
                                                            $trans_status = $row['trans_status'];
                                                            
                                                            ?>
                                                                                      

                                                <tr>
                                                    
                                                    <td><?= $date ?></td>
                                                    <td><?= $info ?></td>
                                                    <td class="<?php if ($trans_status == "pending") {
                                                        echo 'text-primary';
                                                    } elseif ($trans_status == "declined") {
                                                        echo 'text-danger';
                                                    } elseif ($pay_type == "deposit") {
                                                        echo 'text-success';
                                                    } elseif ($pay_type == "withdrawal"){
                                                        echo 'text-success';
                                                    } else {
                                                        echo 'text-danger';
                                                    }
                                                    ?>">$<?= $value." [".$trans_status."]" ?></td>
                                                   <!--  <td><? /*= $pay_type */?></td> -->
                                                    <!-- <td><?/*= $trans_status*/ ?></td> -->
                                                    
                                                  <!--   <td><? //= $balance ?></td> -->
                                                </tr>
                                                <?php

                                                            $i++;
                                                        }

                                                    }
                                                    else{
                                                        ?>
                                                        <tr>
                                                            <td colspan="3">You Have No Transactions Yet</td>
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