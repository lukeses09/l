
<div id="emp_ann">
	<div id="ann_content">
		<?php
		
	
			
			include('../../database/connection.php');
			
			$result = mysql_query("select * from existdb.holidays_events ORDER by DATE_POST DESC limit 0,10")
			 or die (mysql_error());

			if($result){
				while($row = mysql_fetch_array($result)) {
			
					$content = $row['ANNOUNCEMENT'];
					$datepost = $row['DATE_POST'];

					echo '<div id="div_ann_row"><font size=3><b>'.$datepost.'</b></font><p>'.$content.'</p></div><br/>';
			
				}
			}
			
		?>
	</div>
<?php include('../footer.php'); ?>
</div>


 
 
 