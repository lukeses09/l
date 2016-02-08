<?php
include('../../database/connection.php');
if(isset($_GET['EMPLOYEEID']))
{
$EMPLOYEEID =   $_GET['EMPLOYEEID'];
$COUNT      =   $_GET['COUNT'];
$LTYPE =        $_GET['LTYPE'];

    if($LTYPE == "Vacation")
    {
        $sql1 =  mysql_query("update existdb.manual_file_leave set STATUS='APPROVE' where EMPLOYEEID='$EMPLOYEEID'");
        $sql2 = mysql_query("update existdb.emp_num_leave set VACATION=VACATION-'$COUNT' where EMPLOYEEID='$EMPLOYEEID'");
        
        session_start();
        $EMPLOYEEID1 = $_SESSION['hr'];
        $DATE = date("Y-m-d", time());
        $TIME = date("G:i:s A", time());
        $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
        $row1 = mysql_fetch_array($result1);
        $username = $row1['FULLNAME'];
        $userdep  = $row1['DEPARTMENT'];
        
        mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Successfully Deleted','$username','User Accounts','$userdep')");

        if($sql1 and $sql2)
        {
            echo '<script>alert("Deleted Successfuly");';
            echo '{';
            echo header('location:sup_leaves.php');
            echo '}';
            echo '</script>';
        }
    }
    elseif($LTYPE == "Sick")
    {
        $sql3 =  mysql_query("update existdb.manual_file_leave set STATUS='APPROVE' where EMPLOYEEID='$EMPLOYEEID'");
        $sql4 = mysql_query("update existdb.emp_num_leave set SICK=SICK-'$COUNT' where EMPLOYEEID='$EMPLOYEEID'");
    
    	session_start();
        $EMPLOYEEID1 = $_SESSION['hr'];
        $DATE = date("Y-m-d", time());
        $TIME = date("G:i:s A", time());
        $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
        $row1 = mysql_fetch_array($result1);
        $username = $row1['FULLNAME'];
        $userdep  = $row1['DEPARTMENT'];
        
        mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Successfully Deleted','$username','User Accounts','$userdep')");

        if($sql3 and $sql4)
        {
            echo '<script>alert("Deleted Successfuly");';
            echo '{';
            echo header('location:sup_leaves.php');
            echo '}';
            echo '</script>';
        }
    }
    if($LTYPE == "Emergency")
    {
        $sql5 =  mysql_query("update existdb.manual_file_leave set STATUS='APPROVE' where EMPLOYEEID='$EMPLOYEEID'");
        $sql6 = mysql_query("update existdb.emp_num_leave set EMERGENCY=EMERGENCY-'$COUNT' where EMPLOYEEID='$EMPLOYEEID'");
        
    	session_start();
        $EMPLOYEEID1 = $_SESSION['hr'];
        $DATE = date("Y-m-d", time());
        $TIME = date("G:i:s A", time());
        $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
        $row1 = mysql_fetch_array($result1);
        $username = $row1['FULLNAME'];
        $userdep  = $row1['DEPARTMENT'];
        
        mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Successfully Deleted','$username','User Accounts','$userdep')");

        if($sql5 and $sql6)
        {
            echo '<script>alert("Deleted Successfuly");';
            echo '{';
            echo header('location:sup_leaves.php');
            echo '}';
            echo '</script>';
        }
    }
    if($LTYPE == "Maternity")
    {
        $sql7 =  mysql_query("update existdb.manual_file_leave set STATUS='APPROVE' where EMPLOYEEID='$EMPLOYEEID'");
        $sql8 = mysql_query("update existdb.emp_num_leave set MATERNITY=MATERNITY-'$COUNT' where EMPLOYEEID='$EMPLOYEEID'");
    
    	session_start();
        $EMPLOYEEID1 = $_SESSION['hr'];
        $DATE = date("Y-m-d", time());
        $TIME = date("G:i:s A", time());
        $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
        $row1 = mysql_fetch_array($result1);
        $username = $row1['FULLNAME'];
        $userdep  = $row1['DEPARTMENT'];
        
        mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Employee Successfully Deleted','$username','User Accounts','$userdep')");

        if($sql7 and $sql8)
        {
            echo '<script>alert("Deleted Successfuly");';
            echo '{';
            echo header('location:sup_leaves.php');
            echo '}';
            echo '</script>';
        }
    }
    
}
?>