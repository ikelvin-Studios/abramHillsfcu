<?php

if(isset($_SESSION['login_type'])){

	if($_SESSION['login_type'] != "admin") {

		 header("location: ../../pages");

	}

   
}

?>