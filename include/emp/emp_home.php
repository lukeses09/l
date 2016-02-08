
<html>
<title>Main Page</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li class='active'><a href='emp_home.php'>My Profile</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='emp_leave.php'>Leave Filing</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
		<?php include('emp_home_content.php'); ?>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>