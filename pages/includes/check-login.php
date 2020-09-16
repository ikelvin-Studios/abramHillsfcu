<?php

if(isset($_SESSION['login_type']) && $powerid!='' || isset($_SESSION['login_type']) == 'admin'){
	echo  '';

	if(isset($_SESSION['check']) && isset($_SESSION['check']) == 'done' || $_SESSION['login_type'] == 'admin'){
		// $sec_check = $_SESSION['check'];
		// $sec_type = $_SESSION['login_type'];
		// echo  '<script>alert("'.$sec_check.$sec_type.'")</script>';
	}
	else{
		session_destroy();
		header("location: $base_url");
		echo '<script>window.location.assign("'.$base_url.'");</script>';
	}
}
else{
	header("location: $base_url");
	echo '<script>window.location.assign("'.$base_url.'");</script>';
}
?>