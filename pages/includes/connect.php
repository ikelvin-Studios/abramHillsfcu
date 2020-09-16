<?php
session_start();

//ON SERVER

// $db_host ="localhost";
// $db_user="ourcomunmmy_nester";
// $db_pass="Pa55w0rd41#";
// $db_name="ourcomunmmy_abramfcu";


// Development

$db_host ="localhost";
$db_user="root";
$db_pass="";
$db_name="ourcomunmmy_abramfcu";

//error_reporting(E_ALL);
error_reporting(0);
date_default_timezone_set('Africa/Accra');

$con = mysqli_connect($db_host,$db_user,$db_pass,$db_name) or die(mysqli_error($con));

if (mysqli_connect_error()) {
	echo 'Failed to connect';
}

else {


$powersiteq = mysqli_query($con,"select * from site_tb where auth = 'yes' ");
$powersite = mysqli_fetch_array($powersiteq);

$base_url = "http://localhost/banking/";

// $base_url = "https://abramhillsfcu.com";


// $powercoinq = mysqli_query($con,"select * from coin_settings where is_activated = 'yes' ");
// $powercoin = mysqli_fetch_array($powercoinq);

// $powerseperationq = mysqli_query($con,"select * from `seperation_tb` where `status` = 'active' ");

// $powerseperation = mysqli_fetch_array($powerseperationq);

// $site_cat = $powerseperation['type'];



	// $sitename = $powersite['site'];
	// $siteemail = $powersite['email'];
	// $site_phone = $powersite['phone'];
	// $site_base_url = $powersite['base_url'];
	// $site_momo = $powersite['site_momo'];
	// $coin_name = $powercoin['coin'];
	// $ref_points = $powersite['ref_points'];
	// //$coin_rate =$powercoin[''];
	// $bal=70;
	// $available_bal=40;
	// $reserved_bal=30;
	if($_SESSION){
		$userid =  $_SESSION['userid'];
		// $powerwalletq = mysqli_query($con,"select * from wallet where wallet = '$userid' ");
		// $powerwallet = mysqli_fetch_array($powerwalletq);

		$poweruserq = mysqli_query($con,"SELECT * FROM `db_users_tb` WHERE `acc_user` = '$userid' ");
		$poweruser = mysqli_fetch_array($poweruserq);
		$sec_qn1 = $poweruser['qn1'];
		$ans_qn1 = $poweruser['qn1_ans'];
		$sec_qn2 = $poweruser['qn2'];
		$ans_qn2 = $poweruser['qn2_ans'];

		$powerid = $poweruser['dir'];
		$powerpin = $poweruser['acc_pin'];
		$power_has_invest = $poweruser['has_invest'];
		//$power_has_invest = "no";

		// $user_phone = $poweruser['mobile'];

		$usercheckq = mysqli_query($con,"SELECT * FROM `db_users_tb` WHERE dir != 0");
  	    $usercountn = mysqli_num_rows($usercheckq);

  	    $transcheckq = mysqli_query($con,"SELECT * FROM `transact_tb` WHERE dir != 0");
  	    $transcountn = mysqli_num_rows($transcheckq);

		// $momocheckq = mysqli_query($con,"select * from mtn_momo where wallet = '$userid'");
  //       $momofetch = mysqli_fetch_array($momocheckq);

		$stop = 0;
		$updater = 0;
	}






}
?>


<?php include ('reply_api.php');

$sms_source = "AndrewsFCU";

	$sms_type = 0;

/* kjw@acm.org

damasktb

*/ ?>
