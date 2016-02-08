<?php
include('../../database/connection.php');
if(isset($_GET['EMPLOYEEID']))
{
$EMPLOYEEID=$_GET['EMPLOYEEID'];
$ID         = $_GET['ID'];
$LTYPE      = $_GET['LTYPE'];
$COUNT      = $_GET['COUNT'];

$sql = mysql_query("delete from existdb.manual_file_leave where EMPLOYEEID='$EMPLOYEEID' AND ID='$ID' AND L_TYPE='$LTYPE' AND COUNT='$COUNT' ");

	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID1 = $_SESSION['hr'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Leave Successfully Deleted','$username','User Accounts','$userdep')");

if($sql)
    {
        echo '<script>alert("Deleted Successfuly");';
        echo '{';
        echo header('location:sup_leaves.php');
        echo '}';
        echo '</script>';
    }
}
?>