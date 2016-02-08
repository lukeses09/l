
<?php
    include('../../database/connection.php');
    if(isset($_GET['EMPLOYEEID']))
    {
        $EMPLOYEEID=$_GET['EMPLOYEEID'];
        if(isset($_POST['submit']))
        {
            $lname=$_POST['lname'];
            $fname=$_POST['fname'];
			$mname=$_POST['mname'];
			
			if($mname = "")
			{
				$fullname = $fname." ".$lname;
			}
			else
			{
				$fullname = $fname." ".$mname." ".$lname;
			}
			
			$bdate=$_POST['bdate'];
			$gender=$_POST['gender'];
			$nationality=$_POST['nationality'];
			$address=$_POST['address'];
			$position=$_POST['position'];
			$cphone=$_POST['cphone'];
			$tphone=$_POST['tphone'];
			$email=$_POST['email'];
			$emername=$_POST['emername'];
			$emernum=$_POST['emernum'];
			$position = $_POST['position'];
			$department=$_POST['department'];
			$m_status=$_POST['m_status'];

            $query3=mysql_query("update existdb.employees set M_STATUS='$m_status',LNAME='$lname',FNAME='$fname',MNAME='$mname',FULLNAME='$fullname',BIRTHDATE='$bdate',GENDER='$gender',NATIONALITY='$nationality',ADDRESS='$address',POSITION='$position',CPHONE='$cphone',TPHONE='$tphone',EMAIL='$email',EMERNAME='$emername',EMERPHONE='$emernum',DEPARTMENT='$department',POSITION='$position' WHERE EMPLOYEEID='$EMPLOYEEID'");

		session_start();
		$EMPLOYEEID1 = $_SESSION['hr'];
		$DATE = date("Y-m-d", time());
		$TIME = date("G:i:s A", time());
		$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
		$row1 = mysql_fetch_array($result1);
		$username = $row1['FULLNAME'];
		$userdep  = $row1['DEPARTMENT'];
		
		mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Payroll History Visited','$username','Employee Accounts','$userdep')");

                if($query3)
                {
					echo '<script type="java/javascript">';
					echo 'alert("Record Updated");';
					echo '{';
					header('location:hr_employee_records.php');
					echo '}';
					echo '</script>';
					
                }
				else
				{
					echo '<script>alert("invalid");</script>';
				}
        }
		$query1=mysql_query("select * from existdb.employees where EMPLOYEEID='$EMPLOYEEID'");
		$query2=mysql_fetch_array($query1);
    }
?>
    <div id="hr_editemployee_content">
	<form action="" method="post">
        <table cellpadding="2" cellspacing="0" id="tbl_employee">
			<tr>
				<td id="tdl">Picture:</td>
				<td id="tdr">
					<input name='filename' type='file' id="input2" value="$query2['IMAGE'];">
				</td>
			</tr>
		
            <tr>
                <td id="tdl">
                    Accounts ID:
                </td>
                <td id="tdl">
                    <label id="input"><b><?php echo $query2['EMPLOYEEID']; ?></b></label>
                </td>
				
				<td id="tdl">
                    Employee Status:
                </td>
                <td id="tdl">
					<label id="input"><b><?php echo $query2['STATUS']; ?></b></label>
                </td>
				
				<td id="tdl">
                    Position:
                </td>
                <td id="tdr">
                    <input type="text" name="position" value="<?php echo $query2['POSITION']; ?>" id="input"/>
                </td>
            </tr>
			
			<tr>
				<td id="tdl">
                    Department:
                </td>
                <td id="tdr">
                    <input type="text" name="department" value="<?php echo $query2['DEPARTMENT']; ?>" id="input"/>
                </td>
			</tr>
			
            <tr>
                <td id="tdl">
                    Last Name:
                </td>	
                <td id="tdr"> 
                    <input type="text" name="lname" value="<?php echo $query2['LNAME']; ?>" id="input" required autocomplete="off"/>
                </td>
				<td id="tdl">
                    First Name:
                </td>	
                <td id="tdr"> 
                    <input type="text" name="fname" value="<?php echo $query2['FNAME']; ?>" id="input" required autocomplete="off"/>
                </td>
				<td id="tdl">
                    Middle Name:
                </td>	
                <td id="tdr"> 
                    <input type="text" name="mname" value="<?php echo $query2['MNAME']; ?>" id="input" required autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <td id="tdl">
                    Birthdate:
                </td>
                <td id="tdr">
                    <input type="date" name="bdate" value="<?php echo $query2['BIRTHDATE']; ?>" id="input" required autocomplete="off"/>
                </td>
				<td id="tdl">
                    Gender:
                </td>
                <td id="tdr" >
                    <select id="input" name="gender" value="<?php echo $query2['GENDER']; ?>" required autocomplete="off"/>
						<option value="Male">Male</option>
						<option value="Female">Female</option>
					</select>
                </td>
				<td id="tdl">
                    Nationality:
                </td>
                <td id="tdr">
                    <input type="text" name="nationality" value="<?php echo $query2['NATIONALITY']; ?>" id="input" required autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <td id="tdl">
                    Address:
                </td>
                <td id="tdr">
                    <input type="text" name="address" value="<?php echo $query2['ADDRESS']; ?>" id="input" required autocomplete="off"/>
                </td>
				<td id="tdl">
                    Marital Status:
                </td>
                <td id="tdr" >
					<select id="input" name="m_status" value="<?php echo $query2['M_STATUS']; ?>" autocomplete="off">
						<option value="Single">Single</option>
						<option value="Married">Married</option>
						<option value="Divorced">Divorced</option>
						<option value="Separated">Separated</option>
						<option value="Widowed">Widowed</option>
					</select>
                </td>
            </tr>
            <tr>
                <td id="tdl">
                    Cell No.:
                </td>
                <td id="tdr">
                    <input type="text" name="cphone" value="<?php echo $query2['CPHONE']; ?>" id="input" required autocomplete="off"/>
                </td>
				<td id="tdl">
                    Tel No.:
                </td>
                <td id="tdr">
                    <input type="text" name="tphone" value="<?php echo $query2['TPHONE']; ?>" id="input" required autocomplete="off"/>
                </td>
				<td id="tdl">
                    Email Address:
                </td>
                <td id="tdr">
                    <input type="email" name="email" value="<?php echo $query2['EMAIL']; ?>" id="input" required autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <td id="tdl">
                    Emergency Person:
                </td>
                <td id="tdr">
                    <input type="text" name="emername" value="<?php echo $query2['EMERNAME']; ?>" id="input" required autocomplete="off"/>
                </td>
				<td id="tdl">
                    Emergency No.:
                </td>
                <td id="tdr">
                    <input type="text" name="emernum" value="<?php echo $query2['EMERPHONE']; ?>" id="input" required autocomplete="off"/>
                </td>
            </tr>
            <tr>
                <td>
                
                </td>
				 <td>
                
                </td>
				 <td>
                
                </td>
				 <td>
                
                </td>
				 <td>
                
                </td>
                <td id="tdr">
                    <input type="submit" name="submit" value="UPDATE EMPLOYEE RECORD" id="btn">
                    
                </td>
            </tr>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td id="tdr"><input type="reset" name="reset" value="RESET" id="btn"></td>
			</tr>
        </table>
 
    </form>
	</div>
</body>
</html>
<?php include('../../javascript/letter.js'); 
include('../../javascript/numbers.js'); 
?>