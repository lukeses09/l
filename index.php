
<html>
<title>Home</title>
<head>
    <link rel="stylesheet" type="text/css" href="css/styles.css"/>
</head>
<body>
    <div id="wrapper">
        <?php include('include/header.php'); ?>
        <div id="cssmenu">
            <ul>
            <li class='active'><a href='#'>User's Login</a></li>
            <li><a href='include/about_home.php'>About Us</a></li>
			<li><a href='include/contactus.php'>Contact Us</a></li>
            <li><a href='include/app/application.php'>Application</a></li>
            <li><a href='#' id="time"></a></li>
            </ul>
        </div>
        <div id="index_content">
		<form action="" method="post">
		<input type ="text" name="username" id="input1" autocomplete="off" required autofocus placeholder="Username"><br>
		<input type ="password" name="password" id="input1" autocomplete="off" required placeholder="Password"><br>
		<input type="submit" name="submit" value="Submit" id="btn1"><br>
		<input type="reset" name="reset" value="Cancel" id="btn1">		
	    </form>	
		

        </div>
        <?php include('include/footer.php'); ?>
    </div>
</body>
</html>
<?php include('include/login.php'); ?>