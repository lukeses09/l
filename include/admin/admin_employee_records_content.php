<div id="content_wrapper">
<h2>Employee Records</h2>
<div id="user_content_content">
	
	<div id="user_content">
		<form action="" method="post">
		<input type="text" name="nsearch" id="input_search" autocomplete="off">
		<input type="submit" name="search" value="Search" id="btn_search">
		<input type="submit" name="back" value="Back" id="btn_search"><br><br>
		<?php include('admin_add_employee_navigation.php'); ?>
			<?php
			if(isset($_POST['search']))
			{
				$EMPLOYEENUM = $_POST['nsearch'];
				if($EMPLOYEENUM != "")
				{
					include('../../database/connection.php');
					$result	=	mysql_query("select * from existdb.employees WHERE EMPLOYEEID like '%$EMPLOYEENUM%' or LNAME like '%$EMPLOYEENUM%' or FNAME like '%$EMPLOYEENUM%'");	
					$count	=	mysql_num_rows($result);
					
					session_start();
					$EMPLOYEEID1 = $_SESSION['admin'];
					$DATE = date("Y-m-d", time());
					$TIME = date("G:i:s A", time());
					$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
					$row1 = mysql_fetch_array($result1);
					$username = $row1['FULLNAME'];
					$userdep  = $row1['DEPARTMENT'];
					
					mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Records Searched','$username','User Accounts','$userdep')");

					
					if($count > 0)
					{
						echo "<table id='tbl_employee' cellspacing='0'>";
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
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';						
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['DATE_HIRED'].'</td>';
							echo "<td id='profile'><id='profile' a adminef='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
							echo "<td id='edit'><a adminef='admin_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a adminef='admin_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)' id='delete'>Delete</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else
					{
						session_start();
						$EMPLOYEEID1 = $_SESSION['admin'];
						$DATE = date("Y-m-d", time());
						$TIME = date("G:i:s A", time());
						$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
						$row1 = mysql_fetch_array($result1);
						$username = $row1['FULLNAME'];
						$userdep  = $row1['DEPARTMENT'];
						
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Record Searching nothing found!','$username','User Accounts','$userdep')");
					
											
						echo "<table id='tbl_employee' cellspacing='0'>";
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
						
						echo "<tr>";
						echo '<td id="no_records">NO RECORDS</td>';
						echo "</tr>";
					}
				}
				else
				{
					include('../../database/connection.php');
					$result	=	mysql_query("select * from existdb.employees");	
					$count	=	mysql_num_rows($result);
					
					if($count > 0)
					{
						session_start();
						$EMPLOYEEID1 = $_SESSION['admin'];
						$DATE = date("Y-m-d", time());
						$TIME = date("G:i:s A", time());
						$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
						$row1 = mysql_fetch_array($result1);
						$username = $row1['FULLNAME'];
						$userdep  = $row1['DEPARTMENT'];
						
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','List of Employee Displayed','$username','User Accounts','$userdep')");

						
						echo "<table id='tbl_employee' cellspacing='0'>";
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
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';						
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['DATE_HIRED'].'</td>';
							echo "<td id='profile'><id='profile' a adminef='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
							echo "<td id='edit'><a adminef='admin_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a adminef='admin_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else
					{
						session_start();
						$EMPLOYEEID1 = $_SESSION['admin'];
						$DATE = date("Y-m-d", time());
						$TIME = date("G:i:s A", time());
						$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
						$row1 = mysql_fetch_array($result1);
						$username = $row1['FULLNAME'];
						$userdep  = $row1['DEPARTMENT'];
						
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Record Serch Nothing found','$username','User Accounts','$userdep')");
					
											
						echo "<table id='tbl_employee' cellspacing='0'>";
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
						
						echo "<tr>";
						echo '<td id="no_records">NO RECORDS</td>';
						echo "</tr>";
					}
					
					
				}
				
			}
			elseif(isset($_POST['back']))
			{
				include('../../database/connection.php');
				$result	=	mysql_query("select * from existdb.employees");	
				$count	=	mysql_num_rows($result);
				
				if($count > 0)
				{
						session_start();
						$EMPLOYEEID1 = $_SESSION['admin'];
						$DATE = date("Y-m-d", time());
						$TIME = date("G:i:s A", time());
						$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
						$row1 = mysql_fetch_array($result1);
						$username = $row1['FULLNAME'];
						$userdep  = $row1['DEPARTMENT'];
						
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Search Undo, Record Found','$username','User Accounts','$userdep')");

					
						echo "<table id='tbl_employee' cellspacing='0'>";
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
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';						
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['DATE_HIRED'].'</td>';
							echo "<td id='profile'><id='profile' a adminef='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
							echo "<td id='edit'><a adminef='admin_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a adminef='admin_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
							echo "</tr>";
					}
					echo "</table>";
				}
				else
				{
					session_start();
					$EMPLOYEEID1 = $_SESSION['admin'];
					$DATE = date("Y-m-d", time());
					$TIME = date("G:i:s A", time());
					$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
					$row1 = mysql_fetch_array($result1);
					$username = $row1['FULLNAME'];
					$userdep  = $row1['DEPARTMENT'];
					
					mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Search Undo Nothing Record Found!','$username','User Accounts','$userdep')");

					
					echo "<table id='tbl_employee' cellspacing='0'>";
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
					
					echo "<tr>";
					echo '<td id="no_records">NO RECORDS</td>';
					echo "</tr>";
				}	
			}
			else
			{
				include('../../database/connection.php');
				$result	=	mysql_query("select * from existdb.employees");	
				$count	=	mysql_num_rows($result);
				
				if ($count > 0)
				{
					echo "<table id='tbl_employee' cellspacing='0'>";
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
						echo '<td>'.$row['EMPLOYEEID'].'</td>';
						echo '<td>'.$row['LNAME'].'</td>';
						echo '<td>'.$row['FNAME'].'</td>';
						echo '<td>'.$row['MNAME'].'</td>';
						echo '<td>'.$row['DEPARTMENT'].'</td>';						
						echo '<td>'.$row['POSITION'].'</td>';
						echo '<td>'.$row['DATE_HIRED'].'</td>';
						echo "<td id='profile'><id='profile' a adminef='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
						echo "<td id='edit'><a adminef='admin_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
						echo "<td id='delete'><a adminef='admin_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
						echo "</tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "<table id='tbl_employee' cellspacing='0'>";
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
					
					echo "<tr>";
					echo '<td id="no_records">NO RECORDS</td>';
					echo "</tr>";
				}
			}	
			?>
		</form>
	</div>
</div>
</div>
<br>
<br>