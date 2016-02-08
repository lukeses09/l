<?php
include('../../database/connection.php');
	session_start();
	$EMPLOYEEID1 = $_SESSION['hr'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','HR Applicants Visited','$username','User Accounts','$userdep')");
?>
<html>
<title>Applicants</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='hr_home.php'>H.R Home</a></li>
			<li><a href='hr_employee_records.php'>Employee Records</a></li>
			<li><a href='hr_payrollhis.php'>Employee Payroll</a></li>
			<li><a href='hr_evalhis.php'>Evaluation History</a></li>
			<li><a href='hr_dtrsum.php'>DTR History</a></li>
			<li class='active'><a href='#'>Applicants</a></li>
			<li><a href='hr_leaves.php'>Leaves</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<div id="hr_applicants_content">
			<?php
			// Connect to the database
			$dbLink = new mysqli('127.0.0.1', 'root', '', 'existdb');
			if(mysqli_connect_errno()) {
				die("MySQL connection failed: ". mysqli_connect_error());
			}
			 
			// Query for a list of all existing files
			$sql = 'SELECT * FROM `application`';
			$result = $dbLink->query($sql);
			 
			// Check if it was successfull
			if($result) {
				// Make sure there are some files in there
				if($result->num_rows == 0) {
					echo '<p>There are no files in the database</p>';
				}
				else {
					// Print the top of a table
					echo '<table id="tbl_applicants">
							<tr>
								<td><b>Uploaded Applicant Resume</b></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td><b>Name</b></td>
								<td><b>Date Submitted</b></td>
								<td><b>&nbsp;</b></td>
								<td><b>&nbsp;</b></td>
							</tr>';
			 
					// Print each file
					while($row = $result->fetch_assoc()) {
						echo "
							<tr>
								<td>{$row['name']}</td>
								<td>{$row['created']}</td>
								<td><a href='hr_get_file.php?id={$row['id']}'>Download</a></td>
								<td><a href='#?id={$row['id']}'>Delete</a></td>
							</tr>";
					}
			 
					// Close table
					echo '</table>';
				}
			 
				// Free the result
				$result->free();
			}
			else
			{
				echo 'Error! SQL query failed:';
				echo "<pre>{$dbLink->error}</pre>";
			}
			 
			// Close the mysql connection
			$dbLink->close();
			?>
	</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>