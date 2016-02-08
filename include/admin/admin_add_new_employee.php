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
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Add New Employee Visisted','$username','User Accounts','$userdep')");

?>
<html>
<title>Add New Employee</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>	
</header>

<body onload="timer_function()">
<div id="wrapper">
	<?php include('admin_login_as.php');  ?>
	<div id="header"></div>
	<?php include('admin_navigation.php');?>
	<div id="insert_employee">
	<div id="insert_employee_content">
		
		<form enctype='multipart/form-data' action="" method="post">
			<table border="0" cellspacing="0" id="tbl_edit_employee">
				<tr>
					<td id="tdl"><b>PERSONAL INFORMATION :</b></td>
				</tr>
				<tr>
					<td id="tdl">Picture:</td>
					<td id="tdr">
						<input name='filename' type='file' id="upload">
					</td>
				</tr>
				<tr>
					<td id="tdl">Position:</td>
					<td id="tdr">
							<select name="position" id="input" required title="Position Aquired" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['position']; } else { echo ""; } ?>">
								<option value="Accountant">Accountant</option>
								<option value="Accountant Asst.">Accountant Asst.</option>
								<option value="Human Resource Manager">Human Resource Manager</option>
								<option value="Supervisor">Supervisor</option>
								<option value="Team Leader">Team Leader</option>
								<option value="Man Power Analysis">Man Power Analysis</option>
								<option value="Operations Planner">Operations Planner</option>
								<option value="Secretary">Secretary</option>
							</select>
					</td>
					<td id="tdl">Status:</td>
					<td id="tdr">
						<input type="text" name="status" value="Regular" onkeydown="return alphaOnly(event);" id="input" readonly value="<?php if(isset($_POST['add_employee'])) { echo $_POST['status']; } else { echo ""; } ?>"/>
					</td>
					<td id="tdl">Department:</td>
					<td id="tdr">
						<select name="department" id="input" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['department']; } else { echo ""; } ?>">
							<option value="Human Resource">Human Resource</option>
							<option value="Accounting">Accounting</option>
							<option value="Production">Production</option>
							<option value="Marketing">Marketing</option>
						</select>
					</td>
				</tr>
					
				<tr></tr>
				<tr>
					<td id="tdl">Last Name:</td>	
					<td id="tdr"> 
						<input type="text" name="lname"  id="input2" onkeydown="return alphaOnly(event);" required autocomplete="off" title="Last Name Required (Characters Only)" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['lname']; } else { echo ""; } ?>" />
					</td>
					<td id="tdl">First Name:</td>	
					<td id="tdr"> 
						<input type="text" name="fname"  id="input2" autocomplete="off" onkeydown="return alphaOnly(event);" required title="First Name" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['fname']; } else { echo ""; }?>"/>
					</td>
					<td id="tdl">Middle Name:</td>	
					<td id="tdr"> 
						<input type="text" name="mname"  id="input2" autocomplete="off" onkeydown="return alphaOnly(event);" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['mname']; } else { echo ""; }?>"/>
					</td>
				</tr>
				<tr>
					<td id="tdl">Birthdate:</td>
					<td id="tdr">
						<input type="date" name="bdate"  id="input" required title="Birth Date" autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['bdate']; } else { echo ""; }?>"/>
					</td>
					<td id="tdl">Gender:</td>
					<td id="tdr">
						<select id="input" name="gender" required title="Gender" autocomplete="off">
							<option value="Male">Male</option>
							<option value="Female">Female</option>
							</select>
					</td>
					<td id="tdl">Nationality:</td>
					<td id="tdr">
						<input type="text" name="nationality"  id="input" value="Filipino" required title="Nationality" autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['nationality']; } else { echo ""; }?>"/>
					</td>
				</tr>
				<tr>
					<td id="tdl">Address:</td>
					<td id="tdr">
						<input type="text" name="address"  id="input" required title="Address" autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['address']; } else { echo ""; }?>"/>
					</td>
					<td id="tdl">Marital Status:</td>
					<td id="tdr">
						<select id="input" name="m_status" required title="Marital Status" autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['m_status']; }  ?>">
							<option value="Single">Single</option>
							<option value="Married">Married</option>
							<option value="Divorced">Divorced</option>
							<option value="Separated">Separated</option>
							<option value="Widowed">Widowed</option>
						</select>
					</td>
				</tr>
				<tr>
					<td id="tdl">Cell No.:</td>
					<td id="tdr">
						<input type="text" name="cphone" id="input" size="6" min="1" max="99999999999" maxlength="11" required autocomplete="off" onKeyPress="return numbersonly(this, event)" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['cphone']; } else { echo ""; }?>"/>
					</td>
					<td id="tdl">Tel No.:</td>
					<td id="tdr">
						<input type="text" name="tphone" id="input" autocomplete="off" maxlength="7" onKeyPress="return numbersonly(this, event)" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['tphone']; } ?>"/>
					</td>
					<td id="tdl">Email Address:</td>
					<td id="tdr">
						<input type="email" name="email"  id="input" required title="Email Address" autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['email']; } else { echo ""; }?>"/>
					</td>
				</tr>
				<tr>
					<td id="tdl">Emergency Person:</td>
					<td id="tdr">
						<input type="text" name="emername" id="input" onkeydown="return alphaOnly(event);" required title="Name of Contact Person" autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['emername']; } else { echo ""; }?>"/>
					</td>
					<td id="tdl">Emergency No.:</td>
					<td id="tdr">
						<input type="text" name="emernum" id="input" required title="Contact Person's Number" autocomplete="off" maxlength="11"  onKeyPress="return numbersonly(this, event)" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['emernum']; } else { echo ""; }?>"/>
					</td>
				</tr>
				<tr>
					<td id="tdl">Pag-ibig No.:</td>
					<td id="tdr">
						<input type="text" name="pagibig1" id="pagibig" min="0" max="9999" maxlength="4" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['pagibig1']; } else { echo "0000"; }?>"/><b>-</b>
						<input type="text" name="pagibig2" id="pagibig" min="0" max="9999" maxlength="4" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['pagibig2']; } else { echo "0000"; }?>"/><b>-</b>
						<input type="text" name="pagibig3" id="pagibig" min="0" max="9999" maxlength="4" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['pagibig3']; } else { echo "0000"; }?>"/>
					</td>
					<td id="tdl">SSS No.:</td>
					<td id="tdr">
						<input type="text" name="sss1" id="phealth1" min="0" max="99" maxlength="2" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['sss1']; } else { echo "00"; }?>"/><b>-</b>
						<input type="text" name="sss2" id="phealth2" min="0" max="9999999" maxlength="7" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['sss2']; } else { echo "0000000"; }?>"/><b>-</b>
						<input type="text" name="sss3" id="phealth1" min="0" min="0" max="9999" maxlength="4" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['sss3']; } else { echo "0000"; }?>"/>
					</td>
					<td id="tdl">Philhealth No.:</td>
					<td id="tdr">
						<input type="text" name="phealth1" id="phealth1" maxlength='2' min="0" max="99" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['phealth1']; } else { echo "00"; }?>"/><b>-</b>
						<input type="text" name="phealth2" id="phealth2" maxlength='9' min="0" max="999999999" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['phealth2']; } else { echo "000000000"; }?>"/><b>-</b>
						<input type="text" name="phealth3" id="phealth1" maxlength='1' min="0" max="9" onKeyPress="return numbersonly(this, event)" required value="<?php if(isset($_POST['add_employee'])) { echo $_POST['phealth3']; } else { echo "0"; }?>"/>
					</td>
				</tr>
				<tr>
					<td id="tdl">Tin No.:</td>
					<td id="tdr">
						<input type="text" name="tin1" id="tin1" value="000" maxlength='3' min="0" max="999" onKeyPress="return numbersonly(this, event)" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['tin1']; } else { echo "000"; }?>"/><b>-</b>
						<input type="text" name="tin2" id="tin1" value="000" maxlength='3' min="0" max="999" onKeyPress="return numbersonly(this, event)" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['tin2']; } else { echo "000"; }?>"/><b>-</b>
						<input type="text" name="tin3" id="tin1" value="000" maxlength='3' min="0" max="999" onKeyPress="return numbersonly(this, event)" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['tin3']; } else { echo "000"; }?>"/>	
					</td>
				</tr>
				<tr>
					<td><b>EDUCATIONAL BACKGROUND :</b></td>
				</tr>
				<tr>
					<td id="tdl">College</td>
					<td id="tdr"><input type="text" onkeydown="return alphaOnly(event);" name="college" id="input" title="Your College / University" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['college']; } else { echo ""; }?>"></td>
					<td id="tdl" >Address</td>
					<td id="tdr"><input type="text" name="c_add" id="input" title="University / College Address" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['c_add']; } else { echo ""; }?>"></td>
					<td id="tdl">Course</td>
					<td id="tdr"><input type="text" id="input" name="c_course" title="Your Course" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['c_course']; } else { echo ""; }?>"></td>
				</tr>
					
				<tr>
					<td id="tdl">Year Attended</td>
					<td id="tdr"><input type="date" id="input" name="c_ya" title="Year Attended in College" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['c_ya']; } else { echo ""; }?>"></td>
					<td id="tdl" >Year Graduated</td>
					<td id="tdr"><input type="date" id="input" name="c_yg" title="Year Graduated in College" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['c_yg']; } else { echo ""; }?>"></td>
					<td id="tdl">Honor / Others</td>
					<td id="tdr"><input type="text" id="input" name="c_hon" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['c_hon']; } else { echo ""; }?>"></td>
				</tr>
				<tr>
					<td id="tdl">High School</td>
					<td id="tdr"><input type="text" onkeydown="return alphaOnly(event);" id="input" name="highschool" title="Your High School" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['highschool']; } else { echo ""; }?>"></td>
					<td id="tdl" >Address</td>
					<td id="tdr"><input type="text" id="input" name="h_add" title="Your High School Address" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['h_add']; } else { echo ""; }?>"></td>
				</tr>
					
				<tr>
					<td id="tdl">Year Attended</td>
					<td id="tdr"><input type="date" id="input" name="h_ya" title="Year Attended in High School" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['h_ya']; } else { echo ""; }?>"></td>
					<td id="tdl" >Year Graduated</td>
					<td id="tdr"><input type="date" id="input" name="h_yg" title="Year Graduated in High School" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['h_yg']; } else { echo ""; }?>"></td>
					<td id="tdl">Honor / Others</td>
					<td id="tdr"><input type="text" id="input" name="h_hon" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['h_hon']; } else { echo ""; }?>"></td>
				</tr>
					
				<tr>
					<td id="tdl">Elementary</td>
					<td id="tdr"><input type="text" onkeydown="return alphaOnly(event);" id="input" name="elementary" title="Your Elementary School" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['elementary']; } else { echo ""; }?>"></td>
					<td id="tdl" >Address</td>
					<td id="tdr"><input type="text" id="input" name="e_add" title="Your Elementary School Address" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['e_add']; } else { echo ""; }?>"></td>
				</tr>
					
				<tr>
					<td id="tdl">Year Attended</td>
					<td id="tdr"><input type="date" id="input" name="e_ya" title="Year Attended in Elementary" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['e_ya']; } else { echo ""; }?>"></td>
					<td id="tdl" >Year Graduated</td>
					<td id="tdr"><input type="date" id="input" name="e_yg" title="Year Graduated in Elementary" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['e_yg']; } else { echo ""; }?>"></td>
					<td id="tdl">Honor / Others</td>
					<td id="tdr"><input type="text" id="input" name="e_hon" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['e_hon']; } else { echo ""; }?>"></td>
				</tr>
				<tr>
					<td><b>ACCOUNT DETAILS :</b></td>
				</tr>
				<tr>
					<td id="tdl">Username:</td>	
					<td id="tdr"> 
						<input type="text" name="username"  id="input" required autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['username']; } else { echo ""; } ?>" />
					</td>
					<td id="tdl">Password:</td>	
					<td id="tdr"> 
						<input type="password" name="password"  id="input" required autocomplete="off" value="<?php if(isset($_POST['add_employee'])) { echo $_POST['password']; } else { echo ""; }?>"/>
					</td>
				</tr>
				
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td id="tdr">
						<input type="submit" name="add_employee" value="ADD NEW EMPLOYEE" id="btn">
					</td>		
				</tr>
					
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td id="tdr">
						<input type="submit" name="reset" value="RESET" id="btn"><br>
					</td>
				</tr>
				
			</table>
				</br>
				</br>
				</br>
				</br>
			</form>
	</div>
	</div>
	<?php include('../footer.php'); ?>
