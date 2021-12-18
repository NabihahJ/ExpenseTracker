<?php
	//start session
	session_start();
	//create constant to store non repeating values
	define('SITEURL', 'http://127.0.0.1/edsa-Nabs/project/');

	define('LOCALHOST', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'phptutorial');

	$conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //db connection
	$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //selecting db
?>