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
			<div class="col-xs-3" id="div_lc_name">
				<label>Leave Name </label>
				<input id="lc_name" class="form-control">
			</div><!---->			
			<div class="col-xs-3" id="div_lc_qty">
				<label>Leave QTY (DAYS)</label>		
				<input id="lc_qty" type="number" class="form-control">						
			</div><!---->					
			<div class="col-xs-1">
				<br>
				<button id="btn_add_lc" title="Save Record to Leave Credit" class="btn-block btn btn-success">Save</button>				
			</div>
			<div class="col-xs-1">
				<br>
				<button id="btn_update_lc" title="Edit Record to Leave Credit" class="btn btn-primary">Update</button>				
			</div>			
			<div class="col-xs-1">
				<br>
				<button id="btn_clear_lc" title="Clear Everything" class="btn bg-default">Clear</button>				
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
	            	<th>Qty(DAYS)</th>
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
	      	var a = s[i][0];
	        table_lc.fnAddData
	        ([
	          s[i][1],s[i][2],
	          '<button onclick="update_lc(this.value)" value='+s[i][0]+' class="btn btn-xs btn-default" title="Update Leave Credit">Update</button>',
	        ],false); 
	        table_lc.fnDraw();
	      }       
	    }  
	  }); 
	  //ajax end  
	} //.load table_lc

  load_table_lc();

$('#btn_add_lc').click(function(){
	if($('#btn_update_lc').val()!='')
			alert('Currently in EDIT MODE, Select CLEAR First');
	else if(validate_lc()==false)
		alert('Please Fill up the Fields');
	else{	
  //ajax now
  $.ajax ({
    type: "POST",
    url: "admin_lc/insert_data.php",
    data: 'lc_name='+$('#lc_name').val()+'&lc_qty='+$('#lc_qty').val(), 
    cache: false, 
    success: function(s){
      if(s==0){
        clear_lc_form();
        load_table_lc();
        alert('Leave Credit Record Added');              
      }//.if
      else{
        clear_lc_form();
        alert('Error: No Connection');         
      }//.else
    }  
  }); 
  //ajax end     		
	}//else INSERT TO DB
})

function validate_lc(){
	var err = true;
	if($('#lc_name').val()==''){
	  err = false ;
	  $('#div_lc_name').addClass('has-error');
	}
	else
	  $('#div_lc_name').removeClass('has-error');   

	if($('#lc_qty').val()==''){
	  err = false ;
	  $('#div_lc_qty').addClass('has-error');
	}
	else if($('#lc_qty').val()>100){
	  err = false ;
	  $('#div_lc_qty').addClass('has-error');
	}	
	else
	  $('#div_lc_qty').removeClass('has-error');  

	return err; 
}  

function clear_lc_form(){
	$('#lc_name').val('');
	$('#lc_qty').val('');
	$('#div_lc_qty').removeClass('has-error');
	$('#div_lc_name').removeClass('has-error');
	$('#btn_update_lc').val('');
}

function update_lc(idKey){
  //ajax now
  $.ajax ({
    type: "POST",
    url: "admin_lc/fetch_data.php",
    data: 'idKey='+idKey, 
    dataType: 'json',
    cache: false, 
    success: function(s){
	    for(var i = 0; i < s.length; i++) {
	      $('#lc_name').val(s[i][1]);
	      $('#lc_qty').val(s[i][2]);
	      $('#btn_update_lc').val(s[i][0]);
	    }
    }  
  }); 
  //ajax end  
}

$('#btn_update_lc').click(function(){
  	if(validate_lc()==false || $(this).val()=='')
  		alert('Select Record to Update AND Fill up the Fields');
  	else{	
			var dataString = 'lc_id='+$(this).val()+'&lc_name='+$('#lc_name').val()+'&lc_qty='+$('#lc_qty').val();
		    //ajax now
		    $.ajax ({
		      type: "POST",
		      url: "admin_lc/update_data.php",
		      data: dataString, 
		      cache: false, 
		      success: function(s){
		        if(s==0){
		          clear_lc_form();
		          load_table_lc();
		          alert('Leave Credit Record UPDATED');              
		        }//.if
		        else{
		          clear_lc_form();
		          alert('Error: No Connection');         
		        }//.else
		      }  
		    }); 
		    //ajax end   	  		
  	}
})

$('#btn_clear_lc').click(function(){
	clear_lc_form();
})
</script>


<?php //include('../../js/time.js'); ?>