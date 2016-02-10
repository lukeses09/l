<html>
<title>Employee Leave</title>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
    <!-- Bootstrap 3.3.5 -->
    <link href="../../plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />  
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../../plugins/bootstrap/css/bootstrap.min.css">    
    <!--script-->
    <!-- jQuery 2.1.4 -->
    <script src="../../plugins/jQuery/jQuery-2.1.4.min.js"></script>    
    <script src="../../plugins/datatables/jquery.dataTables.js" type="text/javascript"></script> 
    <script src="../../plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>       
</head>
<body>
	<form action="" method="post" enctype="multipart/form-data">
	<div id="wrapper">
	<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='emp_home.php'>My Profile</a></li>
			<li><a href='emp_ann.php'>Announcement</a></li>
			<li class='active'><a href='emp_leave.php'>Leave Filing</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
        </div>


		<div id="emp_leave_content">
			<div id="leave_count">
				<?php
					session_start();
					include('../../database/connection.php');
					$EMPLOYEEID = $_SESSION['emp'];
					?>
					<input id="emp_id" type="text" value="<?php echo $EMPLOYEEID?>">
					<?php

					include('../../database/connection.php');
					$result = mysql_query("select * from existdb.emp_num_leave where EMPLOYEEID='$EMPLOYEEID'");
					$row 	= mysql_fetch_array($result);
				
					$SL =  $row['SICK']." Days";
					$VL =  $row['VACATION']." Days";
					$EL =  $row['EMERGENCY']." Days";
					$ML =  $row['MATERNITY']." Days";
					
/*
					echo "<table id='tbl_leavec'>";
					echo "<tr>";
						echo "<td><b>Credits:</b></td>";
						echo "<td></td>";
						echo "<td></td>";
					echo "</tr>";	
					echo "<tr>";
						echo "<td>1</td>";
						echo "<td>Vacation</td>";
						echo "<td>$VL</td>";
					echo "</tr>";
					echo "<tr>";
						echo "<td>2</td>";
						echo "<td>Sick</td>";
						echo "<td>$SL</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td>3</td>";
						echo "<td>Emergency</td>";
						echo "<td>$EL</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td>4</td>";
						echo "<td>Maternity / Paternity</td>";
						echo "<td>$ML</td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td></td>";
						echo "<td></td>";
						echo "<td></td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td>Leave Type:</td>";
						echo "<td><select id='input' name='leave_type'>
									<option value='v'>Vacation Leave</option>
									<option value='s'>Sick Leave</option>
									<option value='e'>Emergency Leave</option>
									<option value='m'>Maternity Leave</option>
								</select></td>";
						echo "<td></td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td>Date From:</td>";
						echo "<td><input type='date' id='input' name='dfrom' required></td>";
						echo "<td></td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td>Date To:</td>";
						echo "<td><input type='date' id='input' name='dto' required></td>";
						echo "<td></td>";
					echo "</tr>";
					
					echo "<tr>";
						echo "<td>Reason</td>";
						echo "<td><textarea id='tareason' name='reason' required></textarea></td>";
						echo "<td><input type='submit' id='btn' name='leave' onclick='return confirm(/are you sure/)'></td>";
					echo "</tr>";
					echo "</table>";
					echo "<hr id='hr'>";
*/					
					


					if(isset($_POST['leave']))
					{
					$result = mysql_query("select * from existdb.employees where EMPLOYEEID='$EMPLOYEEID'");
					$row 	= mysql_fetch_array($result);
					$DEP = $row['DEPARTMENT'];
						
						$dto 	= strtotime($_POST['dto']);
						$dfrom 	= strtotime($_POST['dfrom']);
						$dfrom1 = $_POST['dfrom'];
						$dto1	= $_POST['dto'];
						
						$l_type = $_POST['leave_type'];
						$reason = $_POST['reason'];
						$int 	= ($dto - $dfrom) / 86400;
						
						if($int > 0 )
						{
							if($l_type == "v")
							{
								//$sql = "update existdb.emp_num_leave set VACATION = VACATION-'$int' WHERE EMPLOYEEID='$EMPLOYEEID'";
								//$result = mysql_query($sql, $con);
								
								$sql = "INSERT INTO existdb.manual_file_leave(EMPLOYEEID,L_TYPE,COUNT,STATUS,DFROM,DTO,REASON,DEPARTMENT) VALUES('$EMPLOYEEID','Vacation','$int','PENDING','$dfrom1','$dto1','$reason','$DEP')";
								$result = mysql_query($sql, $con);
								
								if($result)
								{
									echo '<script>alert("Vacation Leave Successfully Filed, Wait for HR Confirmation");</script>';
								}
							}
							elseif($l_type == "s")
							{
								$sql = "INSERT INTO existdb.manual_file_leave(EMPLOYEEID,L_TYPE,COUNT,STATUS,DFROM,DTO,REASON,DEPARTMENT) VALUES('$EMPLOYEEID','Sick','$int','PENDING','$dfrom1','$dto1','$reason','$DEP')";
								$result = mysql_query($sql, $con);
								
								if($result)
								{
									echo '<script>alert("Sick Leave Successfully Filed Wait for HR Confirmation");</script>';
								}
							}
							elseif($l_type == "e")
							{
								$sql = "INSERT INTO existdb.manual_file_leave(EMPLOYEEID,L_TYPE,COUNT,STATUS,DFROM,DTO,REASON,DEPARTMENT) VALUES('$EMPLOYEEID','Emergency','$int','PENDING','$dfrom1','$dto1','$reason','$DEP')";
								$result = mysql_query($sql, $con);
								
								if($result)
								{
									echo '<script>alert("Emergency Leave Successfully Filed, Wait for HR Confirmation");</script>';
								}
							}
							elseif($l_type == "m")
							{
								$sql = "INSERT INTO existdb.manual_file_leave(EMPLOYEEID,L_TYPE,COUNT,STATUS,DFROM,DTO,REASON,DEPARTMENT) VALUES('$EMPLOYEEID','Maternity','$int','PENDING','$dfrom1','$dto1','$reason','$DEP')";
								$result = mysql_query($sql, $con);
								
								if($result)
								{
									echo '<script>alert("Maternity Leave Successfully Filed, Wait for HR Confirmation");</script>';
								}
							}
						}
						else
						{
							echo '<script>alert("Invalid Date");</script>';
						}
						
						
					}

				?>
