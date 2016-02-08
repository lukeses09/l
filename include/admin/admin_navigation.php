<?php
	include('../../database/connection.php');
	$login_name = $_SESSION['ADMIN'];
	$result	=	mysql_query("select * from existdb.useraccounts where USERNAME='$login_name'");	
	$row = mysql_fetch_array($result);

		echo
		'<div id="admin_navigation">
    	<ul id="nav">
		<li><a href="admin_home.php">Home</a></li>
		<li><a href="admin_user_accounts.php">User Accounts</a></li>
		<li><a href="admin_employee_records.php">Employee Records</a></li>
		<li><a href="../logout.php">LOGOUT</a></li>
		<li><a href="#" id="time"></a></li>
		</ul>
		</div>';
?>
