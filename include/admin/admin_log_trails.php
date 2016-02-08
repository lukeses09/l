<?php
	date_default_timezone_set('Asia/Manila');
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID = $_SESSION['admin'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Log Trail Visited','$username','User Accounts','$userdep')");
?>
<html>
<title>Log Trails</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='admin_home.php'>Administrator Home</a></li>
			<li><a href='admin_user_accounts.php'>User Accounts</a></li>
			<li class='active'><a href='#'>Log Trail</a></li>
			<li><a href='admin_backup.php'>Backup and Recovery</a></li>
			<li><a href='admin_ann_posting.php'>Announcement Posting</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
		<div id="admin_logtrails1">
		<h3>Log Trails:</h3>
		<div id="admin_logtrails">
			<?php
				include('../../database/connection.php');
				$result = mysql_query("select *  from existdb.log_trail order by LOG_DATE DESC");
				echo "<table id='tbl_eval' cellspacing='0'>";
				echo "<tr>";
				echo "<th>LOG DATE</th>";
				echo "<th>LOG TIME</th>";
				echo "<th>DETAILS</th>";
				echo "<th>USER</th>";
				echo "<th>ACCOUNT TYPE</th>";
				echo "<th>DEPARTMENT</th>";
				echo "</tr>";
				while ($row = mysql_fetch_array($result))
				{
					$a = $row['LOG_DATE'];
					$b = $row['LOG_TIME'];
					$c = $row['LOG_DET'];
					$d = $row['USER'];
					$e	= $row['ACCOUNT_TYPE'];
					$f	= $row['DEPARTMENT'];
					
					echo "<tr>";
					echo "<td>$a</td>";
					echo "<td>$b</td>";
					echo "<td>$c</td>";
					echo "<td>$d</td>";
					echo "<td>$e</td>";
					echo "<td>$f</td>";
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