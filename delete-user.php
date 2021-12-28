<?php
	//include connection
	include('constant.php');
	$uname = $_SESSION['user'];
	//get id to delete
	$id=$_GET['id'];

	//sql code to delete
	$sql = "DELETE FROM users WHERE id=$id";

	//execute
	$res = mysqli_query($conn, $sql);

	$sql1 = "DELETE FROM transactions WHERE user=$uname";
	$res1 = mysqli_query($conn, $sql1);

	$sql2 = "DELETE FROM totalbalance WHERE username=$uname";
	$res2 = mysqli_query($conn, $sql2);

	//check if query is executed
	if($res==TRUE){
		// create session to display message
		$_SESSION['delete'] = "Account has been deleted successfully";
		//redirect
		header('location:'.SITEURL.'login.php');
	}else{
		// create session to display message
		$_SESSION['delete'] = "Account failed to be deleted";
		//redirect
		header('location:'.SITEURL.'myaccount.php');
	}
?>