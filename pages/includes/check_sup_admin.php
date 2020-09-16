<?php

if(isset($_SESSION['login_type'])){

	$superad = $poweruser['is_superadmin'];

	if($_SESSION['login_type'] != "admin" && superad == 1 ) {

		 header("location: ../pages/");

	}

   
}

?>