<html>
<title>Accountant</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>

<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li class='active'><a href='acct_home.php'>Accountant's Home</a></li>
			<li><a href='acct_payroll_main.php'>Payroll</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='acct_dtr.php'>Daily Time Record</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<?php include('acct_home_content.php'); ?>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<?php //include('../../js/time.js'); ?>