<?php
	include('../../database/connection.php');
	
    if(isset($_GET['EMPLOYEEID']))
    {
		$EMPLOYEEID=$_GET['EMPLOYEEID'];
		$result = mysql_query("select * from existdb.employees WHERE EMPLOYEEID='$EMPLOYEEID'");
		$row = mysql_fetch_array($result);
		if($row['MNAME'] == "")
		{
			$name = $row['FNAME']." ".$row['LNAME'];
		}
		else
		{
			$name = $row['FNAME']." ".$row['MNAME']." ".$row['LNAME'];
		}
		$position = $row['POSITION'];
		$department = $row['DEPARTMENT'];
		
		if(isset($_POST['payroll']))
		{
			$cola = $_POST['cola'];
			$tax = $_POST['tax'];
			$sss = $_POST['sss'];
			$pht = $_POST['pht'];
			$pgb = $_POST['pgb'];
			$bpay = $_POST['bpay'] + $tax + $sss + $pgb + $pht;
			
			$sql = mysql_query("insert into existdb.payroll(EMPLOYEEID,FULLNAME,POS,DEP,BASICPAY,COLA,TAX,SSS,PHT,PGB) VALUES('$EMPLOYEEID','$name','$position','$department','$bpay','$cola','$tax','$sss','$pht','$pgb')");
			if($sql)
			{
				echo '<script>alert("Successfull!");</script>';
				
			}
			header('location:acct_payroll_main.php');
		}
	}
?>
<html>
<title>Employee Payroll Details</title>
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
			<h3>Create Payroll Details:</h3>
			<table id="tbl_payrolldetails">
				<tr>
					<th>EMPLOYEE ID</th>
					<th>FULL NAME</th>
					<th>POSITION</th>
					<th>DEPARTMENT</th>
				</tr>
				<tr>
					<td><input type="" value="<?php echo $EMPLOYEEID; ?>" id="payroll_input" readonly></td>
					<td><input type="" value="<?php echo $name; ?>" id="payroll_input" readonly></td>
					<td><input type="" value="<?php echo $position; ?>" id="payroll_input" readonly></td>
					<td><input type="" value="<?php echo $department; ?>" id="payroll_input" readonly></td>
				</tr>
				<tr>
					<th>Basic Pay</th>
					<th>COLA</th>
					<th>TAX</th>
					<th>SSS</th>
				</tr>
				<tr>
					<td><input type="number" max="99999" min="0" name="bpay" id="payroll_input1" onKeyPress="return numbersonly(this, event)"></td>
					<td><input type="number" name="cola" min="0" name="bpay" id="payroll_input1" onKeyPress="return numbersonly(this, event)"></td>
					<td><input type="number" name="tax" min="0" name="bpay" id="payroll_input1" onKeyPress="return numbersonly(this, event)"></td>
					<td><input type="number" name="sss" min="0" name="bpay" id="payroll_input1" onKeyPress="return numbersonly(this, event)"></td>
				</tr>
				<tr>
					<th>PHILHEALTH</th>
					<th>PAGIBIG</th>
					<th></th>
					<th></th>
				</tr>
				<tr>
					<td><input type="number" name="pht" min="0" name="bpay" id="payroll_input1" onKeyPress="return numbersonly(this, event)">	</td>
					<td><input type="number" name="pgb" min="0" name="bpay" id="payroll_input1" onKeyPress="return numbersonly(this, event)"></td>
					<td><input type="submit" name="payroll" value="Create Payroll Details" id="btn" onclick='return confirm("Are you sure?")'></td>
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