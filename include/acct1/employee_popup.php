		 	<?php
			
			
  
?>
<html>
	
	<script>
		function process_search_set_item()
		{
			alert('marb');

            
		}

		function set_opener_data(item_id, item_name, dept, position, basicpay, status, daily)
		{
			
			window.opener.set_opener_data(item_id, item_name, dept, position, basicpay, status, daily);

			window.close();
		}
	</script>
	<body>
		<form name="set_item_form" action="" method="POST">
			<?php
				// echo form_hidden('set_item_post_flag','1');
				// echo form_hidden('set_item_current_page_number','1');
				// echo form_hidden('txt_set_item_data_type',$set_item_data_type_value);
				// echo form_hidden('txt_set_item_object_name','employee');
				// echo form_hidden('txt_set_item_group_id', $set_item_group_id_value);
				// echo form_hidden('txt_set_item_areaset_id', $areaset_id_value);
				// echo form_hidden('txt_set_item_catset_id', $catset_id_value);
			?>
			<div class="pop_up_layout_1">
				<span style="font-size:14px; font-style: normal; font-weight: bold; color: #000000;">
					Select Employee
				</span>
				<br><br>
				<?php
					echo 'Search Employee: ';

								
					echo "<input type='text' name='txt_employee_search' id='input'>";


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
  	 				$query = mysql_query("select p.BASICPAY as bpay, e.STATUS, e.LNAME, e.FNAME, e.EMPLOYEEID, e.DEPARTMENT, e.POSITION from existdb.employees e LEFT JOIN existdb.payroll p ON e.EMPLOYEEID = p.EMPLOYEEID");
  	  				while($row = mysql_fetch_array($query))
            		{

           			$lname = $row['FNAME']." ".$row['LNAME'];
           			$EMP_ID = $row['EMPLOYEEID'];
           			$dept = $row['DEPARTMENT'];
           			$position = $row['POSITION'];
           			$basicpay = $row['bpay'];
           			$status = $row['STATUS'];
           			$daily = ($basicpay/22);
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
									echo '<input type="button" value="Select" onclick="set_opener_data('.$EMP_ID.',\''.$lname.'\',\''.$dept.'\',\''.$position.'\',\''.$basicpay.'\',\''.$status.'\',\''.$daily.'\')"></input>';
									?>
								</td>
								<?php
							echo '</tr>';
            
            		}



					$int_row_alt = 0;
					$row_count = mysql_num_rows($query);
					if ($row_count > 0)
					{
						for ($int_loop = 1; $int_loop <= $row_count; $int_loop++)
						{
								

							$int_row_alt++;
						}
					}
					?>
			</div>
		</form>
	</body>
</html>