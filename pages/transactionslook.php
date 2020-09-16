<?php $title = "Deposits Panel"; ?>
<?php require('includes/header.php') ;
$deposits_table = "Transactions";
// require('../includes/check_admin.php');
?>
<?php
/*                                                                                                                                                    include('../includes/check-login.php'); */


?>


<?php if(isset($_GET['approve_submit'])){
    $confirm_id = mysqli_real_escape_string($con,$_GET['confirm_id']);
    $wallet_id = mysqli_real_escape_string($con,$_GET['wallet']);
    $approved_amount = mysqli_real_escape_string($con,$_GET['amount']);
    $userwalletq = mysqli_query($con,"select * from wallet where wallet = '$wallet_id' ");
        $userwallet = mysqli_fetch_array($userwalletq);


    $userdataq = mysqli_query($con,"select * from user where username = '$wallet_id' ");
        $userdata = mysqli_fetch_array($userdataq);
        $user_phone = $userdata['mobile'];


    $approved_final_amount = $approved_amount + $userwallet['available'];
  
        $confirm_query = mysqli_query($con,"UPDATE `deposits` SET `status` = 'success' WHERE `deposits`.`id` = '$confirm_id' limit 1");

        if($confirm_query){

            $wallet_query = mysqli_query($con,"UPDATE `wallet` SET `available` = '$approved_final_amount' WHERE `wallet`.`wallet` = '$wallet_id' limit 1");

            

            if($wallet_query){
                 $message = "Your Deposit request of GHC".$approved_amount." has been has been credited to your wallet, You can now go ahead with your Investment";

           $try_sms = reply::rp_sendsms($sms_source,$user_phone,$message,$sms_type);
           if ($try_sms) {
            
                echo '<script>window.location.assign("deposits.php")</script>';
            }
        }
            else{
                echo '<script>alert("Error occured on wallet")</script>';
            }
        }
        else{
             echo '<script>alert("Error occured on approve")</script>';
        }   
}

    if(isset($_GET['reject_submit'])){
    $confirm_id = mysqli_real_escape_string($con,$_GET['confirm_id']);

  
        $cancel_query = mysqli_query($con,"UPDATE `deposits` SET `status` = 'rejected' WHERE `deposits`.`id` = '$confirm_id' limit 1");

        if($cancel_query){
            echo '<script>window.location.assign("deposits.php")</script>';
        }
        else{
             echo '<script>alert("Error occured")</script>';
        }

    

}

$newcheckq = mysqli_query($con,"select * from deposits where status = 'issued'");
        $newcountn = mysqli_num_rows($newcheckq);

$rejcheckq = mysqli_query($con,"select * from deposits where status = 'rejected'");
        $rejcountn = mysqli_num_rows($rejcheckq);

$cancheckq = mysqli_query($con,"select * from deposits where status = 'cancelled'");
        $cancountn = mysqli_num_rows($cancheckq);

$succheckq = mysqli_query($con,"select * from deposits where status = 'success'");
        $succountn = mysqli_num_rows($succheckq);
 ?>


<?php require('../includes/header.php') ?>

<?php include('../includes/sidebar.php') ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $title; ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
             <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= circle::fp_retain($newcountn) ?></div>
                                    <div>New Deposits</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
         
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= circle::fp_retain($rejcountn) ?></div>
                                    <div>Rejected!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
          
                
            
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= circle::fp_retain($cancountn) ?></div>
                                    <div>Cancelled!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
          
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?= circle::fp_retain($succountn) ?></div>
                                    <div>Done!</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
            
            
                
            </div>
            <!-- /.row -->
           
                        <!-- /.panel-heading -->
                        
                        <!-- /.panel-body -->
                   
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        
                        <!-- /.panel-heading -->
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> <?php echo $deposits_table; ?>
                            <div class="pull-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                        View
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu pull-right" role="menu">
                                        <li><a href="#">Recent Deposits</a>
                                        </li>
                                        <li><a href="#">Open Deposits</a>
                                        </li>
                                        <li><a href="#">Successful Deposits</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="#">All Deposits</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                         
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table id="dataTables-example" class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                   
                                                    <th>Ref No.#</th>                                                 
                                                    <th>Amount</th>
                                                    <th>Wallet</th>
                                                    <th>Date</th>
                                                    <th>Send</th>
                                                    <th>Reject</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i=1;
                                                    $query = mysqli_query($con,"select * from deposits where status = 'issued' order by id asc");

                                                    if(mysqli_num_rows($query)>0){
                                                        while($row = mysqli_fetch_array($query)){
                                                            $amount = $row['amount'];
                                                            $date = $row['date'];
                                                            $status = $row['status'];
                                                            $ref = $row['pin'];
                                                            $id = $row['id'];
                                                            $wallet = $row['wallet'];
                                                                                      

                                                            ?>
                                                            <tr>
                                                                <td><?php echo $i ?></td>
                                                                <td><?php echo $ref ?></td>
                                                                <td><?php echo $amount ?></td>
                                                                <td><?php echo $wallet ?></td>
                                                                <td><?php echo $date ?></td>
                                                                
                                                                <form method="get" action="deposits.php">
                                                    <input type="hidden" name="wallet" value="<?php echo $wallet ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $amount ?>">
                                                    <input type="hidden" name="confirm_id" value="<?php echo $id; ?>">
                                                    <td><input type="submit" name="approve_submit" value="Approve" class="btn btn-primary"></td>
                                                
                                                <td><input type="submit" name="reject_submit" value="Reject" class="btn btn-warning"></td>
                                                                </form>
                                                                
                                                            </tr>
                                                            <?php

                                                            $i++;
                                                        }

                                                    }
                                                    else{
                                                        ?>
                                                        <tr>
                                                            <td colspan="5">You have no deposits requests yet</td>
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
                                
                                <!-- /.col-lg-8 (nested) -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                   

                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-8 -->
                <?php /*include('../includes/side_widget.php') */?>
                <!-- /.col-lg-4 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include('../includes/footer.php') ?>