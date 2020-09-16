
        
   
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <!--li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        <!--/li-->
                        <li>
                            <a href="<?php echo $site_base_url; ?>/pages/"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <!--li class="active"-->
        <?php    if ($poweruser['is_superadmin'] == 1) {

                    echo '<li class="">
                            <a href="#"><i class="fa fa-gears fa-fw"></i> Superadmin Panel <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="" href="'.$site_base_url.'/pages/sup_admin">Desk</a>
                                </li>
                                <li>
                                    <a class="" href="'.$site_base_url.'/pages/sup_admin/admin.php">Add Admin</a>
                                </li>
                                
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/admins.php">Admin Privilages</a>
                                </li>

                               
                                <li>
                                    <a href="'.$site_base_url.'/pages/sup_admin/site.php">Site Setting</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>';
                        }
                        if ($poweruser['is_admin'] == 1) {
                            echo '
                       
                        <li>
                            <a href="#"><i class="fa fa-key fa-fw"></i> Admin Panel <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/">Desk</a>
                                </li>
                                 <!--li>
                                    <a href="'.$site_base_url.'/pages/admin/tasks.php">Tasks</a>
                                </li-->
                                <li>
                                    <a href="'.$site_base_url.'/pages/user/members.php">Members</a>
                                </li>
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/deposits.php">Deposits</a>
                                </li>
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/withdrawals.php">withdraws</a>
                                </li>';
                                if ($site_cat == "coin") {
                                    echo '
                                    
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/investments.php">Investments</a>
                                </li>
                                '; }
                                echo '                                
                                <li>
                                <!-- Mut change this later -->
                                    <a href="https://Webmail.ourcomunity.net"> Webmail</a>
                                </li>
                                 <li>
                                    <a href="'.$site_base_url.'/pages/admin/reply.php">Reply Services</a>
                                </li>
                                <li>
                                    <a href="'.$site_base_url.'/pages/reports">Reports</a>
                                </li>
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/plan.php">Manage Plans</a>
                                </li>
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/ads.php">Manage Ads</a>
                                </li>
                                <li>
                                    <a href="'.$site_base_url.'/pages/admin/home.php">Manage Homepage</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>'; }


                       ?>

                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Account <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a  href="<?php echo $site_base_url; ?>/pages/user/">Profile Setting</a>
                                </li>
                                <li>
                                    <a href="<?php echo $site_base_url; ?>/pages/user/password.php">Change Password</a>
                                </li>
                                <li>
                                    <a href="<?php echo $site_base_url; ?>/pages/wallet/">Payment Setting</a>
                                </li>
                                <li>
                                    <a href="<?php echo $site_base_url; ?>/pages/logout.php">Logout</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    
                        <li>
                            <a href="#"><i class="fa fa-bank fa-fw"></i> Wallet <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo $site_base_url; ?>/pages/wallet/deposit.php">Deposit</a>
                                </li>
                                <li>
                                    <a href="<?php echo $site_base_url; ?>/pages/wallet/Cashout.php">Cashout / withdraw</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <?php  if ($site_cat == "coin") { ?>
                        <li>
                            <a href="<?php echo $site_base_url; ?>/pages/coin"><i class="fa fa-money fa-fw"></i> <?php echo $coin_name; ?> <!--span class="fa arrow"></span--></a>
                            <!--ul class="nav nav-second-level">
                                <li>
                                    <a  href="#">Desk</a>
                                </li>
                                <li>
                                    <a href="#">Buy <?php echo $coin_name; ?></a>
                                </li>
                                <li>
                                    <a href="#">Sell</a>
                                </li>
                                <li>
                                    <a href="#">Stats</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php  } ?>
                        <!--li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Investments <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">GHCoiN</a>
                                </li>
                                <li>
                                    <a href="#">Stats</a>
                                </li>
                                <li>
                                    <a href="#">Support</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!--/li-->


                 
                        
                        
                        <!--li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Activities<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">Notifications</a>
                                </li>
                                <li>
                                    <a href="#">Messages</a>
                                </li>
                                <li>
                                    <a href="#">Transactions <span class="fa arrow"></span></a>
                                    
                                    <!-- /.nav-third-level -->
                                <!--/li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!--/li-->
                        <li>
                            <a href="<?php echo $site_base_url; ?>/pages/report"><i class="fa fa-support fa-fw"></i> Support<span class="fa fa-contact"></span></a>
                            
                        </li>
                        
                    </ul>
                    
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        

   

