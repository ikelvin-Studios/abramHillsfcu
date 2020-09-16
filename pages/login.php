<?php

require('includes/connect.php');
require('includes/function.php');


if(isset($_SESSION['id'])){
    header("location: ../pages/");
}


if(isset($_POST['login_form_submit']) == true){


    $email= $_POST['email'];
    $pass= $_POST['password'];
    $username= $_POST['email'];

    $query =  mysqli_query($con,"SELECT * FROM db_users_tb WHERE acc_user = '$username' and acc_pass = '$pass' and status = 'enabled'") or die(mysqli_error($con));

    $query2 =  mysqli_query($con,"SELECT * FROM site_tb WHERE admin = '$username' and pass = '$pass'") or die (
        mysqli_error($con)
);

  
   
   if(mysqli_num_rows($query)> 0) {
        $_SESSION['id'] = session_id();
        $_SESSION['userid'] = $username;
       
        $login_type = "user";  

        $_SESSION['login_type'] = $login_type;

        include('includes/ip_fn.php');

        echo '<script>window.location.assign("check.php")</script>';

   } elseif(mysqli_num_rows($query2)> 0) {
       
        $_SESSION['id'] = session_id();
        $_SESSION['userid'] = $username;

        $login_type = "admin";

        $_SESSION['login_type'] = $login_type;

        include('includes/ip_fn.php');

        //echo '<script>window.location.assign("../")</script>';

        echo '<script>window.location.assign("../pages")</script>';

   } else {
        
   echo '<script> alert("Decrypting account was not success, This implies your login credential is incorrrect");window.location.assign("login.php")</script>';

    }

}

?>
 

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Banking Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
				
				<center>
                    <img src="../img/logo.png" class="img-responsive"/>
                </center>
				
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login To Online Banking</h3>
                    </div>
                    <div class="panel-body">
                        <form name="login_form" role="form" method="post" action="login.php" autocomplete="off" >
                            
                                <div class="form-group">
                                    <input class="form-control" placeholder="Online Banking ID" name="email" type="text" autofocus autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Online Banking Password" name="password" type="password" value="" autocomplete="off">
                                </div>
                                <div class="checkbox">
                                <!-- Change this to a button or input when using this as a form -->
                                <input type="submit" name="login_form_submit" class="btn btn-lg btn-primary btn-block" value="Submit">
                            
                        </form>
                       
                    </div>  
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
