<?php
	date_default_timezone_set('Asia/Manila');
    include('database/connection.php');
	if(isset($_POST['submit']))
	{
		$USERNAME = $_POST['username'];
		$PASSWORD = sha1($_POST['password']);
		$DATE = date("Y-m-d", time());
		$TIME = date("G:i:s A", time());
		
		$result	=	mysql_query("select * from existdb.useraccounts where USERNAME='$USERNAME' and PASSWORD='$PASSWORD'");	
		$count	=	mysql_num_rows($result);
		$row	=	mysql_fetch_array($result);
		$position = $row['POSITION'];
		$name = $row['FULLNAME'];
		$dep = $row['DEPARTMENT'];
		
		if($count > 0)
		{
			if($USERNAME === $row['USERNAME'] AND $PASSWORD === $row['PASSWORD'])
			{
				if($position == "Administrator")
				{
					session_start();
					$_SESSION['admin'] = $row['USERID'];
					mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Login','$name','User Accounts','$dep')");
					header('location:include/admin/admin_home.php');
				}
				elseif($position == "Accountant")
				{
					session_start();
					$_SESSION['acct'] = $row['USERID'];
					mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Login','$name','User Accounts','$dep')");
					header('location:include/acct/acct_home.php');
				}
				elseif($position == "Supervisor")
				{
					session_start();
					$_SESSION['sup'] = $row['USERID'];
					mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Login','$name','User Accounts','$dep')");
					header("location:include/sup/sup_home.php");
				}
				elseif($position == "Human Resource")
				{
					session_start();
					$_SESSION['hr'] = $row['USERID'];
					mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Login','$name','User Accounts','$dep')");
					header('location:include/hr/hr_home.php');
				}
			}
			else
			{
				echo '<script>alert("Check your input");</script>';
			}
		}
		else
		{
			$result	=	mysql_query("select * from existdb.employees where USERNAME='$USERNAME' and PASSWORD='$PASSWORD'");	
			$count	=	mysql_num_rows($result);
			$row	=	mysql_fetch_array($result);
			$empname = $row['FNAME']." ".$row['MNAME']." ".$row['LNAME'];
			$depa = $row['DEPARTMENT'];
			
				if($count > 0)
				{
					if($USERNAME === $row['USERNAME'] AND $PASSWORD === $row['PASSWORD'])
					{
						session_start();
						$_SESSION['emp']=$row['EMPLOYEEID'];
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Login','$empname','Employee Accounts','$depa')");
						header('location:include/emp/emp_home.php');
					}
					else
					{
						echo '<script>alert("Check your input");</script>';
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Check Input','$empname','Employee Accounts','$depa')");
					}
				}
		}

	}
?>