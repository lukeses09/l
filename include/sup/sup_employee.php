<html>
<head>
<title>Supervisor Employee</title>
<link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>
<body>
<form enctype='multipart/form-data' action="" method="post">
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
	?>
	
	<?php include('../header.php'); ?>
    <div id="cssmenu">
	<ul>
	<li><a href='sup_home.php' name='home'>Supervisor Home</a></li>
	<li class='active'><a href='#' name='home'>Supervisor Employees</a></li>
	<li><a href='sup_leaves.php'>Employee Leaves</a></li>
	<li><a href='#'>Employee Evaluation</a></li>
	
	<li><a href='../logout.php' name='logout'>Logout</a></li>
	<li><a href='#' id="time"></a></li>
	</ul>
    </div>
	<br>
<div id="hr_employeerecords_content">
		<div id="hr_employeerecords_content_1">
			<?php
			$count1 = 1;
			if(isset($_POST['search']))
			{

				$EMPLOYEENUM = $_POST['nsearch'];
				if($EMPLOYEENUM != "")
				{
					include('../../database/connection.php');
					$result	=	mysql_query("select * from existdb.employees WHERE DEPARTMENT='$userdep'");	
					$count	=	mysql_num_rows($result);
					
					if($count > 0)
					{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th></th>";
						echo "<th>Employee No.</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";					
						echo "<th>Position</th>";
						echo "<th>Date Hired</th>";
						
						while($row = mysql_fetch_array($result))
						{
							
							echo "<tr>";
							echo '<td><b>'.$count1.'</b></td>';
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';						
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['DATE_HIRED'].'</td>';
							echo "</tr>";
							$count1 = $count1 + 1;
						}
						echo "</table>";
					}
					else
					{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th></th>";
						echo "<th>Employee No.</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";					
						echo "<th>Position</th>";
						echo "<th>Date Hired</th>";
						
						echo "<tr>";
						echo '<td id="no_records">NO RECORDS</td>';
						echo "</tr>";
					}
				}
				else
				{
					include('../../database/connection.php');
					$result	=	mysql_query("select * from existdb.employees where DEPARTMENT='$userdep'");	
					$count	=	mysql_num_rows($result);
					
					if($count > 0)
					{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th></th>";
						echo "<th>Employee No.</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";					
						echo "<th>Position</th>";
						echo "<th>Date Hired</th>";
						echo "<th>View Profile</th>";
						echo "<th>Edit</th>";
						echo "<th>Delete</th>";
						
						while($row = mysql_fetch_array($result))
						{
							
							echo "<tr>";
							echo '<td><b>'.$count1.'</b></td>';
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';						
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['DATE_HIRED'].'</td>';
							$count1 = $count1 + 1;
						}
						echo "</table>";
					}
					else
					{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>Employee No.</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";					
						echo "<th>Position</th>";
						echo "<th>Date Hired</th>";
						
						echo "<tr>";
						echo '<td id="no_records">NO RECORDS</td>';
						echo "</tr>";
					}
					
					
				}
				
			}
			elseif(isset($_POST['back']))
			{
				include('../../database/connection.php');
				$result	=	mysql_query("select * from existdb.employees where DEPARTMENT='$userdep'");	
				$count	=	mysql_num_rows($result);
				
				if($count > 0)
				{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th></th>";
						echo "<th>Employee No.</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";					
						echo "<th>Position</th>";
						echo "<th>Date Hired</th>";
					
					while($row = mysql_fetch_array($result))
					{
							echo "<tr>";
							echo '<td><b>'.$count1.'</b></td>';
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';						
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['DATE_HIRED'].'</td>';
							echo "</tr>";
							$count1= $count1 + 1;
					}
					echo "</table>";
				}
				else
				{
					echo "<table id='tbl_user' cellspacing='0'>";
					echo "<th>Employee No.</th>";
					echo "<th>Last Name</th>";
					echo "<th>First Name</th>";
					echo "<th>Middle Name</th>";
					echo "<th>Department</th>";					
					echo "<th>Position</th>";
					echo "<th>Date Hired</th>";
					
					echo "<tr>";
					echo '<td id="no_records">NO RECORDS</td>';
					echo "</tr>";
				}	
			}
			else
			{
				include('../../database/connection.php');
				$result	=	mysql_query("select * from existdb.employees where DEPARTMENT='$userdep' order by LNAME ASC");	
				$count	=	mysql_num_rows($result);
				
				if ($count > 0)
				{
					echo "<table id='tbl_user' cellspacing='0'>";
					echo "<th></th>";
					echo "<th>Employee No.</th>";
					echo "<th>Last Name</th>";
					echo "<th>First Name</th>";
					echo "<th>Middle Name</th>";
					echo "<th>Department</th>";					
					echo "<th>Position</th>";
					echo "<th>Date Hired</th>";
					
					while($row = mysql_fetch_array($result))
					{
						echo "<tr>";
						echo '<td><b>'.$count1.'</b></td>';
						echo '<td>'.$row['EMPLOYEEID'].'</td>';
						echo '<td>'.$row['LNAME'].'</td>';
						echo '<td>'.$row['FNAME'].'</td>';
						echo '<td>'.$row['MNAME'].'</td>';
						echo '<td>'.$row['DEPARTMENT'].'</td>';						
						echo '<td>'.$row['POSITION'].'</td>';
						echo '<td>'.$row['DATE_HIRED'].'</td>';
						echo "</tr>";
						$count1 = $count1 + 1;
					}
					echo "</table>";
				}
				else
				{
					echo "<table id='tbl_user' cellspacing='0'>";
					echo "<th></th>";
					echo "<th>Employee No.</th>";
					echo "<th>Last Name</th>";
					echo "<th>First Name</th>";
					echo "<th>Middle Name</th>";
					echo "<th>Department</th>";					
					echo "<th>Position</th>";
					echo "<th>Date Hired</th>";
					
					echo "<tr>";
					echo '<td id="no_records">NO RECORDS</td>';
					echo "</tr>";
				}
			}	
			?>
		</div>
		</div>
	</div>
<?php include('../footer.php'); ?>
</body>	
</html>