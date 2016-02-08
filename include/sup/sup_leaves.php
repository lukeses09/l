<?php
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID = $_SESSION['sup'];
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
			<li><a href='sup_home.php'>Supervisor Home</a></li>
			<li><a href='sup_employee.php' name='home'>Supervisor Employees</a></li>
			<li class='active'><a href='#'>Employee Leaves</a></li>
			<li><a href='sup_evaluation.php'>Employee Evaluation</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<div id="hr_applicants_content">
			<?php
				include('../../database/connection.php');
				$result = mysql_query("select * from existdb.manual_file_leave WHERE STATUS='PENDING' and DEPARTMENT='$userdep'");
				echo "<table id='tbl_manualleave'>";
					echo "<tr><td><b>Manual Leave:</b></td>
					<td></td><td></td><td></td><td></td>
					</tr>";
					echo "<tr>";
					echo "<td>Employee No.<t/d>";
					echo "<td>Leave Type<t/d>";
					echo "<td>Reason<t/d>";
					echo "<td>Count<t/d>";
					echo "<td>Approval<t/d>";
					echo "<td><t/d>";
					echo "</tr>";
					
				while($row 	= mysql_fetch_array($result))
				{
					$eid = $row['EMPLOYEEID'];
					$lty = $row['L_TYPE'];
					$cou = $row['COUNT'];
					$reason = $row['REASON'];
				
					echo "<tr>";
					echo "<td>$eid</td>";
					echo "<td>$lty<t/d>";
					echo "<td>$reason<t/d>";
					echo "<td>$cou<t/d>";
					echo "<td><a href='sup_approve.php?EMPLOYEEID=".$row['EMPLOYEEID']."&COUNT=".$row['COUNT']."&LTYPE=".$row['L_TYPE']."' onclick='return confirm(/Are you sure you want to reject?/)'>Approve?</a><t/d>";
					echo "<td><a href='sup_delleave.php?ID=".$row['ID']."&EMPLOYEEID=".$row['EMPLOYEEID']."&COUNT=".$row['COUNT']."&LTYPE=".$row['L_TYPE']."' onclick='return confirm(/Are you sure you want to reject?/)'>Disapprove?</a><t/d>";
					echo "</tr>";
				}
				echo "</table>";
			?>
	</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>