<div class="row">
	<div class="col-xs-7">
		<h4>Leave List</h4>
    <table id="table_lv" class="table table-condensed table-striped table-hover">
      <thead>
        <tr>
        	<th>Leave</th>
        	<th>Start</th>
        	<th>End</th>
        	<th>Reason</th>
        	<th>Status</th>        	
        </tr>
        <tbody></tbody>
      </thead>
    </table>	
	</div><!--col-xs-6-->
	<!--<div class="col-xs-1"></div>-->
	<div class="col-xs-5">
		<h4>Current Credit: <text id="lv_current_credit"><font color="orange"></font></text></h4>	
		<div>
			<div class="row">
				<div id="div_lv_select" class="col-sm-6 col-xs-12">
					<label>Leave Type :</label>
					<select onchange="chk_credit(this.value)" id="lv_select" class="form-control">
						<option value="none">-- Select --</option>
					</select>						
				</div><!--col -6-->
				<div id="div_lv_desc" class="col-sm-6 col-xs-12">
					<label>Reason :</label>
					<textarea id="lv_desc" class="form-control" style="resize:none"></textarea>
				</div><!--col -6-->				
			</div>
			<div class="row">
				<div id="div_lv_date_start" class="col-sm-6 col-xs-12">
					<label>Start Date :</label>
						<input type="date" class="form-control" id="lv_date_start">			
				</div><!--col -6-->
				<div id="div_lv_date_end" class="col-sm-6 col-xs-12">
					<label>End Date :</label>
						<input type="date" class="form-control" id="lv_date_end">			
				</div><!--col -6-->				
			</div>			
		</div>
	</div><!--col-xs-6-->
