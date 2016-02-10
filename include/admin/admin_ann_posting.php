<html>
<title>Announcement Posting</title>
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
			<li><a href='admin_backup.php'>Backup and Recovery</a></li>
			<li class='active'><a href='#'>Announcement Posting</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
		<div id="admin_ann_posting">
		<form action="" method="post">
				<table id="tbl_posting">
				<tr>
					<td>General Announcement</td>
					<td></td>
					<!--td>Individual Announcement</td-->	
				</tr>
				<tr>
					<td></td>
					<td></td>
					<!--td>
						<select id="employee_posting">
							<option value="Angelo James Campollo">Angelo James Campollo</option>
						</select>
					</td-->
				</tr>
				<tr>
					<td colspan=2><textarea name="comment" id="ta_ann" style="resize:none;" maxlength="500" required></textarea></td>
					<td></td>
					<!--td><textarea name="comment1" id="ta_ann" style="resize:none;" maxlength="500"></textarea></td-->
				</tr>
		
				<tr>
					<td><input type="submit" name="submit" value="Post Announcement" id="btn" onclick='return confirm("Are you sure you want to Post Announcement?")'/></td>
					<td></td>
					<!--td><input type="submit" name="submit1" value="Post Announcement" id="btn"/></td-->
				</tr>
				</table>
		</form>
		</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<?php
	include('../../database/connection.php');
	if(isset($_POST['submit']))
	{
		$announcement = $_POST['comment'];
		$date		 = date('Y-m-d');
	
		
		$sql = "INSERT INTO existdb.holidays_events(DATE_POST,ANNOUNCEMENT) VALUES('$date','$announcement')";
		$result = mysql_query($sql, $con);
		
		if($result)
		{
			echo '<script>alert("General Announcement Posted");</script>';
		}
	}
?>