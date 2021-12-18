<?php
	//authorization
	//check if user is log in or not
	if(!isset($_SESSION['user'])){
		$_SESSION['no-login-message'] = "<label style='color: #ff4757;'>Please login to access your account</label>";
		header("Location:".SITEURL."login.php");
	}
?>