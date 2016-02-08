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
			<li><a href='hr_payrollhis.php'>Employee Payroll</a></li>
			<li><a href='hr_evalhis.php'>Evaluation History</a></li>
			<li class='active'><a href='#'>DTR History</a></li>
			<li><a href='hr_applicants.php'>Applicants</a></li>
			<li><a href='hr_leaves.php'>Leaves</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<div id="hr_evalhis">
			<h3>Daily Time Record Summary:</h3>
			<div id="hr_evalhis1">
			<?php
				include('../../database/connection.php');
				$result = mysql_query("select *  from existdb.dtr order by DTRDATE desc");
				echo "<table id='tbl_eval' cellspacing='0'>";
				echo "<tr>";
				echo "<th>EMPLOYEEID</th>";
				echo "<th>EMPLOYEE</th>";
				echo "<th>DEPARTMENT</th>";
				echo "<th>POSITION</th>";
				echo "<th>DTRDATE</th>";
				echo "<th>LOGIN</th>";
				echo "<th>LOGOUT</th>";
				echo "</tr>";
				while ($row = mysql_fetch_array($result))
				{
					$payroll = $row['EMPLOYEEID'];
					

					$year = $row['DTRDATE'];
					$employeeid = $row['TIMEIN'];
					$name = $row['TIMEOUT'];

					$result1 = mysql_query("select *  from existdb.employees WHERE EMPLOYEEID='$payroll'");
					$row1 = mysql_fetch_array($result1);
					$NAME = $row1['FULLNAME'];
					$DEP = $row1['DEPARTMENT'];
					$POS = $row1['POSITION'];
					
					echo "<tr>";
					echo "<td>$payroll</td>";
					echo "<td>$NAME</td>";
					echo "<td>$DEP</td>";
					echo "<td>$POS</td>";
					echo "<td>$year</td>";
					echo "<td>$employeeid</td>";
					echo "<td>$name</td>";
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