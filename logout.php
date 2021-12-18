<?php
	include('constant.php');
	session_destroy();

	header("Location:".SITEURL."login.php");
?>