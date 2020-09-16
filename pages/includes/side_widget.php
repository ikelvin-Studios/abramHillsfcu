<div class="col-lg-4">
                    <div class="panel panel-default">
                        <!--div class="panel-heading">
                            <i class="fa fa-bell fa-fw"></i> Notifications Panel
                        </div>
                        <!-- /.panel-heading -->
                        <!--div class="panel-body">
                            <div class="list-group">
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-comment fa-fw"></i> New Comment
                                    <span class="pull-right text-muted small"><em>4 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small"><em>12 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small"><em>27 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-tasks fa-fw"></i> New Task
                                    <span class="pull-right text-muted small"><em>43 minutes ago</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small"><em>11:32 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-bolt fa-fw"></i> Server Crashed!
                                    <span class="pull-right text-muted small"><em>11:13 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-warning fa-fw"></i> Server Not Responding
                                    <span class="pull-right text-muted small"><em>10:57 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-shopping-cart fa-fw"></i> New Order Placed
                                    <span class="pull-right text-muted small"><em>9:49 AM</em>
                                    </span>
                                </a>
                                <a href="#" class="list-group-item">
                                    <i class="fa fa-money fa-fw"></i> Payment Received
                                    <span class="pull-right text-muted small"><em>Yesterday</em>
                                    </span>
                                </a>
                            </div>
                            <!-- /.list-group -->
                            <!--a href="#" class="btn btn-default btn-block">View All Alerts</a>
                        </div>
                        <!-- /.panel-body -->
                    <!--/div>
                    <!-- /.panel -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-bar-chart-o fa-fw"></i> Referal Network
                        </div>
                        <div class="panel-body">
                            <div  id="wallet-donut-chart"></div>
                        <div>    <div class="row">
                <div class="col-lg-12 col-md-6 table-responsive">
                    
                                        <table id="" class="table table-bordered table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                   
                                                    <th>username</th>
                                                    
                                                    
                                                   
                                                    <th>Status</th>                                              
                                                  
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i=1;
                                                    $query = mysqli_query($con,"select * from user where referer = '$userid' order by id desc");

                                                    if(mysqli_num_rows($query)>0){
                                                        while($row = mysqli_fetch_array($query)){
                                                            $username = $row['username'];
                                                            
                                                            $status = $row['status'];
                                                            $name = $fname." ".$surname;
                                                                               

                                                            echo '
                                                            <tr>
                                                                <td>'.$i.'</td>
                                                                <td>'.$username.'</td>
                                                                
                                                                <td>'.$status.'</td>
                                                                
                                                                
                                                                
                                                                <form method="get" action="deposits.php">
                                                    <!-- <input type="hidden" name="wallet" value="<?php echo $wallet ?>">
                                                    <input type="hidden" name="amount" value="<?php echo $amount ?>"> -->
                                                    <input type="hidden" name="user" value="<?php echo $username; ?>">
                                                    <!-- <td><input type="submit" name="approve_submit" value="Make Admin" class="btn btn-primary"></td>
                                                
                                                <td><input type="submit" name="reject_submit" value="Make User" class="btn btn-warning"></td> -->
                                                                </form>
                                                                
                                                            </tr>';
                                                           
                                                            $i++;
                                                        }

                                                    }
                                                    else{
                                                       echo '
                                                        <tr>
                                                            <td colspan="5">You have no deposits requests yet</td>
                                                        </tr> ';


                                                        
                                                    }
                                                echo '</table>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Wallet</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div></div>
                            
                            <a href="#" class="btn btn-default btn-block">View Wallet</a>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                    <div class="chat-panel panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-comments fa-fw"></i> Sponsered Ads
                            <div class="btn-group pull-right">
                                <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-chevron-down"></i>
                                </button>
                                <ul class="dropdown-menu slidedown">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-refresh fa-fw"></i> Refresh
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-check-circle fa-fw"></i> Available
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-times fa-fw"></i> Busy
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-clock-o fa-fw"></i> Away
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-sign-out fa-fw"></i> Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /.panel-heading -->
                        <class="panel-body">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner">';
    
                                               
                                                    $query = mysqli_query($con,"select * from `slide_tb` where `type` = 'ad' and `status` = 'active' order by `no` desc") or die(myaqli_error($con));

                                                    if(mysqli_num_rows($query)>0){
                                                        echo '
                                                        <div class="item  active">
                                                              <img src="'.$site_base_url.'/slides/advertise.png" alt="Call to advertise Here" style="width:100%;">
                                                            </div>';

                                                        while($row = mysqli_fetch_array($query)){
                                                            $id = $row['no'];
                                                             $topic = $row['title'];
                                                            
                                                            $caption = $row['caption'];
                                                            $ad = $row['url'];
                                                             
                                                            echo '
                                                            <div class="item">

                                                              <img src="'.$ad.'" alt="'.$topic.' - '.$caption.'" style="width:100%;">
                                                            </div>';

                                                            
                                                            

                                                            
                                                        }

                                                    }
                                                    else{
                                                        echo '
                                                        <div class="item">
                                                              <img src="'.$site_base_url.'/slides/advertise.png" alt="Call to advertise Here" style="width:100%;">
                                                            </div>';


                                                        
                                                    } 

                                                 echo '
      <!--div class="item active">
        <img src="../slides/logo.png" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="../slides/project8.png" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="../slides/project11.png" alt="New york" style="width:100%;">
      </div-->
    </div>

    <!-- Left and right controls -->
    <!--a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a-->
  </div>
</div>
                            <!--ul class="chat">
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 12 mins ago
                                            </small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 13 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="left clearfix">
                                    <span class="chat-img pull-left">
                                        <img src="http://placehold.it/50/55C1E7/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font">Jack Sparrow</strong>
                                            <small class="pull-right text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 14 mins ago</small>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                                <li class="right clearfix">
                                    <span class="chat-img pull-right">
                                        <img src="http://placehold.it/50/FA6F57/fff" alt="User Avatar" class="img-circle" />
                                    </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <small class=" text-muted">
                                                <i class="fa fa-clock-o fa-fw"></i> 15 mins ago</small>
                                            <strong class="pull-right primary-font">Bhaumik Patel</strong>
                                        </div>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                                        </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- /.panel-body -->
                        <!--div class="panel-footer">
                            <div class="input-group">
                                <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                                <span class="input-group-btn">
                                    <button class="btn btn-warning btn-sm" id="btn-chat">
                                        Send
                                    </button>
                                </span>
                            </div>
                        </div>
                        <!-- /.panel-footer -->
                    </div>
                    <!-- /.panel .chat-panel -->
                </div>';?>