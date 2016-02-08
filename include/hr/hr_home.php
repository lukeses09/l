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
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Welcome to HR Home','$username','Employee Accounts','$userdep')");
?>
<html>
<title>Human Resource</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li class='active'><a href='#'>H.R Home</a></li>
			<li><a href='hr_employee_records.php'>Employee Records</a></li>
			<li><a href='hr_payrollhis.php'>Employee Payroll</a></li>
			<li><a href='hr_evalhis.php'>Evaluation History</a></li>
			<li><a href='hr_dtrsum.php'>DTR History</a></li>
			<li><a href='hr_applicants.php'>Applicants</a></li>
			<li><a href='hr_leaves.php'>Leaves</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<?php include('hr_home_content.php'); ?>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<?php //include('../../js/time.js'); ?>