<html>
	
	<script>
		function process_search_set_item()
		{
			alert('marb');

            
		}
	</script>
	<body>
		<form name="set_item_form" action="" method="POST">
			<div class="pop_up_layout_1">
				<span style="font-size:14px; font-style: normal; font-weight: bold; color: #000000;">
					Select Employee
				</span>
				<br><br>
				<?php
					echo 'Search Employee: ';
					echo "<input type='text' name='txt_employee_search'>";
					echo "<input type='button' name='search_skus_go' value='Search' onClick='javascript:process_search_set_item();'>";
					echo '<br><br>';
				?>
			
			</div>
			<div style="height: 5px;">
			</div>
			<div class="pop_up_layout_1">
				<table width="100%" class="table_layout_1"/>
					<tr class="table_header">
						<th>
							Employee ID
						</th>
						<th>
							Employee Name
						</th>
						<td style="width:50px;">
							&nbsp;
						</td>
					</tr>
					<?php

					include('../../database/connection.php');
  	 				$query = mysql_query("select * from existdb.employees");
  	  				while($row = mysql_fetch_array($query))
            		{

           			$lname = $row['FNAME']." ".$row['LNAME'];
           			$EMP_ID = $row['EMPLOYEEID'];
           			$dept = $row['DEPARTMENT'];
           			$position = $row['POSITION'];
           			echo '<tr>';
								?>
								<td>
									<?php
									echo $EMP_ID;
									
									?>
								</td>
								<td>
									<?php
									echo $lname;
									?>
								</td>
								<td>
									<?php
									echo '<input type="button" value="Select" onclick="set_opener_data('.$EMP_ID.',\''.$lname.'\',\''.$dept.'\',\''.$position.')"></input>';
									?>
								</td>
								<?php
							echo '</tr>';
            
					}
			</div>
		</form>
	</body>
</html>