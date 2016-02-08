<?php
    include('../../database/connection.php');
    if(isset($_GET['EMPLOYEEID']))
    {
        $EMPLOYEEID=$_GET['EMPLOYEEID'];
        if(isset($_POST['submit']))
        {
			$address = $_POST['address'];
			$cpnum	 = $_POST['cpnum'];
			$tnum  = $_POST['tnum'];
			$email 	 = $_POST['email'];
			$mstat	= $_POST['mstat'];
			
			
            $query3=mysql_query("update existdb.employees set ADDRESS='$address', CPHONE='$cpnum', TPHONE='$tnum', EMAIL='$email', M_STATUS='$mstat' where EMPLOYEEID='$EMPLOYEEID'");
            
                if($query3)
                {
					echo '<script type="java/javascript">';
					echo 'alert("Record Updated");';
					echo '{';
					header('location:emp_home.php');
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
<div id="emp_profile_content">
    <form action="" method="post">
		<h2><?php echo $query2['LNAME'].", ".$query2['FNAME']." ".$query2['MNAME']; ?></h2>
		<h3><font color="orange"><?php echo $query2['EMPLOYEEID']; ?></font></h3>
        <table border="0px" cellpadding="1px" cellspacing="0px">
            <tr>
                <td><font size="3"><b>Personal Information:</b></font></td>
            </tr>
            <tr>
                <td>Employee Name :</td>
                <td><?php echo $query2['LNAME'].", ".$query2['FNAME']." ".$query2['MNAME']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Gender :</td>
                <td><?php echo $query2['GENDER']; ?></td>
            </tr>
            <tr>
                <td>Birthdate :</td>
                <td><?php echo $query2['BIRTHDATE']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Age :</td>
                <td><?php echo $query2['AGE']; ?></td>
            </tr>
            <tr>
                <td>Nationality :</td>
                <td><?php echo $query2['NATIONALITY']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Marital Status :</td>
                <td>
					<select id="input" name="mstat" required title="Marital Status" autocomplete="off">
							<option value="Single">Single</option>
							<option value="Married">Married</option>
							<option value="Divorced">Divorced</option>
							<option value="Separated">Separated</option>
							<option value="Widowed">Widowed</option>
						</select></td>
            </tr>
            <tr>
                <td>Address :</td>
                <td><input type="text" value="<?php echo $query2['ADDRESS']; ?>" id="input" name="address"></td>
            </tr>
             <tr>
                <td>Cellphone Number :</td>
                <td><input type="text" value="<?php echo $query2['CPHONE']; ?>" id="input" name="cpnum"></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Telephone Number :</td>
                <td><input type="text" value="<?php echo $query2['TPHONE']; ?>" id="input" name="tnum"></td>
            </tr>
              <tr>
                <td>Email :</td>
                <td><input type="text" value="<?php echo $query2['EMAIL']; ?>" id="input" name="email"></td>
            </tr>
               <tr>
                <td>SSS :</td>
                <td><?php echo $query2['SSS']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>PAGIBIG :</td>
                <td><?php echo $query2['PAGIBIG']; ?></td>
            </tr>
                <tr>
                <td>PHILHEALTH :</td>
                <td><?php echo $query2['PHEALTH']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>TIN :</td>
                <td><?php echo $query2['TIN']; ?></td>
            </tr>
            <tr>
                <td><font size="3"><b>Company Information</b></font></td>
            </tr>
             <tr>
                <td>Department :</td>
                <td><?php echo $query2['DEPARTMENT']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Position :</td>
                <td><?php echo $query2['POSITION']; ?></td>
            </tr>
              <tr>
                <td>Status :</td>
                <td><?php echo $query2['STATUS']; ?></td>
            </tr>
			  <tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
				<td><input type="submit" name="submit" value="UPDATE PROFILE" id="btn"></td>
			  </tr>
        </table>
    </form>
    </div>