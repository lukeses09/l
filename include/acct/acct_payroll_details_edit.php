<?php
	include('../../database/connection.php');
	
    if(isset($_GET['EMPLOYEEID']))
    {
		$EMPLOYEEID=$_GET['EMPLOYEEID'];
		$result = mysql_query("select * from existdb.payroll WHERE EMPLOYEEID='$EMPLOYEEID'");
		$row = mysql_fetch_array($result);
		
		if(isset($_POST['payroll']))
		{
			$cola = $_POST['cola'];
			$tax = $_POST['tax'];
			$sss = $_POST['sss'];
			$pht = $_POST['pht'];
			$pgb = $_POST['pgb'];
			$bpay = $_POST['bpay'] + $tax + $sss + $pgb + $pht;
			
			$sql = mysql_query("UPDATE existdb.payroll set BASICPAY='$bpay', COLA='$cola', TAX='$tax', SSS='$sss', PHT='$pht', PGB='$pgb' WHERE EMPLOYEEID='$EMPLOYEEID'");
			if($sql)
			{
				echo '<script>alert("Payroll Details Successfull Updated!");</script>';
			}
			
		}
	}
?>
<html>
<title>Edit Payroll Details</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<form action="" method="post">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='acct_home.php'>Accountant's Home</a></li>
			<li class='active'><a href='acct_payroll_main.php'>Payroll</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='acct_dtr.php'>Daily Time Record</a></li>
			
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
		<div id="hr_employeerecords_content">
			<h3>Update Payroll Details:</h3>
			<table id="tbl_payrolldetails">
				<tr>
					<th>EMPLOYEE ID</th>
					<th>FULL NAME</th>
					<th>POSITION</th>
					<th>DEPARTMENT</th>
				</tr>
				<tr>
					<td><input type="" value="<?php echo $EMPLOYEEID; ?>" id="payroll_input" readonly></td>
					<td><input type="" value="<?php echo $row['FULLNAME']; ?>" id="payroll_input" readonly></td>
					<td><input type="" value="<?php echo $row['POS']; ?>" id="payroll_input" readonly></td>
					<td><input type="" value="<?php echo $row['DEP']; ?>" id="payroll_input" readonly></td>
				</tr>
				<tr>
					<th>Basic Pay</th>
					<th>COLA</th>
					<th>TAX</th>
					<th>SSS</th>
				</tr>
				<tr>
					<td><input type="number" max="99999" min="0" name="bpay" id="payroll_input1" onKeyPress="return numbersonly(this, event)" value="<?php echo $row['BASICPAY']; ?>" required></td>
					<td><input type="number" name="cola" min="0"  id="payroll_input1" onKeyPress="return numbersonly(this, event)" value="<?php echo $row['COLA']; ?>" required></td>
					<td><input type="number" name="tax" min="0"  id="payroll_input1" onKeyPress="return numbersonly(this, event)" value="<?php echo $row['TAX']; ?>" required></td>
					<td><input type="number" name="sss" min="0"  id="payroll_input1" onKeyPress="return numbersonly(this, event)" value="<?php echo $row['SSS']; ?>" required></td>
				</tr>
				<tr>
					<th>PHILHEALTH</th>
					<th>PAGIBIG</th>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td><input type="number" name="pht" min="0"  id="payroll_input1" onKeyPress="return numbersonly(this, event)" value="<?php echo $row['PHT']; ?>" required>	</td>
					<td><input type="number" name="pgb" min="0"  id="payroll_input1" onKeyPress="return numbersonly(this, event)" value="<?php echo $row['PGB']; ?>" required></td>
					<td><input type="submit" name="payroll" value="Update Payroll Details" id="btn" onclick='return confirm("Are you sure?")'></td>
					<td></td>
				</tr>
			</table>
		</div>
		<?php include('../footer.php'); ?>
	</div>
</form>
</body>
</html>
<?php

include('../../javascript/numbers.js');
include('../../javascript/letter.js');
?>