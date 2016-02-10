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
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Evaluation History Visited','$username','Employee Accounts','$userdep')");
?>

<html>
<title>Evaluation History</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body>
	<form action="" method="post">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		
		<div id="cssmenu">
			<ul>
			<li><a href='hr_home.php'>H.R Home</a></li>
			<li><a href='hr_employee_records.php'>Employee Records</a></li>
			<li><a href='hr_payrollhis.php'>Employee Payroll</a></li>
			<li class='active'><a href='#'>Evaluation History</a></li>
			<li><a href='hr_dtrsum.php'>DTR History</a></li>
			<li><a href='hr_applicants.php'>Applicants</a></li>
			<li><a href='hr_leaves.php'>Leaves</a></li>
			<li><a href='./hr_ann.php'>Announcement</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		
		<div id="hr_evalhis">
			<h3>Evaluation History:</h3>
			<input type="text" placeholder="Search..." id="search" name="search">
			<input type="submit" name="submit" id="btnsearch">
			<div id="hr_evalhis1">
			<?php
				if(isset($_POST['submit']))
				{
					$search = $_POST['search'];
					include('../../database/connection.php');
					$result = mysql_query("select *  from existdb.evaluation where EVALBY LIKE '%$search%' or EVALDATE LIKE '%$search%' or EMPLOYEEID LIKE '%$search%' or EV_TYPE LIKE '%$search%' or FULLNAME LIKE '%$search%'");
					echo "<table id='tbl_eval' cellspacing='0'>";
					echo "<tr>";
					echo "<th>Date</th>";
					echo "<th>Employee No.</th>";
					echo "<th>Evaluation Type</th>";
					echo "<th>Full Name</th>";
					echo "<th>Evaluated by</th>";
					echo "<th>1</th>";
					echo "<th>2</th>";
					echo "<th>3</th>";
					echo "<th>4</th>";
					echo "<th>5</th>";
					echo "<th>6</th>";
					echo "<th>7</th>";
					echo "<th>8</th>";
					echo "<th>9</th>";
					echo "<th>Overall Rating</th>";
					echo "<th>Comments</th>";
					echo "</tr>";
					while ($row = mysql_fetch_array($result))
					{
						$eid = $row['EMPLOYEEID'];
						$date = $row['EVALDATE'];
						$eval = $row['EV_TYPE'];
						$name = $row['FULLNAME'];
						$evalby = $row['APPNAME'];
						$a	= $row['A4'];
						$b	= $row['B5'];
						$c	= $row['C9'];
						$d	= $row['D6'];
						$e	= $row['E5'];
						$f	= $row['F4'];
						$g	= $row['G7'];
						$h	= $row['H5'];
						$i	= $row['I6'];
						$or   = $row['O1'];
						$co   = $row['COMMENTS'];
						echo "<tr>";
						echo "<td>$date</td>";
						echo "<td>$eid</td>";
						echo "<td>$eval</td>";
						echo "<td>$name</td>";
						echo "<td>$evalby</td>";
						echo "<td>$a</td>";
						echo "<td>$b</td>";
						echo "<td>$c</td>";
						echo "<td>$d</td>";
						echo "<td>$e</td>";
						echo "<td>$f</td>";
						echo "<td>$g</td>";
						echo "<td>$h</td>";
						echo "<td>$i</td>";
						echo "<td>$or</td>";
						echo "<td>$co</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else
				{
					$result = mysql_query("select *  from existdb.evaluation");
					echo "<table id='tbl_eval' cellspacing='0'>";
					echo "<tr>";
					echo "<th>Date</th>";
					echo "<th>Employee No.</th>";
					echo "<th>Evaluation Type</th>";
					echo "<th>Full Name</th>";
					echo "<th>Evaluated by</th>";
					echo "<th>1</th>";
					echo "<th>2</th>";
					echo "<th>3</th>";
					echo "<th>4</th>";
					echo "<th>5</th>";
					echo "<th>6</th>";
					echo "<th>7</th>";
					echo "<th>8</th>";
					echo "<th>9</th>";
					echo "<th>Overall Rating</th>";
					echo "<th>Comments</th>";
					echo "</tr>";
					while ($row = mysql_fetch_array($result))
					{
						$eid = $row['EMPLOYEEID'];
						$date = $row['EVALDATE'];
						$eval = $row['EV_TYPE'];
						$name = $row['FULLNAME'];
						$evalby = $row['APPNAME'];
						$a	= $row['A4'];
						$b	= $row['B5'];
						$c	= $row['C9'];
						$d	= $row['D6'];
						$e	= $row['E5'];
						$f	= $row['F4'];
						$g	= $row['G7'];
						$h	= $row['H5'];
						$i	= $row['I6'];
						$or   = $row['O1'];
						$co   = $row['COMMENTS'];
						echo "<tr>";
						echo "<td>$date</td>";
						echo "<td>$eid</td>";
						echo "<td>$eval</td>";
						echo "<td>$name</td>";
						echo "<td>$evalby</td>";
						echo "<td>$a</td>";
						echo "<td>$b</td>";
						echo "<td>$c</td>";
						echo "<td>$d</td>";
						echo "<td>$e</td>";
						echo "<td>$f</td>";
						echo "<td>$g</td>";
						echo "<td>$h</td>";
						echo "<td>$i</td>";
						echo "<td>$or</td>";
						echo "<td>$co</td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				
			?>
			</div>
		</div>

		<?php include('../footer.php'); ?>
	</div>
	</form>
</body>
</html>

<?php //include('../../js/time.js'); ?>