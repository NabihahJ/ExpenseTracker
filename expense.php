<?php
	include('constant.php');
	include('login-check.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
	    <link rel="stylesheet" type="text/css" href="css/style1.css">
	    <link rel="stylesheet" type="text/css" href="css/expense.css">
	</head>
	<body>
		<header>
		    <nav>
		        <ul>
		            <li><a href="home.php">Home</a></li>
					<li><a href="expense.php">Expense Tracker</a></li>
		            <li><a href="myaccount.php">My Account</a></li>
		        </ul>
		    </nav>
		</header>

		<div class="app">

			<h1>Expense Tracker</h1>

			<?php
			$user = $_SESSION['user'];
				$sql="SELECT * FROM totalbalance WHERE username='$user'";
				$res=mysqli_query($conn,$sql);
				if($res==TRUE){
					$count = mysqli_num_rows($res);
					if($count == 1){ //check if data is available
						//get details
						$row=mysqli_fetch_assoc($res);
						$balance = $row['balance'];
						$tincome = $row['totincome'];
						$texpense = $row['totexpense'];
						
					}else{
						$balance = 0;
						$tincome = 0;
						$texpense = 0;
					}
				}
			?>

			<div class="balance-container">
	            <h2>Your Balance</h2>
	            <div id="balance">
	            	<?php
	            		echo "Rs ".$balance;
	            	?>
	            </div>
	        </div>

	        <div class="cashflow-container">
                <div class="income-container">
                     <h2>Total Income</h2>
                     <div id="income">
                     	<?php
							echo "Rs ".$tincome;
						?>
                     </div>
                </div>
                <div class="expense-container">
                     <h2>Total Expense</h2>
                     <div id="expense">
                     	<?php
							echo "Rs ".$texpense;
						?>
                     </div>
                </div>
            </div>

            <div class="transaction-container">
                <div class="add-income">
                    <div class="form-container">
		                <h2>Add new transaction</h2>
		                <form action="expense.php" method="GET">
		                    <label for="name">Transaction Name</label><br>
		                    <input id="nameincome" name="nameincome" type="text"><br>
		                    <label for="amount">Amount</label><br>
		                    <input id="incomeamount" name="incomeamount" type="number"> 
		                    <br>
		                    <button id="incomeBtn" name="submit1">Add Income</button> 
		                </form>
		            </div>
                </div>
                <div class="add-expense">
                     <div class="form-container">
		                <h2>Add new transaction</h2>
		                <form action="expense.php" method="GET">
		                    <label for="name">Transaction Name</label><br>
		                    <input id="expensename" name="expensename" type="text"><br>
		                    <label for="amount">Amount</label><br>
		                    <input id="expenseamount" name="expenseamount" type="number"> 
		                    <br>
		                    <button id="expenseBtn" name="submit2">Add Expense</button>   
		                </form>
		            </div>
                </div>
            </div>
		</div>

<?php include('footer.php');?>

<?php
	//add to database
	// check wheter submit is clicked
	if(isset($_GET['submit1'])){
		//capture data
		$tname = $_GET['nameincome'];
		$amount = $_GET['incomeamount'];
		$date = date("Y-m-d");

		// sql code to insert into database
		$sql = "INSERT INTO transactions SET
			user = '$user',
			tname = '$tname',
			income = '$amount',
			tdate = '$date'
		";

		//save to db
		$res = mysqli_query($conn, $sql) or die(mysqli_error());


		$newbal = $balance + $amount;
		$newincome = $tincome + $amount;
		$sql1="UPDATE totalbalance SET
			balance = '$newbal',
			totincome = '$newincome'
			WHERE username='$user'
		";
		$res1 = mysqli_query($conn, $sql1);
		
		//verify
		if($res == TRUE){
			header('location:'.SITEURL.'expense.php');
		}else{
			echo "fail";
		}


	}elseif(isset($_GET['submit2'])){
		//capture data
		$tname = $_GET['expensename'];
		$amount = $_GET['expenseamount'];
		$date = date("Y-m-d");

		// sql code to insert into database
		$sql = "INSERT INTO transactions SET
			user = '$user',
			tname = '$tname',
			expense = '$amount',
			tdate = '$date'
		";

		//save to db
		$res = mysqli_query($conn, $sql) or die(mysqli_error());


		$newbal = $balance - $amount;
		$newexpense = $texpense + $amount;
		$sql1="UPDATE totalbalance SET
			balance = '$newbal',
			totexpense = '$newexpense'
			WHERE username='$user'
		";
		$res1 = mysqli_query($conn, $sql1);
		
		//verify
		if($res == TRUE){
			header('location:'.SITEURL.'expense.php');
		}else{
			echo "fail";
		}
	}



?>