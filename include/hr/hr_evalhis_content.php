<div id="hr_evalhis_content">
		<form action="" method="post">
		<input type="text" name="nsearch" id="search" autocomplete="off">
		<input type="submit" name="search" value="Search" id="btnsearch">
		<input type="submit" name="back" value="Back" id="btnsearch">
		<div id="hr_evalhis1">
		<?php
			if(isset($_POST['search']))			
		{
				$EMPLOYEENUM = $_POST['nsearch'];
				if($EMPLOYEENUM != "")
				{
					include('../../database/connection.php');
					$result	=	mysql_query("select * from existdb.employees WHERE EMPLOYEEID like '%$EMPLOYEENUM%' or EVALDATE like '%$EMPLOYEENUM%' or EV_TYPE like '%$EMPLOYEENUM%' or FULLNAMELIKE '%$EMPLOYEENUM%'");	
					$count	=	mysql_num_rows($result);
					
					if($count > 0)
				    {
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";					
						
						while($row = mysql_fetch_array($result))
						{
							
							echo "<tr>";
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['EVALDATE'].'</td>';
							echo '<td>'.$row['EV_TYPE'].'</td>';
							echo '<td>'.$row['FULLNAME'].'</td>';					
							echo "</tr>";
						}
						echo "</table>";
				}
				else
					{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";		
						
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
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";
						
						while($row = mysql_fetch_array($result))
						{
							
							echo "<tr>";
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['EVALDATE'].'</td>';
							echo '<td>'.$row['EV_TYPE'].'</td>';
							echo '<td>'.$row['FULLNAME'].'</td>';					
							echo "</tr>";					
						}
						echo "</table>";
					}
					else
					{
						echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";
						
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
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";
					
					while($row = mysql_fetch_array($result))
					{
							echo "<tr>";
							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['EVALDATE'].'</td>';
							echo '<td>'.$row['EV_TYPE'].'</td>';
							echo '<td>'.$row['FULLNAME'].'</td>';					
							echo "</tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";
					
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
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";
					
					while($row = mysql_fetch_array($result))
					{
						echo "<tr>";

							echo '<td>'.$row['EMPLOYEEID'].'</td>';
							echo '<td>'.$row['EVALDATE'].'</td>';
							echo '<td>'.$row['EV_TYPE'].'</td>';
							echo '<td>'.$row['FULLNAME'].'</td>';					
							echo "</tr>";
					}
					echo "</table>";
				}
				else
				{
					echo "<table id='tbl_user' cellspacing='0'>";
						echo "<th>Date</th>";
						echo "<th>Employee No.</th>";
						echo "<th>Evaluation Type</th>";
						echo "<th>Full Name</th>";
						echo "<th>Overall Rating</th>";
					
					echo "<tr>";
					echo '<td id="no_records">NO RECORDS</td>';
					echo "</tr>";
				}
					
		}
		
				
		
		?>
		</div>	
	</div>