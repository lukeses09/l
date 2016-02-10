<?php
	date_default_timezone_set('Asia/Manila');
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID1 = $_SESSION['admin'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Welcome to Administrators Backup and Recovery','$username','User Accounts','$userdep')");

?>
<html>
<title>Administrator</title>
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
			<li><a href='admin_log_trails.php'>Log Trail</a></li>
			<li class='active'><a href='#'>Backup and Recovery</a></li>
			<li><a href='admin_ann_posting.php'>Announcement Posting</a></li>
			<li ><a href='admin_lc.php'>Leave Credits</a></li>						
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		
		<div id="recovery_content">
				<form action="" method="post">
					<h3>Backup and Recovery:</h3><br>
					<select name="table_backup" id="backup">
						<option value="employees">EMPLOYEES</option>
						<option value="useraccounts">USER ACCOUNTS</option>
						<option value="application">APPLICATION</option>
						<option value="dtr">DAILY TIME RECORD</option>
						<option value="emp_num_leave">EMPLOYEE NO. OF LEAVE</option>
						<option value="evaluation">EVALUATION</option>
						<option value="log_trail">LOG TRAILS</option>
						<option value="manual_file_leave">FILE LEAVE</option>
						<option value="payroll_print">PAYROLL HISTORY</option>
					</select><br><br>
					<input type="submit" name="backup" value="Backup" id="backup1"/><br><br>
				
				
					<select name="table_load" id="backup">
						<option value="employees">EMPLOYEES</option>
						<option value="useraccounts">USER ACCOUNTS</option>
						<option value="application">APPLICATION</option>
						<option value="dtr">DAILY TIME RECORD</option>
						<option value="emp_num_leave">EMPLOYEE NO. OF LEAVE</option>
						<option value="evaluation">EVALUATION</option>
						<option value="log_trail">LOG TRAILS</option>
						<option value="manual_file_leave">FILE LEAVE</option>
						<option value="payroll_print">PAYROLL HISTORY</option>
					</select><br><br>	
					<input type="submit" name="load" value="Load" id="backup1"/>
					
					<?php
						if(isset($_POST['backup']))
						{
							include("../../database/connection.php");
							
							if(! $con )
							{
								die('Could not connect: ' . mysql_error());
							}
							
							$table_name = $_POST['table_backup'];
							$backup_file  = "/". $_POST['table_backup'].".sql";			
							$sql = "SELECT * INTO OUTFILE '$backup_file' FROM $table_name";
							mysql_select_db($database);
							$retval = mysql_query( $sql, $con );
										   
							if(!$retval)
							{
								echo '<script>alert("File Exist, Delete first before backup");</script>';
							}
							else
							{
								echo '<script>alert("File Successfully backup");</script>';
								mysql_close($con);	
							}

						}
						elseif(isset($_POST['load']))
						{
							include("../../database/connection.php");
							if(! $con )
							{
									die('Could not connect: ' . mysql_error());
							 }
							  
							 $table_name = $_POST['table_backup'];
							 $backup_file  = "/". $_POST['table_backup'].".sql";	
							 $sql = "LOAD DATA INFILE '$backup_file' INTO TABLE $table_name";
							 
							 mysql_select_db($database);
							 $retval = mysql_query( $sql, $con );
							 
							if(!$retval)
							{
								echo '<script>alert("Could Not Load backup");</script>';
							}
							else
							{
								echo '<script>alert("File Successfully Loaded");</script>';
								mysql_close($con);
							}
						}
						
					?>
					
			</form>
			
		</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>



<?php //include('../../js/time.js'); ?>