
<html>
<title>About Us</title>
<header>
	<link rel="stylesheet" type="text/css" href="../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		
		<?php include('header.php'); ?>
		<div id="cssmenu">
            <ul>
            <li><a href='../index.php'>User's Login</a></li>
            <li class='about_home.php'><a href='#'>About Us</a></li>
			<li><a href='contactus.php'>Contact Us</a></li>
            <li><a href='#'>Application</a></li>
            <li><a href='#' id="time"></a></li>
            </ul>
		</div>
		<?php include('about_home_content.php'); ?>
		<?php include('footer.php'); ?>
	</div>
</body>
</html>

<?php //include('../../js/time.js'); ?>