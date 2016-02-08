<html>
<title>Supervisor</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li class='active'><a href='sup_home.php'>Supervisor Home</a></li>
			<li><a href='sup_employee.php' name='home'>Supervisor Employees</a></li>
			<li><a href='sup_leaves.php'>Employee Leaves</a></li>
			<li><a href='sup_evaluation.php'>Employee Evaluation</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<?php include('sup_home_content.php'); ?>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>