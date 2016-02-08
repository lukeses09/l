<div id="hr_employeerecords_content">
		<form action="" method="post">
		<input type="text" name="nsearch" id="search" autocomplete="off">
		<input type="submit" name="search" value="Search" id="btnsearch">
		<input type="submit" name="back" value="Back" id="btnsearch">
		<?php include('hr_add_employee_navigation.php'); ?>
		<div id="hr_employeerecords_content_1">
		
			<?php
			$count1 = 1;
			if(isset($_POST['search']))
			{

				$EMPLOYEENUM = $_POST['nsearch'];
				if($EMPLOYEENUM != "")
				{
					include('../../database/connection.php');
					$result	=	mysql_query("select * from existdb.employees WHERE EMPLOYEEID like '%$EMPLOYEENUM%' or LNAME like '%$EMPLOYEENUM%' or FNAME like '%$EMPLOYEENUM%' or POSITION LIKE '%$EMPLOYEENUM%' or DEPARTMENT LIKE '%$EMPLOYEENUM%'");	
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
							echo "<td id='profile'><id='profile' a href='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
							echo "<td id='edit'><a href='hr_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a href='hr_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)' id='delete'>Delete</a></td>";
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
							echo "<td id='profile'><id='profile' a href='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
							echo "<td id='edit'><a href='hr_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a href='hr_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
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
							echo "<td id='profile'><id='profile' a href='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
							echo "<td id='edit'><a href='hr_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a href='hr_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
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
						echo "<td id='profile'><id='profile' a href='#?EMPLOYEEID=".$row['EMPLOYEEID']."'>View Full Profile</a></td>";
						echo "<td id='edit'><a href='hr_edit_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Edit</a></td>";
						echo "<td id='delete'><a href='hr_delete_employee.php?EMPLOYEEID=".$row['EMPLOYEEID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
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