</div>	
<hr>
			
			</div>

        <input type="file" name="uploaded_file" id="leave"><br>
        <input type="submit" value="Upload Leave" name="submit" id="leave1">
		</form>
		
		<?php
// Check if a file has been uploaded
if(isset($_POST['submit']))
{
if (is_uploaded_file($_FILES['uploaded_file']['tmp_name']))
{
	if(isset($_FILES['uploaded_file'])) {
		// Make sure the file was sent without errors
		if($_FILES['uploaded_file']['error'] == 0) {
			// Connect to the database
			$dbLink = new mysqli('127.0.0.1', 'root', '', 'existdb');
			if(mysqli_connect_errno()) {
				die("MySQL connection failed: ". mysqli_connect_error());
			}
	 
			// Gather all required data
			$name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
			$mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
			$data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
			$size = intval($_FILES['uploaded_file']['size']);
	 
			// Create the SQL query
			$query = "
				INSERT INTO `empleave` (
					`name`, `mime`, `size`, `data`, `created`
				)
				VALUES (
					'{$name}', '{$mime}', {$size}, '{$data}', NOW()
				)";
	 
			// Execute the query
			$result = $dbLink->query($query);
	 
			// Check if it was successfull
			if($result) {
				echo
                  "<script type='text/javascript'>alert('Leave Filing Successful');
                  {
                  window.location.href = 'emp_leave.php';
                  }
                  </script>";
			}
			else {
				echo 'Error! Failed to insert the file'
				   . "<pre>{$dbLink->error}</pre>";
			}
		}
		else {
			//echo 'An error accured while the file was being uploaded. '
			  // . 'Error code: '. intval($_FILES['uploaded_file']['error']);
		}
	 
		// Close the mysql connection
		$dbLink->close();
	}
}
        
        elseif (empty($_FILES['filename']['tmp_name'])) {
        
        }
}
?>
		</div>
	<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<script>
	//tables
	    var table_lv = $('#table_lv').dataTable({
	        columnDefs: [
	       { type: 'formatted-num', targets: 0 }
	       ],       
	      "aoColumnDefs": [ { "bSortable": false, "aTargets": [] } ],
	      "aaSorting": []
	    });  //Initialize the datatable department
	//.tables  

	function populate_lv_select(){ 
	  //ajax now
	  $.ajax ({
	    type: "POST",
	    url: "lv/populate_lv_select.php",
	    dataType: 'json',      
	    cache: false,
	    success: function(s)
	    {
	      for(var i = 0; i < s.length; i++) 
	      { 	      	
          $('#lv_select').append('<option  id="opt'+s[i][0]+'" value="'+s[i][0]+'">'+s[i][1]+'</option>');	      	
	      }       
	    }  
	  }); 
	  //ajax end  
	} //.load populate_lv_select

	function load_table_lv(emp_id){ 
	  //ajax now
	  $.ajax ({
	    type: "POST",
	    url: "lv/load_table_lv.php",
	    data: 'emp_id='+emp_id,
	    dataType: 'json',
	    cache: false,
	    success: function(s)
	    {
	      table_lv.fnClearTable();        
	      for(var i = 0; i < s.length; i++) 
	      { 	      	
	        table_lv.fnAddData
	        ([
	          s[i][1],s[i][2],s[i][3],s[i][4],s[i][5].toUpperCase(),
	        ],false); 
	        table_lv.fnDraw();
	      }       
	    }  
	  }); 
	  //ajax end  
	} //.load table_lv

	load_table_lv($('#emp_id').val());
  populate_lv_select();

	function chk_credit(lc_id){ 
		var dataString = 'lc_id='+lc_id+'&emp_id='+$('#emp_id').val();
	  //ajax now
	  $.ajax ({
	    type: "POST",
	    url: "lv/fetch_credit.php",
	    data: dataString,
	    dataType: 'json',   
	    cache: false,
	    success: function(s)
	    {
	    	if(s!=null)
		    	$('#lv_current_credit').text(s);
		    else
		    	$('#lv_current_credit').text('0');
	    }  
	  }); 
	  //ajax end  
	} //.load populate_lv_select

</script>

 
 
 