<?php
include('../../database/connection.php');
if(isset($_GET['EMPLOYEEID']))
{
$EMPLOYEEID=$_GET['EMPLOYEEID'];
$sql = mysql_query("delete from existdb.employees where EMPLOYEEID='$EMPLOYEEID'");

if($sql)
    {
        echo '<script>alert("Deleted Successfuly");';
        echo '{';
        echo header('location:admin_employee_records.php');
        echo '}';
        echo '</script>';
        
        session_start();
        $EMPLOYEEID1 = $_SESSION['admin'];
        $DATE = date("Y-m-d", time());
        $TIME = date("G:i:s A", time());
        $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
        $row1 = mysql_fetch_array($result1);
        $username = $row1['FULLNAME'];
        $userdep  = $row1['DEPARTMENT'];
        
        mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Successfully Deleted','$username','User Accounts','$userdep')");

    }
}
?>