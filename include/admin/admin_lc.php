<?php
	date_default_timezone_set('Asia/Manila');
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID1 = $_SESSION['admin'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Welcome to Administrators Home','$username','User Accounts','$userdep')");

?>
<html>
<title>Leave Credits</title>
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
    <!--.script-->
</header>
<body onload="timer_function()">
	<div id="wrapper">			
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='admin_home.php'>Administrator Home</a></li>
			<li><a href='admin_user_accounts.php'>User Accounts</a></li>
			<li><a href='admin_log_trails.php'>Log Trail</a></li>
			<li><a href='admin_backup.php'>Backup and Recovery</a></li>
			<li><a href='admin_ann_posting.php'>Announcement Posting</a></li>
			<li class='active'><a href='admin_lc.php'>Leave Credits</a></li>			
			<li><a href='../logout.php'>Logout</a></li>		
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>


		<div id="admin_home_content" style="margin-top:50px">

		<div class="row">
			<div class="col-xs-2"></div><!--left margin-->
			<div class="col-xs-4">
				<label>Leave Name </label>
				<input class="form-control">
			</div><!---->			
			<div class="col-xs-3">
				<label>Leave QTY </label>		
				<input type="number" class="form-control">						
			</div><!---->					
			<div class="col-xs-1">
				<br>
				<button id="btn_add_lc" title="Save Record to Leave Credit" class="btn bg-default">Save</button>				
			</div>
			<div class="col-xs-2"></div><!--right margin-->		
		</div><!--.row-->

			<div class="row">			
				<div class="col-xs-2"></div>
				<div class="col-xs-8">
					<hr>				
	        <table id="table_lc" class="table table-striped table-hover">
	          <thead>
	            <tr>
	            	<th>Name</th>
	            	<th>Qty</th>
	              <th style="width:10px"></th>                    
	            </tr>
	            <tbody></tbody>
	          </thead>
	        </table>					
				</div>
				<div class="col-xs-2"></div>				
			</div><!--row-->

		</div><!--main content-->

		<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<script>
	//tables
	    var table_lc = $('#table_lc').dataTable({
	        columnDefs: [
	       { type: 'formatted-num', targets: 0 }
	       ],       
	      "aoColumnDefs": [ { "bSortable": false, "aTargets": [2] } ],
	      "aaSorting": []
	    });  //Initialize the datatable department
	//.tables   

	function load_table_lc(){ 
	  //ajax now
	  $.ajax ({
	    type: "POST",
	    url: "admin_lc/load_table_lc.php",
	    dataType: 'json',      
	    cache: false,
	    success: function(s)
	    {
	      table_lc.fnClearTable();        
	      for(var i = 0; i < s.length; i++) 
	      { 
	        table_lc.fnAddData
	        ([
	          s[i][0],s[i][1],
	          '<button class="btn btn-xs btn-default" title="Update Leave Credit">Edit</button>',
	        ],false); 
	        table_lc.fnDraw();
	      }       
	    }  
	  }); 
	  //ajax end  
	} //.load table_lc

  load_table_lc();

  $('#btn_add_lc').click(function(){
  	$('#admin_lc_modal').modal('show');
  })

</script>


<?php //include('../../js/time.js'); ?>