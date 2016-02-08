<div id="emp_profile_content">
<?php
session_start();
include('../../database/connection.php');
$name = $_SESSION['emp'];

$result = mysql_query("select * from existdb.employees where EMPLOYEEID='$name'");
$row 	= mysql_fetch_array($result);
?>
<h2><?php echo $row['LNAME'].", ".$row['FNAME']." ".$row['MNAME']; ?></h2>
    <h3><font color="orange"><?php echo $row['EMPLOYEEID']; ?></font></h3>
    <form>
        <table border="0px" cellpadding="1px" cellspacing="0px">
            <tr>
                <td><font size="3"><b>Personal Information:</b></font></td>
            </tr>
            <tr>
                <td>Employee Name :</td>
                <td><?php echo $row['LNAME']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Gender :</td>
                <td><?php echo $row['GENDER']; ?></td>
            </tr>
            <tr>
                <td>Birthdate :</td>
                <td><?php echo $row['BIRTHDATE']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Age :</td>
                <td><?php echo $row['AGE']; ?></td>
            </tr>
            <tr>
                <td>Nationality :</td>
                <td><?php echo $row['NATIONALITY']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Marital Status :</td>
                <td><?php echo $row['M_STATUS']; ?></td>
            </tr>
            <tr>
                <td>Address :</td>
                <td><?php echo $row['ADDRESS']; ?></td>
            </tr>
             <tr>
                <td>Cellphone Number :</td>
                <td><?php echo $row['CPHONE']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Telephone Number :</td>
                <td><?php echo $row['TPHONE']; ?></td>
            </tr>
              <tr>
                <td>Email :</td>
                <td><?php echo $row['EMAIL']; ?></td>
            </tr>
               <tr>
                <td>SSS :</td>
                <td><?php echo $row['SSS']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>PAGIBIG :</td>
                <td><?php echo $row['PAGIBIG']; ?></td>
            </tr>
                <tr>
                <td>PHILHEALTH :</td>
                <td><?php echo $row['PHEALTH']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>TIN :</td>
                <td><?php echo $row['TIN']; ?></td>
            </tr>
            <tr>
                <td><font size="3"><b>Company Information</b></font></td>
            </tr>
             <tr>
                <td>Department :</td>
                <td><?php echo $row['DEPARTMENT']; ?></td>
                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                <td>Position :</td>
                <td><?php echo $row['POSITION']; ?></td>
            </tr>
              <tr>
                <td>Status :</td>
                <td><?php echo $row['STATUS']; ?></td>
                <td></td>
                <td>Date Hired :</td>
                <td><?php echo $row['DATE_HIRED']; ?></td>
            </tr>
              <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="emp_editprof.php?EMPLOYEEID=<?php echo $row['EMPLOYEEID']; ?>">Edit Profile</a></td>
              </tr>
        </table>
    </form>
</div>
<?php mysql_close(); ?>