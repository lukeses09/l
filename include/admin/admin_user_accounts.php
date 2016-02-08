<?php
	date_default_timezone_set('Asia/Manila');
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID1 = $_SESSION['admin'];
    $DATE = date("Y-m-d", time());
    $TIME = date("H:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Welcome to Admin User Accounts','$username','User Accounts','$userdep')");

?>
<html>
<title>User Accounts</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>	
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='admin_home.php'>Administrator Home</a></li>
			<li class='active'><a href='admin_user_accounts.php'>User Accounts</a></li>
			<li><a href='admin_log_trails.php'>Log Trail</a></li>
			<li><a href='admin_backup.php'>Backup and Recovery</a></li>
			<li><a href='admin_ann_posting.php'>Announcement Posting</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
		<?php include('admin_user_accounts_content.php'); ?>
		<?php include('../footer.php'); ?>
	</div>
</body>
	
</html>
<?php //nclude('../js/time.js'); ?>