</div>
</body>
</html>


<?php
if(isset($_POST['add_employee']))
{
	include ('../../database/connection.php');
	$id			=   date('ymdgis');
    $lname		=	ucwords(ucfirst(strtolower($_POST['lname'])));
	$fname		=	ucwords(ucfirst(strtolower($_POST['fname'])));
	$mname		=	ucwords(ucfirst(strtolower($_POST['mname'])));
	$emername	=	ucwords(ucfirst(strtolower($_POST['emername'])));
	
	$bdate		=	$_POST['bdate'];
	$gender		=	ucwords(ucfirst(strtolower($_POST['gender'])));
	$nationality=	ucwords(ucfirst(strtolower($_POST['nationality'])));
	$address	=	$_POST['address'];
	$position	=	ucwords(ucfirst(strtolower($_POST['position'])));
	$cphone		=	$_POST['cphone'];
	$tphone		=	$_POST['tphone'];
	$email		=	$_POST['email'];
	$emernum	=	$_POST['emernum'];
	$status 	= 	ucwords(ucfirst(strtolower($_POST['status'])));
	$m_staus	= 	ucwords(ucfirst(strtolower($_POST['m_status'])));
	$department =   ucwords(ucfirst(strtolower($_POST['department'])));
	
	$pagibig	=	$_POST['pagibig1']."-".$_POST['pagibig2']."-".$_POST['pagibig3'];
	$sss		=	$_POST['sss1']."-".$_POST['sss2']."-".$_POST['sss3'];
	$phealth	=	$_POST['phealth1']."-".$_POST['phealth2']."-".$_POST['phealth3'];
	$tin		=	$_POST['tin1']."-".$_POST['tin2']."-".$_POST['tin3'];
	$age		= 	date("Y-m-d", time()) - $_POST['bdate'];
	$date_hired =  	date("Y-m-d", time());

	
	//College data
	$college 	= 	ucwords(ucfirst(strtolower($_POST['college'])));
	$c_add 		= 	$_POST['c_add'];
	$c_course	=	$_POST['c_course'];
	$c_ya		=	$_POST['c_ya'];
	$c_yg		=	$_POST['c_yg'];
	$c_hon		=	$_POST['c_hon'];
	//High school data
	$highschool=	ucwords(ucfirst(strtolower($_POST['highschool'])));
	$h_add		=	$_POST['h_add'];
	$h_ya		=	$_POST['h_ya'];
	$h_yg		=	$_POST['h_yg'];
	$h_hon		=	$_POST['h_hon'];
	//elementary data
	$elementary	=	ucwords(ucfirst(strtolower($_POST['elementary'])));
	$e_add		=	$_POST['e_add'];
	$e_ya		=	$_POST['e_ya'];
	$e_yg		=	$_POST['e_yg'];
	$e_hon		=	$_POST['e_hon'];
	
	//Account Details
	$username 	= 	$_POST['username'];
	$password	=	sha1($_POST['password']);
	
	if($age >= 18 )
	{
		$result1	=	mysql_query("select * from existdb.employees where LNAME='$lname' and FNAME='$fname'");	
		$count		=	mysql_num_rows($result1);
		if($count > 0)
		{
				echo '<script>alert("Employee have alredy a Record");</script>';
		}
		else
		{

				$filename=$_FILES['filename']['name'];	
				$imgData =addslashes (file_get_contents($_FILES['filename']['tmp_name']));
				$sql = "INSERT INTO existdb.employees (EMPLOYEEID,IMAGE,LNAME,FNAME,MNAME,BIRTHDATE,GENDER,NATIONALITY,ADDRESS,POSITION,CPHONE,TPHONE,EMAIL,EMERNAME,EMERPHONE,SSS,PAGIBIG,PHEALTH,TIN,AGE,M_STATUS,STATUS,DATE_HIRED,COLLEGE,C_ADD,C_COURSE,C_YA,C_YG,C_HON,HIGHSCHOOL,H_ADD,H_YA,H_YG,H_HON,ELEMENTARY,E_ADD,E_YA,E_YG,E_HON,DEPARTMENT,USERNAME,PASSWORD) VALUES('$id','$imgData','$lname','$fname','$mname','$bdate','$gender','$nationality','$address','$position','$cphone','$tphone','$email','$emername','$emernum','$sss','$pagibig','$phealth','$tin','$age','$m_staus','$status','$date_hired','$college','$c_add','$c_course','$c_ya','$c_yg','$c_hon','$highschool','$h_add','$h_ya','$h_yg','$h_hon','$elementary','$e_add','$e_ya','$e_yg','$e_hon','$department','$username','$password'	)";
				$result = mysql_query($sql, $con);
				
				if($result)
				{
					echo '<script>alert("New Employee Records Successfuly Added");</script>';
					//header('location: user_accounts.php');
						session_start();
					$EMPLOYEEID1 = $_SESSION['admin'];
					$DATE = date("Y-m-d", time());
					$TIME = date("G:i:s A", time());
					$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
					$row1 = mysql_fetch_array($result1);
					$username = $row1['FULLNAME'];
					$userdep  = $row1['DEPARTMENT'];
					
					mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','New Employee Successfully Added','$username','User Accounts','$userdep')");

				}
				else
				{
					echo '<script>alert("fff");</script>';
				}

		}  
	}
	else
	{
		echo '<script>alert("Invalid");</script>';
	}
}
else
{
	header('location:admin_add_new_employee.php');
}
?>

<?php /*include('../js/time.js');
include('../js/numbers.js');
include('../js/letter.js'); */?>