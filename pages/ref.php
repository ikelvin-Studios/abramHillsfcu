<?php
include('includes/connect.php');
include('includes/function.php');


if(isset($_SESSION['user_id'])){
    header("location: ../pages/");
}

if(isset($_GET['ref'])){
	$ffid = $_GET['ref'];
	$refff = mysqli_query($con,"SELECT * FROM `user` WHERE `username`='$ffid'");
	
	if(mysqli_num_rows($refff) > 0){
    $reff = mysqli_fetch_array($refff);
	$_SESSION['ref'] = $reff['username'];
	
    }
}
circle::fp_redirect('register.php');
//include('footer.php');
?>