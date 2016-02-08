<div id="admin_useraccount_content">
		<form action="" method="post">
		<input type="text" name="nsearch" id="search" autocomplete="off">
		<input type="submit" name="search" value="Search" id="btnsearch">
		<input type="submit" name="back" value="Back" id="btnsearch"><br><br>
		<?php include('admin_add_user_link.php'); ?>
			<?php
			if(isset($_POST['search']))
			{
				$USERNAME = $_POST['nsearch'];
				if($USERNAME != "")
				{
						include('../../database/connection.php');
						$result	=	mysql_query("select * from existdb.useraccounts where FNAME like '%$USERNAME%' OR  LNAME like '%$USERNAME%' OR  MNAME like '%$USERNAME%' OR  DEPARTMENT like '%$USERNAME%' OR POSITION LIKE '%$USERNAME%' OR USERID='$USERNAME' order by DTIME asc");	
						$count	=	mysql_num_rows($result);
				
						if($count > 0)
						{
								echo "<table id='tbl_user' cellspacing='0'>";
								echo "<th>USER ID</th>";
								echo "<th>Position</th>";
								echo "<th>Last Name</th>";
								echo "<th>First Name</th>";
								echo "<th>Middle Name</th>";
								echo "<th>Department</th>";
								echo "<th>Date Registered</th>";
								echo "<th></th>";
								echo "<th></th>";
								
								while($row = mysql_fetch_array($result))
								{
									
									echo "<tr>";
									echo '<td>'.$row['USERID'].'</td>';
									echo '<td>'.$row['POSITION'].'</td>';
									echo '<td>'.$row['LNAME'].'</td>';
									echo '<td>'.$row['FNAME'].'</td>';
									echo '<td>'.$row['MNAME'].'</td>';
									echo '<td>'.$row['DEPARTMENT'].'</td>';
									echo '<td>'.$row['DTIME'].'</td>';
									echo "<td id='edit'><a href='admin_edit_user_accounts.php?ID=".$row['ID']."' id='edit'>Edit</a></td>";
									echo "<td id='delete'><a href='admin_delete_user_accounts.php?ID=".$row['ID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
									echo "</tr>";
								}
								echo "</table>";
						}
						else
						{
								echo "<table id='tbl_user' cellspacing='0'>";
								echo "<th>USER ID</th>";
								echo "<th>Position</th>";
								echo "<th>Last Name</th>";
								echo "<th>First Name</th>";
								echo "<th>Middle Name</th>";
								echo "<th>Department</th>";
								echo "<th>Date Registered</th>";
								echo "<th></th>";
								echo "<th></th>";
								
								echo "<tr>";
								echo "<td id='no_records'>NO RECORDS</td>";
								echo "</tr>";
						}
				
				}
				else
				{
						include('../../database/connection.php');
						$result	=	mysql_query("select * from existdb.useraccounts order by DTIME asc");	
						$count	=	mysql_num_rows($result);
				
								if($count > 0)
								{
										echo "<table id='tbl_user' cellspacing='0'>";
										echo "<th>USER ID</th>";
										echo "<th>Position</th>";
										echo "<th>Last Name</th>";
										echo "<th>First Name</th>";
										echo "<th>Middle Name</th>";
										echo "<th>Department</th>";
										echo "<th>Date Registered</th>";
										echo "<th></th>";
										echo "<th></th>";
										
										while($row = mysql_fetch_array($result))
										{
											
											echo "<tr>";
											echo '<td>'.$row['USERID'].'</td>';
											echo '<td>'.$row['POSITION'].'</td>';
											echo '<td>'.$row['LNAME'].'</td>';
											echo '<td>'.$row['FNAME'].'</td>';
											echo '<td>'.$row['MNAME'].'</td>';
											echo '<td>'.$row['DEPARTMENT'].'</td>';
											echo '<td>'.$row['DTIME'].'</td>';
											echo "<td id='edit'><a href='admin_edit_user_accounts.php?ID=".$row['ID']."' id='edit'>Edit</a></td>";
											echo "<td id='delete'><a href='admin_delete_user_accounts.php?ID=".$row['ID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
											echo "</tr>";
										}
										echo "</table>";
								}
								else
								{
										echo "<table id='tbl_user' cellspacing='0'>";
										echo "<th>USER ID</th>";
										echo "<th>Position</th>";
										echo "<th>Last Name</th>";
										echo "<th>First Name</th>";
										echo "<th>Middle Name</th>";
										echo "<th>Department</th>";
										echo "<th>Date Registered</th>";
										echo "<th></th>";
										echo "<th></th>";
										
										echo "<tr>";
										echo "<td id='no_records'>NO RECORDS</td>";
										echo "</tr>";
								}
				}
			}
			
			elseif(isset($_POST['back']))
			{
				include('../../database/connection.php');
				$result	=	mysql_query("select * from existdb.useraccounts order by DTIME asc");	
				$count	=	mysql_num_rows($result);
				
				if($count > 0)
				{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>USER ID</th>";
						echo "<th>Position</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";
						echo "<th>Date Registered</th>";
						echo "<th></th>";
						echo "<th></th>";
						
						while($row = mysql_fetch_array($result))
						{
							
							echo "<tr>";
							echo '<td>'.$row['USERID'].'</td>';
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';
							echo '<td>'.$row['DTIME'].'</td>';
							echo "<td id='edit'><a href='admin_edit_user_accounts.php?ID=".$row['ID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a href='admin_delete_user_accounts.php?ID=".$row['ID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
							echo "</tr>";
						}
						echo "</table>";
				}
				else
				{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>USER ID</th>";
						echo "<th>Position</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";
						echo "<th>Date Registered</th>";
						echo "<th></th>";
						echo "<th></th>";		
						echo "<tr>";
						echo "<td id='no_records'>NO RECORDS</td>";
						echo "</tr>";
				}
			}
			else
			{
				include('../../database/connection.php');
				$result	=	mysql_query("select * from existdb.useraccounts order by DTIME asc");	
				$count	=	mysql_num_rows($result);
				
				if($count > 0)
				{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>USER ID</th>";
						echo "<th>Position</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";
						echo "<th>Date Registered</th>";
						echo "<th></th>";
						echo "<th></th>";
						
						while($row = mysql_fetch_array($result))
						{
							
							echo "<tr>";
							echo '<td>'.$row['USERID'].'</td>';
							echo '<td>'.$row['POSITION'].'</td>';
							echo '<td>'.$row['LNAME'].'</td>';
							echo '<td>'.$row['FNAME'].'</td>';
							echo '<td>'.$row['MNAME'].'</td>';
							echo '<td>'.$row['DEPARTMENT'].'</td>';
							echo '<td>'.$row['DTIME'].'</td>';
							echo "<td id='edit'><a href='admin_edit_user_accounts.php?ID=".$row['ID']."' id='edit'>Edit</a></td>";
							echo "<td id='delete'><a href='admin_delete_user_accounts.php?ID=".$row['ID']."' onclick='return confirm(/Are you sure you want to delete?/)'>Delete</a></td>";
							echo "</tr>";
						}
						echo "</table>";
				}
				else
				{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>USER ID</th>";
						echo "<th>Position</th>";
						echo "<th>Last Name</th>";
						echo "<th>First Name</th>";
						echo "<th>Middle Name</th>";
						echo "<th>Department</th>";
						echo "<th>Date Registered</th>";
						echo "<th></th>";
						echo "<th></th>";
						
						echo "<tr>";
						echo '<td>NO RECORDS</td>';
						echo "</tr>";
						
				}
			}
?>
	</form>	
</div>