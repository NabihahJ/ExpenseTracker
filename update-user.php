<?php include('header.php');?>

<div class="main-content">
	<div class="wrapper">
		<h1>Update User</h1>
		<br>

		<?php
			//get id of admin
			$id=$_GET['id'];
			//sql
			$sql="SELECT * FROM users WHERE id=$id";

			//execute
			$res=mysqli_query($conn, $sql);

			//check query
			if($res==TRUE){
				$count = mysqli_num_rows($res);
				if($count == 1){ //check if data is available
					//get details
					$row=mysqli_fetch_assoc($res);
					$username = $row['username'];
					$password = $row['password'];

				}else{
					header('location:'.SITEURL.'myaccount.php');
				}
			}
		?>

		<form action="" method="POST">
			<table class="tbl-30">
				
				<tr>
					<td>Username: </td>
					<td><input type="text" name="username" value="<?php echo $username;?>"></td>
				</tr>

				<tr>
					<td>Password: </td>
					<td><input type="password" name="password" value="<?php echo $password;?>"></td>
				</tr>

				<tr>
					<td colspan="2">
						<input type="hidden" name="id" value="<?php echo $id;?>">
						<input type="submit" name="submit" value="Update Acconut" class="btn-secondary">
					</td>
				</tr>
			</table>
		</form>
	</div>
</div>

<?php
	//check submit
	if(isset($_POST['submit'])){
		//get data from form
		$id=$_POST['id'];
		$username=$_POST['username'];
		$password=$_POST['password'];

		//sql to update
		$sql="UPDATE users SET
			username = '$username',
			password = '$password'
			WHERE id='$id'
			";

		//execute
		$res = mysqli_query($conn, $sql);

		//check if success
		if($res==TRUE){
			$_SESSION['update'] = "Account updated successfully";
			//redirect
			header('location:'.SITEURL.'myaccount.php');
		}else{
			$_SESSION['update'] = "Fail to update account";
			//redirect
			header('location:'.SITEURL.'myaccount.php');
		}
	}
?>

<?php include('footer.php');?>