<?php
    $title = "Online Banking";

    include ('includes/header.php');
    include ('includes/sidebar.php');
?>



        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-3"><br/>
                    <img src="../img/logo.png" class="img-responsive">
                    <br/>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                
            </div>
            <!-- /.row -->
            <div class="row">
                
                <?php 
                     
                        if ($_SESSION['login_type'] == "user") {

                    
                    
                    ?>
                <!-- /.col-lg-8 -->
                <div class="col-lg-4">
                    <div class="panel panel-default" id="account">
                        <div class="panel-heading">
                            <i class="fa fa-profile fa-fw"></i> Account Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-comment fa-fw"></i> --> <?= $poweruser['acc_name'] ?>
                                    <span class="pull-right text-muted small"><em>Name</em>
                                    </span>
                                </a> 
                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-envelope fa-fw"></i> --> <?= $poweruser['acc_num'] ?>
                                    <span class="pull-right text-muted small"><em>Account Number</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-twitter fa-fw"></i> --> <?= $poweruser['acc_type']?>
                                    <span class="pull-right text-muted small"><em>Account Type</em>
                                    </span>
                                </a>
                               
                                <a href="#" class="list-group-item">
                                   <!--  <i class="fa fa-tasks fa-fw"></i> --> $ <?= $poweruser['acc_balance']?>
                                    <span class="pull-right text-muted small"><em>Available Balance</em>
                                    </span>
                                </a>
                                <!-- <a href="#" class="list-group-item">
                                  <  <i class="fa fa-upload fa-fw"></i> -- 255074111
                                    <span class="pull-right text-muted small"><em>Routing /number</em>
                                    </span>
                                </a> -->
                                
                            </div>
                            <!-- /.list-group -->
                            <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                     <?php }

                        elseif ($_SESSION['login_type'] == "admin") {

                    
                    
                    ?>
                    <div class="col-lg-4">
                    <div class="panel panel-default" id="account">
                        <div class="panel-heading">
                            <i class="fa fa-profile fa-fw"></i> Account Details
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">

                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-comment fa-fw"></i> --> <?= $powersite['admin'] ?>
                                    <span class="pull-right text-muted small"><em>Username</em>
                                    </span>
                                </a> <a href="adminsettings.php" class="list-group-item text-primary">
                                    <!-- <i class="fa fa-comment fa-fw"></i> --> <span class="text-primary">[SET]</span> Change Login Credentials
                                    <span class="pull-right text-muted small"><em>Password</em>
                                    </span>
                                </a> <br/><label>Stats</label>
                                <a href="manageusers.php" class="list-group-item">
                                    <!-- <i class="fa fa-envelope fa-fw"></i> --> <?= circle::fp_retain($usercountn) ?>
                                    <span class="pull-right text-muted small"><em>Accounts</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-twitter fa-fw"></i> --> <?= circle::fp_retain($transcountn) ?>
                                    <span class="pull-right text-muted small"><em>Transactions</em>
                                    </span>
                                </a>
                               
                                
                                <!-- <a href="#" class="list-group-item">
                                  <!--   <i class="fa fa-upload fa-fw"></i> -- 255074111
                                    <span class="pull-right text-muted small"><em>Routing /number</em>
                                    </span>
                                </a> -->
                                
                            </div>
                            <!-- /.list-group -->
                            <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>


                    <?php }

                        if ($power_has_invest == "yes") {

                    ?>
                    <div class="panel panel-default" id="Investment">
                        <div class="panel-heading">
                            <i class="fa fa-profile fa-fw"></i> Investment Info
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-comment fa-fw"></i> --> <?= $poweruser['invest_plan'] ?>
                                    <span class="pull-right text-muted small"><em>Investment Plan</em>
                                    </span>
                                </a> 
                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-envelope fa-fw"></i> --> <?= $poweruser['acc_num'] ?>
                                    <span class="pull-right text-muted small"><em>Account Number</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <!-- <i class="fa fa-twitter fa-fw"></i> --> $ <?= $poweruser['invest_revenue'] ?>
                                    <span class="pull-right text-muted small"><em>Revenue</em>
                                    </span>
                                </a>
                               
                                
                            </div>
                            <!-- /.list-group -->
                            <!-- <a href="#" class="btn btn-default btn-block">View All Alerts</a> -->
                        </div>
                        <!-- /.panel-body -->
                    </div>

                    <?php 
                        }

                    ?>


                    
                </div> 
                <!-- /.col-lg-4 -->
                <div class="col-lg-8">
                    <div class="panel panel-default" id="chart">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i>Account Activity
                            <!-- <div class="pull-right">
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
                                        <!- <li class="divider"></li>
                                        <li><a href="#">Separated link</a>
                                        </li> ->
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">

                            <?php
                                echo "You are Logged now using ";
							include ('includes/platform_fn.php');
                                //echo $_SERVER['HTTP_USER_AGENT']; 
                                //$browser = get_browser();
                                
                                //print_r($browser);
                                    
                            ?>
                            <!-- You are Logged now on using Morzilla Firefox from Ghana.
                            <br />
                            <p class="text-warning">The Account was Last Logged in on Monday, 24th may 2019 using Morzilla Firefox from Ghana.</p> -->

                            <br/>
                            <br/>
                            <ul>
                                <?= $_SESSION['last_errors'] ?>
                            </ul>

                        </div>
                        <!-- /.panel-body -->
                    </div>
                   
            </div>


            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="../vendor/raphael/raphael.min.js"></script>
    <script src="../vendor/morrisjs/morris.min.js"></script>
    <script src="../data/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
