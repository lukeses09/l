<?php
    include('../../database/connection.php');
    if(isset($_GET['ID']))
    {
        $ID=$_GET['ID'];
        if(isset($_POST['submit']))
        {
			$lname = ucwords(ucfirst(strtolower($_POST['lname'])));
			$fname = ucwords(ucfirst(strtolower($_POST['fname'])));
			$mname = ucwords(ucfirst(strtolower($_POST['mname'])));
			$fullname = ucwords(ucfirst(strtolower($_POST['fname'])))." ".ucwords(ucfirst(strtolower($_POST['mname'])))." ".ucwords(ucfirst(strtolower($_POST['lname'])));
			$position = $_POST['position'];
			$department = $_POST['department'];
			$username = $_POST['username'];
			$password = sha1($_POST['password']);
			
            $query3=mysql_query("update existdb.useraccounts set USERNAME='$username', PASSWORD='$password', LNAME='$lname', FNAME='$fname', MNAME='$mname', POSITION='$position', DEPARTMENT='$department', FULLNAME='$fullname' where ID='$ID'");
            
			session_start();
			$EMPLOYEEID1 = $_SESSION['admin'];
			$DATE = date("Y-m-d", time());
			$TIME = date("G:i:s A", time());
			$result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
			$row1 = mysql_fetch_array($result1);
			$username = $row1['FULLNAME'];
			$userdep  = $row1['DEPARTMENT'];
			
			mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','User Accounts Successfully Edited','$username','User Accounts','$userdep')");

			
                if($query3)
                {
					echo '<script type="java/javascript">';
					echo 'alert("Record Updated");';
					echo '{';
					header('location:admin_user_accounts.php');
					echo '}';
					echo '</script>';
					
                }
				else
				{
					echo '<script>alert("invalid");</script>';
				}
        }
		$query1=mysql_query("select * from existdb.useraccounts where ID='$ID'");
		$query2=mysql_fetch_array($query1);
    }
?>
<div id="admin_edituser_content">
    <div id="admin_edituser_content1">
	<form action="" method="post">
        <table border="0" cellpadding="3" cellspacing="3" id="tbl_add_user">
            <tr>
				<td><b>EDIT USER ACCOUNTS</b></td>
                <td id="tdl">
                    <b>Accounts #:</b>
                </td>
                <td id="tdl">
                   <label><b><?php echo $query2['USERID']; ?></b></label>
                </td>
            </tr>
            
            <tr>
				<td></td>
                <td id="tdl">
                    Last Name.
                </td>
                <td id="tdr">
                    <input type="text" name="lname" value="<?php echo $query2['LNAME']; ?>" id="input" onkeydown="return alphaOnly(event);"/>
                </td>
            </tr>
			           <tr>
				<td></td>
                <td id="tdl">
                    First Name.
                </td>
                <td id="tdr">
                    <input type="text" name="fname" value="<?php echo $query2['FNAME']; ?>" id="input" onkeydown="return alphaOnly(event);"/>
                </td>
            </tr>
			<tr>
				<td></td>
                <td id="tdl">
                    Middle Name.
                </td>
                <td id="tdr">
                    <input type="text" name="mname" value="<?php echo $query2['MNAME']; ?>" id="input" onkeydown="return alphaOnly(event);"/>
                </td>
            </tr>
            <tr>
				<td></td>
                <td id="tdl">
                    Position.
                </td>
                <td id="tdr">
					<select name="position" id="input" autocomplete="off" required>
							<option value="Administrator">Administrator</option>
							<option value="Accountant">Accountant</option>
							<option value="Supervisor">Supervisor</option>
							<option value="Human Resource">Human Resource</option>
					</select>
                </td>
            </tr>
            <tr>
				<td></td>
                <td id="tdl">
                    Department:
                </td>
                <td id="tdr">
					<select name="department" id="input" value="<?php echo $query2['DEPARTMENT']; ?>">
						<option value="Human Resource">Human Resource</option>
						<option value="Accounting">Accounting</option>
						<option value="Production">Production</option>
						<option value="Marketing">Marketing</option>
					</select>
                </td>
            </tr>
			
			<tr>
				<td></td>
                <td id="tdl">
                    Username:
                </td>
                <td id="tdr"> 
                    <input type="text" name="username" value="<?php echo $query2['USERNAME']; ?>" id="input" />
                </td>
            </tr>
            <tr>
				<td></td>
                <td id="tdl">
                    Password:
                </td>
                <td id="tdr">
                    <input type="password" name="password" value="" id="input" required/>
                </td>
            </tr>
           
            <tr>
				<td></td>
                <td></td>
                <td id="tdr">
                    <input type="submit" name="submit" value="submit" id="btn" onclick="return confirm('Are you sure you want to update?')"><br>
                    <input type="reset" name="reset" value="reset" id="btn">
                </td>
            </tr>
        </table>
 
    </form>
    </div>
    </div>