<?php
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID1 = $_SESSION['hr'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Successfully Deleted','$username','User Accounts','$userdep')");

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
			<li><a href='hr_home.php'>Human Resource Home</a></li>
			<li><a href='hr_employee_records.php'>Employee Records</a></li>
			<li><a href='#'>Employee Payroll</a></li>
			<li class='active'><a href='#'>Evaluation History</a></li>
			<li><a href='hr_applicants.php'>Applicants</a></li>
			<li><a href='hr_leaves.php'>Leaves</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<div id="hr_evalhis">
			<?php
				include('../../database/connection.php');
				$result = mysql_query("select *  from existdb.evaluation");
				echo "<table id='tbl_eval' cellspacing='0'>";
				echo "<tr>";
				echo "<th>Date</th>";
				echo "<th>Employee No.</th>";
				echo "<th>Evaluation Type</th>";
				echo "<th>Full Name</th>";
				echo "<th>A</th>";
				echo "<th>B</th>";
				echo "<th>C</th>";
				echo "<th>D</th>";
				echo "<th>E</th>";
				echo "<th>F</th>";
				echo "<th>G</th>";
				echo "<th>H</th>";
				echo "<th>I</th>";
				echo "<th>Overall Rating</th>";
				echo "<th>Comments</th>";
				echo "</tr>";
				while ($row = mysql_fetch_array($result))
				{
					$eid = $row['EMPLOYEEID'];
					$date = $row['EVALDATE'];
					$eval = $row['EV_TYPE'];
					$name = $row['FULLNAME'];
					$a	= $row['A4'];
					$b	= $row['B5'];
					$c	= $row['C9'];
					$d	= $row['D6'];
					$e	= $row['E5'];
					$f	= $row['F4'];
					$g	= $row['G7'];
					$h	= $row['H5'];
					$i	= $row['I6'];
					$or   = $row['O1'];
					$co   = $row['COMMENTS'];
					echo "<tr>";
					echo "<td>$date</td>";
					echo "<td>$eid</td>";
					echo "<td>$eval</td>";
					echo "<td>$name</td>";
					echo "<td>$a</td>";
					echo "<td>$b</td>";
					echo "<td>$c</td>";
					echo "<td>$d</td>";
					echo "<td>$e</td>";
					echo "<td>$f</td>";
					echo "<td>$g</td>";
					echo "<td>$h</td>";
					echo "<td>$i</td>";
					echo "<td>$or</td>";
					echo "<td>$co</td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<?php //include('../../js/time.js'); ?>