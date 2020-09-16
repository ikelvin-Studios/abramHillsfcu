<?php 
//require('connect.php');

$get_wallet = mysqli_query($con," SELECT * FROM `wallet` where `wallet`.`wallet` = '$userid'");


$get_wallet_all = mysqli_fetch_array($get_wallet);




$cyclepoints = $get_wallet_all['cyclepoints'];


if ($cyclepoints < 1) {
	$stop = 1;
	$message = "Your activity due to insufficient referal points. Please refer someone using your referral link";
			 $try_sms = reply::rp_sendsms($sms_source,$user_phone,$message,$sms_type);
           if ($try_sms) {
            	echo '<script> alert("You have no referal point left for this operation, Please refer someone"); window.location.assign("'.$site_base_url.'/pages")</script>';
            }

	
} else {

	$new_cycle = $cyclepoints - 1;
	$cycle_count = mysqli_query($con, "UPDATE `wallet` SET `cyclepoints` = '$new_cycle' where `wallet`.`wallet` = '$userid'");

	if ($cycle_count) {
		$activity = $get_wallet_all['activity_count'];

		

		if (($activity + 1) == 0) { 

			$status_query = mysqli_query($con, "UPDATE `user` SET `status` = 'active' WHERE `user`.`id` = '$userid' AND`payment_ready` = 'yes'");
			if ($status_query) {
				
				$new_activity = $activity + 2;
			}

			

			} else {

				$new_activity = $activity + 1;

			}

		$activity_count = mysqli_query($con, "UPDATE `wallet` SET `activity_count` = '$new_activity' where `wallet`.`wallet` = '$userid'");

		if ($activity_count) {
			$it_works = true;
			$stop = 0;
		}

	}
	
}
?>