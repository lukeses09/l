<?php
	include('../../database/connection.php');
	$login_name = $_SESSION['ACCOUNTANT'];
	$result	=	mysql_query("select * from existdb.useraccounts where USERNAME='$login_name'");	
	$row = mysql_fetch_array($result);

		echo
		'<div id="admin_navigation">
    	<ul id="nav">
		<li><a href="acct_home.php">Home</a></li>
		<li><a href="acct_payroll_layout.php">Payroll</a></li>
		<li><a href="#" id="time"></a></li>
		</ul>
		</div>';
?>
