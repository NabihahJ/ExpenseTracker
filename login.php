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
   <h1>Log in</h1>
   <p>No account? <a href="register.php">Register here!</a></p>

   <form action="login.php" method="post" onsubmit="return cvalidateblank()">


		<?php
			if(isset($_SESSION['login'])){
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}

			if(isset($_SESSION['delete'])){
				echo $_SESSION['delete'];
				unset($_SESSION['delete']);							
			}

			if(isset($_SESSION['no-login-message'])){
				echo $_SESSION['no-login-message'];
				unset($_SESSION['no-login-message']);
			}
		?>

       <input type="text" id="lusername" name="lusername" placeholder="username">
       <input type="password" id="lpsw" name="lpassword" placeholder="Password">
       <button type="submit" name="submit">LOGIN</button>
   </form>
</div>

<?php include('footer.php');?>

<?php
	if(isset($_POST['submit'])){
		//get data from from
		$username = $_POST['lusername']; 
		$password=$_POST['lpassword'];

		//sql code to check
		$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";

		//execute query
		$result =  mysqli_query($conn, $sql); 

		//check if rows are obtained
		if (mysqli_num_rows($result) > 0) {

			//user available and login
			$_SESSION['login'] = "Login Successful"; 
			$_SESSION['user'] = $username;

			//redirect user to second page
			header("Location:".SITEURL."myaccount.php");
		}else{
			//user not available and login failed
			$_SESSION['login'] = "<label style='color: #ff4757;'>Username and Password does not match</label>";

			//redirect user to second page
			header("Location:".SITEURL."login.php");
		}
	}
?>