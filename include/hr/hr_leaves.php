<?php
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID = $_SESSION['hr'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Leaves Record Visited','$username','Employee Accounts','$userdep')");
?>
<html>
<title>Leaves</title>
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
			<li><a href='hr_applicants.php'>Applicants</a></li>
			<li class='active'><a href='#'>Leaves</a></li>
			<li><a href='./hr_ann.php'>Announcement</a></li>
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
			$sql = 'SELECT * FROM `empleave`';
			$result = $dbLink->query($sql);
			 
			// Check if it was successfull
			if($result) {
				// Make sure there are some files in there
				if($result->num_rows == 0) {
					echo '<p>There are no files in the database</p>';
				}
				else {
					// Print the top of a table
					echo '<table id="tbl_manualleave">
							<tr><td><b>Manual Leave:</b></td>
						<td></td><td></td><td></td>
						</tr>
							<tr>
								<td><b>Name</b></td>
								<td><b>Date Submitted</b></td>
								<td></td>
								<td></td>
							</tr>';
			 
					// Print each file
					while($row = $result->fetch_assoc()) {
						echo "
							<tr>
								<td>{$row['name']}</td>
								<td>{$row['created']}</td>
								<td><a href='hr_get_file1.php?id={$row['id']}'>Download</a></td>
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
			<br>
			
			<?php
				include('../../database/connection.php');
				$result = mysql_query("select * from existdb.manual_file_leave");
				echo "<table id='tbl_manualleave'>";
					echo "<tr>
					<td></td><td></td><td></td><td></td>
					</tr>";
					echo "<tr>";
					echo "<td>Employee No.<t/d>";
					echo "<td>Department<t/d>";
					echo "<td>Leave Type<t/d>";
					echo "<td>Date From<t/d>";
					echo "<td>Date To<t/d>";
					echo "<td>Reason<t/d>";
					echo "<td>Status<t/d>";
					echo "</tr>";
					
				while($row 	= mysql_fetch_array($result))
				{
					$eid = $row['EMPLOYEEID'];
					$DEP = $row['DEPARTMENT'];
					$lty = $row['L_TYPE'];
					$DFROM = $row['DFROM'];
					$DTO = $row['DTO'];
					$REASON = $row['REASON'];
					$STATUS = $row['STATUS'];
				
					echo "<tr>";
					echo "<td>$eid</td>";
					echo "<td>$DEP<t/d>";
					echo "<td>$lty<t/d>";
					echo "<td>$DFROM<t/d>";
					echo "<td>$DTO<t/d>";
					echo "<td>$REASON<t/d>";
					echo "<td>$STATUS<t/d>";
					echo "</tr>";
				}
				echo "</table>";
			?>
	</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>