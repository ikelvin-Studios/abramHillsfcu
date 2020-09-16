 <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <?php 
                            if ($_SESSION['login_type'] == "user") {


                        ?>
                        
                       
                        <li>
                            <a href="index.php"><i class="fa fa-edit fa-fw"></i> Account<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="index.php#account">Account Info</a>
                                </li>
                                <li>
                                    <a href="index.php#chart">Activity Chart</a>
                                </li>
                                <li>
                                    <a href="index.php#investment"><i class="fa fa-bar-chart-o fa-fw"></i> Investment Info</a>
                                </li>
                                <!-- <li>
                                    <a href="adminsettings.php">Account Settings</a>
                                </li> -->
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="transaction.php"><i class="fa fa-table fa-fw"></i> Transactions</a>
                        </li>
                        <li>
                            <a href="mailto:info@andrews-fcu.org"><i class="fa fa-envelope fa-fw"></i> Support</a>
                        </li>
                        <?php 
                    }
                            if ($_SESSION['login_type'] == "admin") {


                        ?>
                        <li>
                            <a href="https://webmail.andrews-fcu.org"><i class="fa fa-envelope fa-fw"></i> Webmail</a>
                            
                        </li>

                        <li>
                            <a href="#"><i class="fa fa-cogs fa-fw"></i> Admin<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="manageusers.php">Manage Users</a>
                                </li>
                                <li>
                                    <a href="adminsettings.php">Admin Settings</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php 
                            }

                        ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>