<?php
include('../../database/connection.php');
	session_start();
	$EMPLOYEEID1 = $_SESSION['acct'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Payroll Visited','$username','User Accounts','$userdep')");

?>
<html>
<title>Payroll</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='acct_home.php'>Accountant's Home</a></li>
			<li class='active'><a href='acct_payroll_main.php'>Payroll</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='acct_dtr.php'>Daily Time Record</a></li>
			
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
            <div id="hr_employeerecords_content">
            <form action="" method="post">
            <input type="text" name="nsearch" id="search" autocomplete="off">
            <input type="submit" name="search" value="Search" id="btnsearch">
            <input type="submit" name="back" value="Back" id="btnsearch"><br><br>
                <div id="hr_employeerecords_content_1">
				<?php
                if(isset($_POST['search']))
                {
                    $EMPLOYEENUM = $_POST['nsearch'];
                    if($EMPLOYEENUM != "")
                    {
                        include('../../database/connection.php');
                        $result	=	mysql_query("select * from existdb.employees WHERE EMPLOYEEID like '%$EMPLOYEENUM%' or LNAME like '%$EMPLOYEENUM%' or FNAME like '%$EMPLOYEENUM%' order by DATE_HIRED desc");	
                        $count	=	mysql_num_rows($result);
                        
                        if($count > 0)
                        {
                            echo "<table id='tbl_user' cellspacing='0'>";
                            echo "<th>Employee No.</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Middle Name</th>";
                            echo "<th>Department</th>";					
                            echo "<th>Position</th>";
                            echo "<th>Date Hired</th>";
                            echo "<th>Create Payroll</th>";
                            
                            while($row = mysql_fetch_array($result))
                            {
                                
                                echo "<tr>";
                                echo '<td>'.$row['EMPLOYEEID'].'</td>';
                                echo '<td>'.$row['LNAME'].'</td>';
                                echo '<td>'.$row['FNAME'].'</td>';
                                echo '<td>'.$row['MNAME'].'</td>';
                                echo '<td>'.$row['DEPARTMENT'].'</td>';						
                                echo '<td>'.$row['POSITION'].'</td>';
                                echo '<td>'.$row['DATE_HIRED'].'</td>';
                                echo "<td id='edit'><a href='acct_payroll_main_create.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Create Payroll</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else
                        {
                            echo "<table id='tbl_user' cellspacing='0'>";
                            echo "<th>Employee No.</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Middle Name</th>";
                            echo "<th>Department</th>";					
                            echo "<th>Position</th>";
                            echo "<th>Date Hired</th>";
                            echo "<th>Create Payroll</th>";
                            
                            echo "<tr>";
                            echo '<td id="no_records">NO RECORDS</td>';
                            echo "</tr>";
                        }
                    }
                    else
                    {
                        include('../../database/connection.php');
                        $result	=	mysql_query("select * from existdb.employees order by DATE_HIRED desc");	
                        $count	=	mysql_num_rows($result);
                        
                        if($count > 0)
                        {
                            echo "<table id='tbl_user' cellspacing='0'>";
                            echo "<th>Employee No.</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Middle Name</th>";
                            echo "<th>Department</th>";					
                            echo "<th>Position</th>";
                            echo "<th>Date Hired</th>";
                            echo "<th>Create Payroll</th>";
                            
                            while($row = mysql_fetch_array($result))
                            {
                                
                                echo "<tr>";
                                echo '<td>'.$row['EMPLOYEEID'].'</td>';
                                echo '<td>'.$row['LNAME'].'</td>';
                                echo '<td>'.$row['FNAME'].'</td>';
                                echo '<td>'.$row['MNAME'].'</td>';
                                echo '<td>'.$row['DEPARTMENT'].'</td>';						
                                echo '<td>'.$row['POSITION'].'</td>';
                                echo '<td>'.$row['DATE_HIRED'].'</td>';
                                echo "<td id='edit'><a href='acct_payroll_main_create.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Create Payroll</a></td>";
                                echo "</tr>";
                            }
                            echo "</table>";
                        }
                        else
                        {
                            echo "<table id='tbl_user' cellspacing='0'>";
                            echo "<th>Employee No.</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Middle Name</th>";
                            echo "<th>Department</th>";					
                            echo "<th>Position</th>";
                            echo "<th>Date Hired</th>";
                            echo "<th>Create Payroll</th>";
                            
                            echo "<tr>";
                            echo '<td id="no_records">NO RECORDS</td>';
                            echo "</tr>";
                        }
                        
                        
                    }
                    
                }
                elseif(isset($_POST['back']))
                {
                    include('../../database/connection.php');
                    $result	=	mysql_query("select * from existdb.employees order by DATE_HIRED desc");	
                    $count	=	mysql_num_rows($result);
                    
                    if($count > 0)
                    {
                            echo "<table id='tbl_user' cellspacing='0'>";
                            echo "<th>Employee No.</th>";
                            echo "<th>Last Name</th>";
                            echo "<th>First Name</th>";
                            echo "<th>Middle Name</th>";
                            echo "<th>Department</th>";					
                            echo "<th>Position</th>";
                            echo "<th>Date Hired</th>";
                            echo "<th>Create Payroll</th>";
                        
                        while($row = mysql_fetch_array($result))
                        {
                                echo "<tr>";
                                echo '<td>'.$row['EMPLOYEEID'].'</td>';
                                echo '<td>'.$row['LNAME'].'</td>';
                                echo '<td>'.$row['FNAME'].'</td>';
                                echo '<td>'.$row['MNAME'].'</td>';
                                echo '<td>'.$row['DEPARTMENT'].'</td>';						
                                echo '<td>'.$row['POSITION'].'</td>';
                                echo '<td>'.$row['DATE_HIRED'].'</td>';
                                echo "<td id='edit'><a href='acct_payroll_main_create.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Create Payroll</a></td>";
                                echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else
                    {
                        echo "<table id='tbl_user' cellspacing='0'>";
                        echo "<th>Employee No.</th>";
                        echo "<th>Last Name</th>";
                        echo "<th>First Name</th>";
                        echo "<th>Middle Name</th>";
                        echo "<th>Department</th>";					
                        echo "<th>Position</th>";
                        echo "<th>Date Hired</th>";
                        echo "<th>Create Payroll</th>";
                        
                        echo "<tr>";
                        echo '<td id="no_records">NO RECORDS</td>';
                        echo "</tr>";
                    }	
                }
                else
                {
                    include('../../database/connection.php');
                    $result	=	mysql_query("select * from existdb.employees order by DATE_HIRED desc");	
                    $count	=	mysql_num_rows($result);
                    
                    if ($count > 0)
                    {
                        echo "<table id='tbl_user' cellspacing='0'>";
                        echo "<th>Employee No.</th>";
                        echo "<th>Last Name</th>";
                        echo "<th>First Name</th>";
                        echo "<th>Middle Name</th>";
                        echo "<th>Department</th>";					
                        echo "<th>Position</th>";
                        echo "<th>Date Hired</th>";
                        echo "<th>Create Payroll</th>";
                        
                        while($row = mysql_fetch_array($result))
                        {
                            echo "<tr>";
                            echo '<td>'.$row['EMPLOYEEID'].'</td>';
                            echo '<td>'.$row['LNAME'].'</td>';
                            echo '<td>'.$row['FNAME'].'</td>';
                            echo '<td>'.$row['MNAME'].'</td>';
                            echo '<td>'.$row['DEPARTMENT'].'</td>';						
                            echo '<td>'.$row['POSITION'].'</td>';
                            echo '<td>'.$row['DATE_HIRED'].'</td>';
                            echo "<td id='edit'><a href='acct_payroll_main_create.php?EMPLOYEEID=".$row['EMPLOYEEID']."' id='edit'>Create Payroll</a></td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
                    else
                    {
                        echo "<table id='tbl_user' cellspacing='0'>";
                        echo "<th>Employee No.</th>";
                        echo "<th>Last Name</th>";
                        echo "<th>First Name</th>";
                        echo "<th>Middle Name</th>";
                        echo "<th>Department</th>";					
                        echo "<th>Position</th>";
                        echo "<th>Date Hired</th>";
                        echo "<th>Create Payroll</th>";
                        
                        echo "<tr>";
                        echo '<td id="no_records">NO RECORDS</td>';
                        echo "</tr>";
                    }
                }	
                ?>
            </form>
				</div>
        </div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>