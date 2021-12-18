<?php
	include('header.php');
?>

<div class="main-content">
	<div class="wrapper">
		<h1>My Account</h1>
		<br>
		<?php
			if(isset($_SESSION['login'])){
				echo $_SESSION['login'];
				unset($_SESSION['login']);
			}

			if(isset($_SESSION['update'])){
				echo $_SESSION['update'];
				unset($_SESSION['update']);
			}

			if(isset($_SESSION['addu'])) {//checking if session is set
				echo $_SESSION['addu'];//display session
				unset($_SESSION['addu']);//remove session
			}
		?>

		<table class="tbl-full">
			<tr>
				<th></th>
				<th>Username</th>
				<th></th>
				<th></th>
				<th></th>
			</tr>
			<?php
			$username = $_SESSION['user'];

			$sql = "SELECT * FROM users WHERE username='$username'";
			$res = mysqli_query($conn, $sql);

			if($res==TRUE){
				$count = mysqli_num_rows($res); //get rows from db

				if($count>0){
					$rows = mysqli_fetch_assoc($res);
					$id=$rows['id'];
					$uname=$rows['username'];

					//display the values in table
					?>

					<tr>
						<td><img src="images/profile.png" alt="profile" style="width: 100px;height: 100px;"></td>
						<td><?php echo $uname; ?></td>
						<td><a href="<?php echo SITEURL;?>update-user.php?id=<?php echo $id; ?>" class="btn-secondary">Update Account</a></td>
						<td><a href="<?php echo SITEURL;?>delete-user.php?id=<?php echo $id; ?>" class="btn-danger">Delete Account</a></td>
						<td><a href="logout.php" class="btn-out">Logout</a></td>
					</tr>
					<?php
				}
			}
			?>
		</table>

		<hr>
        <button onclick="hstransaction()">Show all transactions</button>
        <button onclick="hsgraph()">Graph representation</button>

        <div id="transaction" style="display:none">
        	<table class="tbl-full">
				<tr>
					<th>No</th>
					<th>Username</th>
					<th>Transaction  name</th>
					<th>Income</th>
					<th>Expense</th>
					<th>Transaction date</th>
				</tr>
				<?php
				$username = $_SESSION['user'];

				$sql = "SELECT * FROM transactions WHERE user='$username'";
				$res = mysqli_query($conn, $sql);

				if($res==TRUE){
					$count = mysqli_num_rows($res); //get rows from db
					$sn=1;
					if($count>0){
						while($rows=mysqli_fetch_assoc($res)){
							$uname=$rows['user'];
							$tname=$rows['tname'];
							$income=$rows['income'];
							$expense=$rows['expense'];
							$date=$rows['tdate'];

						//display the values in table
						?>
						<tr>
							<td><?php echo $sn++?></td>
							<td><?php echo $uname; ?></td>
							<td><?php echo $tname; ?></td>
							<td><?php echo $income; ?></td>
							<td><?php echo $expense; ?></td>
							<td><?php echo $date; ?></td>
						</tr>

						<?php
						}
					}
				}
				?>
			</table>
        </div>

        <div id="graph" style="display:none">
        	
        </div>
		
	</div>
</div>

<script>
function hstransaction() {
  var x = document.getElementById("transaction");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}

function hsgraph() {
  var x = document.getElementById("graph");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>
<br>
<?php include('footer.php');?>