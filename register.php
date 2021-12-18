<?php
	include('constant.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
    <title><Document></title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="javascript/validation.js"> </script>
</head>
<body>
	<header>
	    <nav>
	        <ul>
	            <li><a href="index.php">Home</a></li>
	            <li><a href="login.php">Login</a></li>
	            <li><a href="register.php">Register</a></li>
	        </ul>
	    </nav>
	</header>

<div> 
   <h1>Register</h1>
   <p>Already have an account? <a href="login.php">Login!</a></p>

   <form action="register.php" method="post" onsubmit="return validate()">

		<?php 
			if(isset($_SESSION['addu'])) {//checking if session is set
				echo $_SESSION['addu'];//display session
				unset($_SESSION['addu']);//remove session
			}
		?>
       <input type="text" id="username" name="username" placeholder="username">
       <input type="password" id="psw" name="password" placeholder="Password">
       <input input type="password" id="psw-repeat" name="cpassword" placeholder="Confirm Password">
       <button type="submit" name="submit"> REGISTER</button>
   </form>
</div>

<?php include('footer.php');?>

<?php
	//add to database
	// check wheter submit is clicked
	if(isset($_POST['submit'])){
		//capture data
		$username = $_POST['username'];
		$password = $_POST['cpassword'];

		// sql code to insert into database
		$sql = "INSERT INTO users SET
			username = '$username',
			password = '$password'
		";

		//save to db
		$res = mysqli_query($conn, $sql) or die(mysqli_error());

		$sql1 = "INSERT INTO totalbalance SET
			username = '$username',
			balance = 0,
			totincome = 0,
			totexpense = 0
		";
		$res1 = mysqli_query($conn, $sql1) or die(mysqli_error());

		//verify
		if($res == TRUE){
			$_SESSION['addu'] = "User has been input";
			$_SESSION['user'] = $username;
			header("location:".SITEURL.'myaccount.php');
		}else{
			$_SESSION['addu'] = "Failed to add new user";
			header("location:".SITEURL.'register.php');
		}
	}
?>