<?php
	include('../../database/connection.php');
		session_start();
	$EMPLOYEEID1 = $_SESSION['admin'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Welcome to Add New User','$username','User Accounts','$userdep')");

?>
<html>
<title>Add User Accounts</title>
<header>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
<div id="wrapper">
    <?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='admin_home.php'>Administrator Home</a></li>
			<li class='active'><a href='admin_user_accounts.php'>User Accounts</a></li>
			<li><a href='admin_ann_posting.php'>Announcement Posting</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			<li><a href='#' id="time"></a></li>
			</ul>
		</div>
	<div id="admin_edituser_content">
		<form action="" method="post">
			<table border="0	" cellpadding="3" cellspacing="3" id="tbl_add_user">
				<tr>
					<td id="tdl">
						<b>ADD USER ACCOUNTS:</b>
					</td>
					<td id="tdl">
						Last Name.
					</td>
					<td id="tdl">
						<input type="text" name="lname"  id="input" onkeydown="return alphaOnly(event);" required/>
					</td>
					<td id="tdred">*</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						First Name:
					</td>
					<td id="tdl">
						<input type="text" name="fname"  id="input" onkeydown="return alphaOnly(event);" required/>
					</td>
					<td id="tdred">*</td>
				</tr>
				
				<tr>
					<td></td>
					<td>
						Middle Name:
					</td>
					<td id="tdl">
						<input type="text" name="mname"  id="input" onkeydown="return alphaOnly(event);" required/>
					</td>
					<td id="tdred">*</td>
				</tr>
				
				<tr>
					<td></td>
					<td id="tdl">
						Position.
					</td>
					<td id="tdl">
						<select name="position" id="input" required>
							<option value="0">-- Select Position --</option>
							<option value="Administrator">Administrator</option>
							<option value="Accountant">Accountant</option>
							<option value="Supervisor">Supervisor</option>
							<option value="Human Resource">Human Resource</option>
						</select>
					</td>
					<td id="tdred">*</td>
				</tr>
				
				
				<tr>
					<td></td>
					<td id="tdl">
						Department:
					</td>
					<td id="tdl">
						<select name="department" id="input" required>
							<option value="0">-- Department --</option>
							<option value="Human Resource">Human Resource</option>
							<option value="Accounting">Accounting</option>
							<option value="Production">Production</option>
							<option value="Marketing">Marketing</option>
						</select>
					</td>
					<td id="tdred">*</td>
				</tr>
				<tr>
					<td></td>
					<td id="tdl">
						Username:
						</td>
						<td id="tdl"> 
							<input type="text" name="username"  id="input" required/>
						</td>
						<td id="tdred">*</td>
				</tr>
				
				<tr>
					<td></td>
					<td id="tdl">
						Password:
					</td>
					<td id="tdl">
						<input type="password" name="password" id="input" required/>
					</td>
					<td id="tdred">*</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td id="tdl"><input type="submit" name="submit" value="ADD ACCOUNT" id="btn"></td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td id="tdl"><input type="reset" name="reset" value="RESET" id="btn"></td>
				</tr>
			</table>
		</form>
	</div>
		<br>
	<br>
	<?php include('../footer.php'); ?>
	</div>
</body>
</html>


<?php
date_default_timezone_set('Asia/Manila');
include ('../../database/connection.php');
if(isset($_POST['submit']))
{
	$result1 	= mysql_query("select max(ID) from existdb.useraccounts");
	$row 		= mysql_fetch_array($result1);
	$newid 		= $row['max(ID)'] + 1;  
    $id 		= date('Y', time())."-".$newid;
    $username 	= $_POST['username'];
    $password 	= sha1($_POST['password']);
    $lname 		= ucwords(ucfirst(strtolower($_POST['lname'])));
	$fname 		= ucwords(ucfirst(strtolower($_POST['fname'])));
	$mname 		= ucwords(ucfirst(strtolower($_POST['mname'])));
    $department = $_POST['department'];
    $date_reg 	= date('Y-m-d g:i:s a');
	$position 	= $_POST['position'];
	$fullname 	= ucwords(ucfirst(strtolower($_POST['fname'])))." ".ucwords(ucfirst(strtolower($_POST['mname'])))." ".ucwords(ucfirst(strtolower($_POST['lname'])))." ";
		
    
    if($id == "" || $username == "" || $password == "" || $department == "" || $date_reg == "")
    {
       echo '<script>alert("Please Complete all inputs");</script>';
    }
    else
    {
		$result1	=	mysql_query("select * from existdb.useraccounts where USERNAME='$username'");	
		$count		=	mysql_num_rows($result1);
		if($count > 0)
		{
				echo '<script>alert("Username already taken");</script>';
		}
		else
		{
			$sql = "INSERT INTO existdb.useraccounts (USERID,USERNAME,PASSWORD,POSITION,LNAME,FNAME,MNAME,FULLNAME,DEPARTMENT,DTIME) VALUES('$id','$username','$password','$position','$lname','$fname','$mname','$fullname','$department','$date_reg')";
			$result = mysql_query($sql, $con);
        
			if($result)
			{
				session_start();
				$EMPLOYEEID1 = $_SESSION['admin'];
				$DATE = date("Y-m-d", time());
				$TIME = date("G:i:s A", time());
				$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
				$row1 = mysql_fetch_array($result1);
				$username = $row1['FULLNAME'];
				$userdep  = $row1['DEPARTMENT'];
				
				mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','New User Account Added','$username','User Accounts','$userdep')");

				echo '<script>alert("New User Accounts Successfuly Added");</script>';
			}
		}
  
    }
}
else if(isset($_POST['reset']))
{
	
}

?>

<?php
	//include('../../javascript/time.js');
	include('../../javascript/letter.js');
	include('../../javascript/numbers.js');
?>