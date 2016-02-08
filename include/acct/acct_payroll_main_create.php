
<?php
    include('../../database/connection.php');
    if(isset($_GET['EMPLOYEEID']))
    {
        $EMPLOYEEID=$_GET['EMPLOYEEID'];
        if(isset($_POST['payroll']))
        {
			if($_POST['eid'] == "")
			{
				echo '<script>alert("Create Payroll Details!");</script>';
			}
			else
			{
				$pp  = $_POST['pperiod'];
				$year = date('Y', time());
				if($pp == "December 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-12-01' AND '$year-12-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$dfrom = $year."-"."12-01";
					$dto = $year."-"."12-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "December 16-31")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-12-16' AND '$year-12-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."12-16";
					$dto = $year."-"."12-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "January 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-01-01' AND '$year-01-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."01-01";
					$dto = $year."-"."01-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "January 16-31")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-01-16' AND '$year-01-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."01-16";
					$dto = $year."-"."01-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "February 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-02-01' AND '$year-02-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."02-01";
					$dto = $year."-"."02-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "February 16-29")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-02-16' AND '$year-02-29'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."02-16";
					$dto = $year."-"."02-29";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "March 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-03-01' AND '$year-03-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."03-01";
					$dto = $year."-"."03-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "March 16-31")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-03-16' AND '$year-03-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."03-16";
					$dto = $year."-"."03-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "April 16-30")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-04-16' AND '$year-04-30'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."04-16";
					$dto = $year."-"."04-30";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "April 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-04-01' AND '$year-04-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."04-01";
					$dto = $year."-"."04-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "May 16-31")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-05-16' AND '$year-05-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."05-16";
					$dto = $year."-"."05-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "May 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-05-01' AND '$year-05-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."05-01";
					$dto = $year."-"."05-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "June 16-30")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-06-16' AND '$year-06-30'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."06-16";
					$dto = $year."-"."06-30";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "June 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-06-01' AND '$year-06-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."06-01";
					$dto = $year."-"."06-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "July 16-31")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-07-16' AND '$year-07-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."07-16";
					$dto = $year."-"."07-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "July 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-07-01' AND '$year-07-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."07-01";
					$dto = $year."-"."07-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "August 16-31")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-08-16' AND '$year-08-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."08-16";
					$dto = $year."-"."08-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "August 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-08-01' AND '$year-08-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."08-01";
					$dto = $year."-"."08-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "September 16-30")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-09-16' AND '$year-09-30'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."09-16";
					$dto = $year."-"."09-30";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "September 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-09-01' AND '$year-09-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."09-01";
					$dto = $year."-"."09-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "October 16-31")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-10-16' AND '$year-10-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."10-16";
					$dto = $year."-"."10-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "October 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-10-01' AND '$year-10-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."10-01";
					$dto = $year."-"."10-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "November 01-15")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-11-01' AND '$year-11-15'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."11-01";
					$dto = $year."-"."11-15";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
				elseif($pp == "November 16-30")
				{
					$result = mysql_query("select * from existdb.dtr where EMPLOYEEID='$EMPLOYEEID' and DTRDATE BETWEEN '$year-11-16' AND '$year-11-31'");
					$count = mysql_num_rows($result);
					
					$eid = $_POST['eid'];
					$name = $_POST['name'];
					$pos  = $_POST['pos'];
					$dep = $_POST['dep'];
					
					$date = date('Y-m-d', time());
					$year = date('Y', time());
					$dfrom = $year."-"."11-16";
					$dto = $year."-"."11-31";
					
					$pperiod 	=	$_POST['pperiod'];
					$cola 	=	$_POST['cola'];
					$bpay 	=	$_POST['bpay'];
					$cutoff = 	$bpay / 2;
					$sss 	=	$_POST['sss'];
					$tax	=	$_POST['tax'];
					$pht 	=	$_POST['pht'];
					$pgb 	=	$_POST['pgb'];
					$daily  =   $_POST['daily'];
					$tar	= "";
					$absent = 11 - $count;
					
					$dt = ((($sss + $tax + $pht + $pgb) / 2) + ($tar + ($absent * $daily)));
					$ded = round($dt, 2);
					$netpay = $cutoff + (($sss + $tax + $pht + $pgb) / 2);
					$gt = $netpay - $ded;
					$gross = round($gt, 2);
					
					$result = mysql_query("SELECT * FROM existdb.payroll_print WHERE EMPLOYEEID='$eid' and PAYROLL='$pp' and YEAR='$year'");
					$count = mysql_num_rows($result);
					
					if($count > 0)
					{
						echo '<script>alert("Payroll Already Exist, Thank You!");</script>';
					}
					else
					{
						$query3=mysql_query("INSERT INTO existdb.payroll_print(PAYROLL,PAYROLL_CREATED,YEAR,DATE_FROM,DATE_TO,EMPLOYEEID,FULLNAME,BASICPAY,CUTOFF,COLA,NET,DED,SSS,PHT,PBG,TAX,GPAY,POS,DEP) VALUES('$pp','$date','$year','$dfrom','$dto','$eid','$name','$bpay','$cutoff','$cola','$netpay','$ded','$sss','$pht','$pgb','$tax','$gross','$pos','$dep')"); 
						if($query3)
						{
								echo '<script type="java/javascript">';
								echo 'alert("Payroll Submitted");';
								echo '{';
								header('location:acct_payroll_main.php');
								echo '}';
								echo '</script>';
								
						}
					}
				}
			}

        }
		elseif(isset($_POST['payroll_details']))
		{
			if($_POST['eid'] != "")
			{
				echo '<script>alert("Payroll Details already created!");</script>';
			}
			else
			{
			$name = $_POST['name'];
			header("location: acct_payroll_create_details.php?EMPLOYEEID=$EMPLOYEEID");
			}

		}
		
		elseif(isset($_POST['payroll_details_edit']))
		{
			if($_POST['eid'] == "")
			{
				echo '<script>alert("No Record to update, Create Payroll Details!");</script>';
			}
			else
			{
			$name = $_POST['name'];
			header("location: acct_payroll_detaiLs_edit.php?EMPLOYEEID=$EMPLOYEEID");
			}

		}
		$query1=mysql_query("select * from existdb.payroll where EMPLOYEEID='$EMPLOYEEID'");
		$query2=mysql_fetch_array($query1);
    }
?>

<?php
	session_start();
	$EMPLOYEEID1 = $_SESSION['acct'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID1'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
	mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Payroll Creation Visited','$username','User Accounts','$userdep')");

?>
<html>
<title>Payroll</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
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
	<div id="wrap_edit">
		<div id="acct_payroll_create_content">
			<form action="" method="post">
				<table id="tbl_create_payroll" cellspacing="0">
					<tr>
						<th>PAYROLL PERIOD:</th>
						<th>PAYROLL YEAR:</th>
					</tr>
					<tr>
						<td>
							<select id="payroll_input1" name="pperiod">
								<option value="January 01-15" <?php if(date('m',time()) == 1 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Jan 01 - 15</option>
								<option value="January 16-31" <?php if(date('m',time()) == 1 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Jan 16 - 31</option>
								<option value="February 01-15" <?php if(date('m',time()) == 2 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Feb 01 - 15</option>
								<option value="February 16-29" <?php if(date('m',time()) == 2 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Feb 16 - 29</option>
								<option value="March 01-15" <?php if(date('m',time()) == 3 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Mar 01 - 15</option>
								<option value="March 16-31" <?php if(date('m',time()) == 3 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Mar 16 - 31</option>
								<option value="April 01-15" <?php if(date('m',time()) == 4 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Apr 01 - 15</option>
								<option value="April 16-30" <?php if(date('m',time()) == 4 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Apr 16 - 30</option>
								<option value="May 01-15" <?php if(date('m',time()) == 5 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>May 01 - 15</option>
								<option value="May 16-31" <?php if(date('m',time()) == 5 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>May 16 - 31</option>
								<option value="June 01-15" <?php if(date('m',time()) == 6 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Jun 01 - 15</option>
								<option value="June 16-30" <?php if(date('m',time()) == 6 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Jun 16 - 30</option>
								<option value="July 01-15" <?php if(date('m',time()) == 7 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Jul 01 - 15</option>
								<option value="July 16-31" <?php if(date('m',time()) == 7 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Jul 16 - 31</option>
								<option value="August 01-15" <?php if(date('m',time()) == 8 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Aug 01 - 15</option>
								<option value="August 16-31" <?php if(date('m',time()) == 8 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Aug 16 - 31</option>
								<option value="September 01-15" <?php if(date('m',time()) == 9 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Sep 01 - 15</option>
								<option value="September 16-30" <?php if(date('m',time()) == 9 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Sep 16 - 30</option>
								<option value="October 01-15" <?php if(date('m',time()) == 10 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Oct 01 - 15</option>
								<option value="October 16-31" <?php if(date('m',time()) == 10 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Oct 16 - 31</option>
								<option value="November 01-15" <?php if(date('m',time()) == 11 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Nov 01 - 15</option>
								<option value="November 16-30" <?php if(date('m',time()) == 11 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Nov 16 - 30</option>
								<option value="December 01-15" <?php if(date('m',time()) == 12 and date('d',time()) <= 15 and date('d',time()) >= 1 ) { echo "selected"; } ?>>Dec 01 - 15</option>
								<option value="December 16-31" <?php if(date('m',time()) == 12 and date('d',time()) <= 31 and date('d',time()) >= 16 ) { echo "selected"; } ?>>Dec 16 - 31</option>
							</select>
						</td>
						<td><input type="text" name="date" id="payroll_input" value="<?php echo date('Y', time()); ?>" readonly></td>
					</tr>
					<tr>
						
						<th>EMPLOYEE NO:</th>
						<th>FULL NAME:</th>
						<th>DEPARTMENT:</th>
						<th>POSITION:</th>

					</tr>
					<tr>
						<td><input type="text" name="eid" value="<?php echo $query2['EMPLOYEEID']; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="name" value="<?php echo $query2['FULLNAME']; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="dep" value="<?php echo $query2['DEP']; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="pos" value="<?php echo $query2['POS']; ?>" id="payroll_input" readonly></td>
					</tr>
				</table>
				
				
				<table id="tbl_create_payroll" cellspacing="0">
					<tr>
						<td><b>SALARY DETAILS:</b></td>
					</tr>
					<tr>
						<th>Basic Pay</th>
						<th>Payroll / Cutoff</th>
						<th>Daily Pay</th>
						<th>Cola</th>
					</tr>
					<tr>
						<td><input type="text" name="bpay" value="<?php echo $query2['BASICPAY']; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name=cutoff" value="<?php echo $query2['BASICPAY'] / 2; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="daily" value="<?php echo abs(round($query2['BASICPAY'] /2) / 11) ; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="cola" value="<?php echo $query2['COLA']; ?>" id="payroll_input" readonly></td>
					</tr>
					<tr>
						<th>Deduction:</th>
					</tr>
					<tr>
						<th>SSS</th>
						<th>PhilHealth</th>
						<th>Pag-ibig</th>
						<th>Tax</th>
					</tr>
					<tr>
						<td><input type="text" name="sss" value="<?php echo $query2['SSS']; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="pht" value="<?php echo $query2['PHT']; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="pgb" value="<?php echo $query2['PGB']; ?>" id="payroll_input" readonly></td>
						<td><input type="text" name="tax" value="<?php echo $query2['TAX']; ?>" id="payroll_input" readonly></td>
					</tr>
					<tr>
						<td></td>
						<td><input type="submit" name="payroll_details_edit" value="Edit Payroll Details" id="btn" onclick='return confirm("are you sure for creating Payroll Details")'></td>
						<td><input type="submit" name="payroll_details" value="Create Payroll Details" id="btn" onclick='return confirm("are you sure for creating Payroll Details")'></td>
						<td><input type="submit" name="payroll" value="Create Payroll" id="btn" onclick='return confirm("are you sure")'></td>
					</tr>
				</table>
			</form>	
		</div>
	</div>
	<?php include('../footer.php'); ?>
</body>
</html>
<?php //include('../../js/time.js'); ?>