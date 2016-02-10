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
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Leaves Record Visited','$username','Employee Accounts','$userdep')");
?>
<html>
<title>Leaves</title>
<header>
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
</header>
<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='sup_home.php'>Supervisor Home</a></li>
			<li><a href='sup_employee.php' name='home'>Supervisor Employees</a></li>
			<li class='active'><a href='#'>Employee Leaves</a></li>
			<li><a href='sup_evaluation.php'>Employee Evaluation</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
		<div id="hr_applicants_content">
			<?php /*
				include('../../database/connection.php');
				$result = mysql_query("select * from existdb.manual_file_leave WHERE STATUS='PENDING' and DEPARTMENT='$userdep'");
				echo "<table id='tbl_manualleave'>";
					echo "<tr><td><b>Manual Leave:</b></td>
					<td></td><td></td><td></td><td></td>
					</tr>";
					echo "<tr>";
					echo "<td>Employee No.<t/d>";
					echo "<td>Leave Type<t/d>";
					echo "<td>Reason<t/d>";
					echo "<td>Count<t/d>";
					echo "<td>Approval<t/d>";
					echo "<td><t/d>";
					echo "</tr>";
					
				while($row 	= mysql_fetch_array($result))
				{
					$eid = $row['EMPLOYEEID'];
					$lty = $row['L_TYPE'];
					$cou = $row['COUNT'];
					$reason = $row['REASON'];
				
					echo "<tr>";
					echo "<td>$eid</td>";
					echo "<td>$lty<t/d>";
					echo "<td>$reason<t/d>";
					echo "<td>$cou<t/d>";
					echo "<td><a href='sup_approve.php?EMPLOYEEID=".$row['EMPLOYEEID']."&COUNT=".$row['COUNT']."&LTYPE=".$row['L_TYPE']."' onclick='return confirm(/Are you sure you want to reject?/)'>Approve?</a><t/d>";
					echo "<td><a href='sup_delleave.php?ID=".$row['ID']."&EMPLOYEEID=".$row['EMPLOYEEID']."&COUNT=".$row['COUNT']."&LTYPE=".$row['L_TYPE']."' onclick='return confirm(/Are you sure you want to reject?/)'>Disapprove?</a><t/d>";
					echo "</tr>";
				}
				echo "</table>";
			*/?>
<div class="row">
	<hr>
	<div class="col-xs-12">
    <table id="table_lv" class="table table-condensed table-striped table-hover">
      <thead>
        <tr>
        	<th>Employee</th>
        	<th>Leave</th>
        	<th>Start</th>
        	<th>End</th>
        	<th>Reason</th>
        	<th>Status</th>   
        	<th style="width:10px"></th>        	        	     	
        </tr>
        <tbody></tbody>
      </thead>
    </table>	
	</div><!--col-xs-6-->
</div>	

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
      "aoColumnDefs": [ { "bSortable": false, "aTargets": [6] } ],
      "aaSorting": []
    });  //Initialize the datatable department
//.tables  

	function lv_approve(lv_id){
	    //ajax now
	    $.ajax ({
	      type: "POST",
	      url: "lv/update_lv.php",
	      data: 'lv_id='+lv_id, 
	      cache: false, 
	      success: function(s){
	        if(s==0){
	          load_table_lv();
	          alert('Leave File APPROVED');              
	        }//.if
	        else{
	          clear_lc_form();
	          alert('Error: No Connection');         
	        }//.else
	      }  
	    }); 
	    //ajax end   
	}

	function load_table_lv(){ 
	  //ajax now
	  $.ajax ({
	    type: "POST",
	    url: "lv/load_table_lv.php",
	    dataType: 'json',
	    cache: false,
	    success: function(s)
	    {
	      table_lv.fnClearTable();        
	      for(var i = 0; i < s.length; i++) 
	      { 	      	
	        table_lv.fnAddData
	        ([
	          s[i][6],s[i][1],s[i][2],s[i][3],s[i][4],s[i][5].toUpperCase(),
	          '<button onclick="lv_approve(this.value)" value='+s[i][0]+' title="Approve Leave" class="btn btn-xs btn-success">APPROVE</button>',
	        ],false); 
	        table_lv.fnDraw();
	      }       
	    }  
	  }); 
	  //ajax end  
	} //.load table_lv

	load_table_lv();



</script>