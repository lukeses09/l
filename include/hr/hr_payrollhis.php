<?php
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID = $_SESSION['hr'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Payroll History Visited','$username','Employee Accounts','$userdep')");
?>
<html>
<title>Payroll History</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='hr_home.php'>H.R Home</a></li>
			<li><a href='hr_employee_records.php'>Employee Records</a></li>
			<li class='active'><a href='#'>Employee Payroll</a></li>
			<li><a href='hr_evalhis.php'>Evaluation History</a></li>
			<li><a href='hr_dtrsum.php'>DTR History</a></li>
			<li><a href='hr_applicants.php'>Applicants</a></li>
			<li><a href='hr_leaves.php'>Leaves</a></li>
			<li><a href='./hr_ann.php'>Announcement</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<div id="hr_evalhis">
			<h3>Payroll History:</h3>
			<div id="hr_evalhis1">
			<?php
				include('../../database/connection.php');
				$result = mysql_query("select *  from existdb.payroll_print order by FULLNAME ASC");
				echo "<table id='tbl_eval' cellspacing='0'>";
				echo "<tr>";
				echo "<th>Period</th>";
				echo "<th>Year</th>";
				echo "<th>Employee #</th>";
				echo "<th>Full Name</th>";
				echo "<th>BASIC</th>";
				echo "<th>CUTOFF</th>";
				echo "<th>COLA</th>";
				echo "<th>NET</th>";
				echo "<th>DEDUCTION</th>";
				echo "<th>SSS</th>";
				echo "<th>PHILHEALTH</th>";
				echo "<th>PAGIBIG</th>";
				echo "<th>TAX</th>";
				echo "<th>GROSS</th>";
				echo "</tr>";
				while ($row = mysql_fetch_array($result))
				{
					$payroll = $row['PAYROLL'];
					$year = $row['YEAR'];
					$employeeid = $row['EMPLOYEEID'];
					$name = $row['FULLNAME'];
					$bpay	= $row['BASICPAY'];
					$cutoff	= $row['CUTOFF'];
					$cola = $row['COLA'];
					$net	= $row['NET'];
					$ded	= $row['DED'];
					$sss	= $row['SSS'];
					$pht	= $row['PHT'];
					$pbg	= $row['PBG'];
					$tax	= $row['TAX'];
					$gpay	= $row['GPAY'];

					echo "<tr>";
					echo "<td>$payroll</td>";
					echo "<td>$year</td>";
					echo "<td>$employeeid</td>";
					echo "<td>$name</td>";
					echo "<td>$bpay</td>";
					echo "<td>$cutoff</td>";
					echo "<td>$cola</td>";
					echo "<td>$net</td>";
					echo "<td>$ded</td>";
					echo "<td>$sss</td>";
					echo "<td>$pht</td>";
					echo "<td>$pbg</td>";
					echo "<td>$tax</td>";
					echo "<td>$gpay</td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
			</div>
		</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<?php //include('../../js/time.js'); ?>