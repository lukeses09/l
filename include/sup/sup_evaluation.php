<html>
<head>
<title>Employee Evaluation</title>
<link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>
<body>
<form enctype='multipart/form-data' action="" method="post">
    <?php
	include('../../database/connection.php');
	session_start();
	$EMPLOYEEID = $_SESSION['sup'];
    $DATE = date("Y-m-d", time());
    $TIME = date("G:i:s A", time());
    $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID'");
	$row1 = mysql_fetch_array($result1);
	$username = $row1['FULLNAME'];
	$userdep  = $row1['DEPARTMENT'];
	
    if (isset($_POST['submit']))
	{
		$year = $_POST['year'];
		$evaldate = date("Y-m-d", time());
		$comment = $_POST['comment'];
		$ename = $_POST['ename'];
		$result = mysql_query("select * from existdb.employees where FULLNAME LIKE '%$ename%'");
		$count = mysql_num_rows($result);
		$row = mysql_fetch_array($result);
		$enum = $row['EMPLOYEEID'];
		$appname = $_POST['appname'];
		
		if($count > 0)
		{

				if(empty($_POST['check']))
				{
						if($_POST['evtype'] == "Midyear")
						{
								if($_POST['evrange'] == "January 1 - December 31")
								{
										echo '<script>alert("Invalid Date Range");</script>';
										mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Invalid Date Range Inserted','$username','Supervisor User Accounts','$userdep')");
						
								}
								else
								{
										$evtype = "Midyear";
										if($_POST['evrange'] == "January 1 - June 30")
										{
												$evrangefrom = $year."-01-01";
												$evrangeto = $year."-06-30";
												$evrange = $_POST['evrange'];
										}
										elseif($_POST['evrange'] == "July 1 - December 31")
										{
												$evrangefrom = $year."-07-01";
												$evrangeto = $year."-12-31";
												$evrange = $_POST['evrange'];
										}
								}
						}
						elseif($_POST['evtype'] == "Annual")
						{
								$evtype = "Annual";
								if($_POST['evrange'] == "January 1 - June 30" || $_POST['evrange'] == "July 1 - December 31")
								{
										$evrangefrom = $year."-01-01";
										$evrangeto = $year."-12-31";
										$evrange = "January 1 - December 31";
								}
								elseif($_POST['evrange'] == "January 1 - December 31" )
								{
										$evrangefrom = $year."-01-01";
										$evrangeto = $year."-12-31";
										$evrange = "January 1 - December 31";
								}
						}
						
						$a1 = $_POST['a1'];
						$a2 = $_POST['a2'];
						$a3 = $_POST['a3'];
						$at = ($a1 + $a2 + $a3) / 3;
						$a4 = round($at, 2);
						
						$b1 = $_POST['b1'];
						$b2 = $_POST['b2'];
						$b3 = $_POST['b3'];
						$b4 = $_POST['b4'];
						$bt = ($b1 + $b2 + $b3 + $b4) / 4;
						$b5 = round($bt, 2);
						
						$c1 = $_POST['c1'];
						$c2 = $_POST['c2'];
						$c3 = $_POST['c3'];
						$c4 = $_POST['c4'];
						$c5 = $_POST['c5'];
						$c6 = $_POST['c6'];
						$c7 = $_POST['c7'];
						$c8 = $_POST['c8'];
						$ct = ($c1 + $c2 + $c3 + $c4 + $c5 + $c6 + $c7 + $c8) / 8;
						$c9 = round($ct, 2);
						
						$d1 = $_POST['d1'];
						$d2 = $_POST['d2'];
						$d3 = $_POST['d3'];
						$d4 = $_POST['d4'];
						$d5 = $_POST['d5'];
						$dt = ($d1 + $d2 + $d3 + $d4 + $d5) / 5;
						$d6 = round($dt, 2);
						$d7 = $_POST['d7'];
						
						$e1 = $_POST['e1'];
						$e2 = $_POST['e2'];
						$e3 = $_POST['e3'];
						$e4 = $_POST['e4'];
						$et = ($e1 + $e2 + $e3 + $e4) / 4;
						$e5 = round($et, 2);
						$e6 = $_POST['e6'];
						
						$f1 = $_POST['f1'];
						$f2 = $_POST['f2'];
						$f3 = $_POST['f3'];
						$ft = ($f1 + $f2 + $f3) / 3;
						$f4 = round($ft, 2);
						
						$g1 = $_POST['g1'];
						$g2 = $_POST['g2'];
						$g3 = $_POST['g3'];
						$g4 = $_POST['g4'];
						$g5 = $_POST['g5'];
						$g6 = $_POST['g6'];
						$gt = ($g1 + $g2 + $g3 + $g4 + $g5 + $g6) / 6;
						$g7 = round($gt, 2);
						
						$h1 = $_POST['h1'];
						$h2 = $_POST['h2'];
						$h3 = $_POST['h3'];
						$h4 = $_POST['h4'];
						$ht = ($h1 + $h2 + $h3 + $h4) / 4;
						$h5 = round($ht, 2);
						
						$i1 = $_POST['i1'];
						$i2 = $_POST['i2'];
						$i3 = $_POST['i3'];
						$i4 = $_POST['i4'];
						$i5 = $_POST['i5'];
						$it = ($i1 + $i2 + $i3 + $i4 + $i5) / 5;
						$i6 = round($it, 2);
						
						$k1 = $_POST['k1'];
						$k2 = $_POST['k2'];
						$k3 = $_POST['k3'];
						$k4= $_POST['k4'];
						$k5 = $_POST['k5'];
						$k6 = $_POST['k6'];
						
						$l1 = $_POST['l1'];
						$l2 = $_POST['l2'];
						$l3 = $_POST['l3'];
						$l4 = $_POST['l4'];
						$l5 = $_POST['l5'];
						$l6 = $_POST['l6'];
						$l7 = $_POST['l7'];
						
						$m1 = $_POST['m1'];
						$m2 = $_POST['m2'];
						
						$n1 = $_POST['n1'];
						$n2 = $_POST['n2'];
						$n3 = $_POST['n3'];
						$n4 = $_POST['n4'];
						$n5 = $_POST['n5'];
						$n6 = $_POST['n6'];
						$n7 = $_POST['n7'];
						$n8 = $_POST['n8'];
						
						$ot = ($a4 + $b5 + $c9 + $d6 + $e5 + $f4 + $g7 + $h5 + $i6) / 9 ;
						$o1 = round($ot, 2);
						$appname = $_POST['appname'];
						$apppos = $_POST['apppos'];
						
						$sql = mysql_query("Insert into existdb.evaluation(EVALDATE,EMPLOYEEID,FULLNAME,APPNAME,APPPOS,EV_TYPE,EVRANGE,EVFROM,EVTO,YEAR,COMMENTS,
										   A1,A2,A3,A4,
										   B1,B2,B3,B4,B5,
										   C1,C2,C3,C4,C5,C6,C7,C8,C9,
										   D1,D2,D3,D4,D5,D6,D7,
										   E1,E2,E3,E4,E5,E6,
										   F1,F2,F3,F4,
										   G1,G2,G3,G4,G5,G6,G7,
										   H1,H2,H3,H4,H5,
										   I1,I2,I3,I4,I5,I6,
										   O1
										   )
										   VALUES('$evaldate','$enum','$ename','$appname','$apppos','$evtype','$evrange','$evrangefrom','$evrangeto','$year','$comment',
										   '$a1','$a2','$a3','$a4',
										   '$b1','$b2','$b3','$b4','$b5',
										   '$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9',
										   '$d1','$d2','$d3','$d4','$d5','$d6','$d7',
										   '$e1','$e2','$e3','$e4','$e5','$e6',
										   '$f1','$f2','$f3','$f4',
										   '$g1','$g2','$g3','$g4','$g5','$g6','$g7',
										   '$h1','$h2','$h3','$h4','$h5',
										   '$i1','$i2','$i3','$i4','$i5','$i6',
										   '$o1'
										   )");
						
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Evaluation Posted for regular Employee','$username','Supervisor User Accounts','$userdep')");
						if($sql)
						{
								echo '<script>alert("Evaluation Submitted");</script>';
						}						
				}
				else
				{
						if($_POST['evtype'] == "Midyear")
						{
								if($_POST['evrange'] == "January 1 - December 31")
								{
										echo '<script>alert("Invalid Date Range");</script>';
										mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Invalid Date Range Inserted','$username','Supervisor User Accounts','$userdep')");
								}
								else
								{
										$evtype = "Midyear";
										if($_POST['evrange'] == "January 1 - June 30")
										{
												$evrangefrom = $year."-01-01";
												$evrangeto = $year."-06-30";
												$evrange = $_POST['evrange'];
										}
										elseif($_POST['evrange'] == "July 1 - December 31")
										{
												$evrangefrom = $year."-07-01";
												$evrangeto = $year."-12-31";
												$evrange = $_POST['evrange'];
										}
								}
						}
						elseif($_POST['evtype'] == "Annual")
						{
								$evtype = "Annual";
								if($_POST['evrange'] == "January 1 - June 30" || $_POST['evrange'] == "July 1 - December 31")
								{
										$evrangefrom = $year."-01-01";
										$evrangeto = $year."-12-31";
										$evrange = "January 1 - December 31";
								}
								elseif($_POST['evrange'] == "January 1 - December 31" )
								{
										$evrangefrom = $year."-01-01";
										$evrangeto = $year."-12-31";
										$evrange = "January 1 - December 31";
								}
						}
						
						$a1 = $_POST['a1'];
						$a2 = $_POST['a2'];
						$a3 = $_POST['a3'];
						$at = ($a1 + $a2 + $a3) / 3;
						$a4 = round($at, 2);
						
						$b1 = $_POST['b1'];
						$b2 = $_POST['b2'];
						$b3 = $_POST['b3'];
						$b4 = $_POST['b4'];
						$bt = ($b1 + $b2 + $b3 + $b4) / 4;
						$b5 = round($bt, 2);
						
						$c1 = $_POST['c1'];
						$c2 = $_POST['c2'];
						$c3 = $_POST['c3'];
						$c4 = $_POST['c4'];
						$c5 = $_POST['c5'];
						$c6 = $_POST['c6'];
						$c7 = $_POST['c7'];
						$c8 = $_POST['c8'];
						$ct = ($c1 + $c2 + $c3 + $c4 + $c5 + $c6 + $c7 + $c8) / 8;
						$c9 = round($ct, 2);
						
						$d1 = $_POST['d1'];
						$d2 = $_POST['d2'];
						$d3 = $_POST['d3'];
						$d4 = $_POST['d4'];
						$d5 = $_POST['d5'];
						$dt = ($d1 + $d2 + $d3 + $d4 + $d5) / 5;
						$d6 = round($dt, 2);
						$d7 = $_POST['d7'];
						
						$e1 = $_POST['e1'];
						$e2 = $_POST['e2'];
						$e3 = $_POST['e3'];
						$e4 = $_POST['e4'];
						$et = ($e1 + $e2 + $e3 + $e4) / 4;
						$e5 = round($et, 2);
						$e6 = $_POST['e6'];
						
						$f1 = $_POST['f1'];
						$f2 = $_POST['f2'];
						$f3 = $_POST['f3'];
						$ft = ($f1 + $f2 + $f3) / 3;
						$f4 = round($ft, 2);
						
						$g1 = $_POST['g1'];
						$g2 = $_POST['g2'];
						$g3 = $_POST['g3'];
						$g4 = $_POST['g4'];
						$g5 = $_POST['g5'];
						$g6 = $_POST['g6'];
						$gt = ($g1 + $g2 + $g3 + $g4 + $g5 + $g6) / 6;
						$g7 = round($gt, 2);
						
						$h1 = $_POST['h1'];
						$h2 = $_POST['h2'];
						$h3 = $_POST['h3'];
						$h4 = $_POST['h4'];
						$ht = ($h1 + $h2 + $h3 + $h4) / 4;
						$h5 = round($ht, 2);
						
						$i1 = $_POST['i1'];
						$i2 = $_POST['i2'];
						$i3 = $_POST['i3'];
						$i4 = $_POST['i4'];
						$i5 = $_POST['i5'];
						$it = ($i1 + $i2 + $i3 + $i4 + $i5) / 5;
						$i6 = round($it, 2);
						
						$k1 = $_POST['k1'];
						$k2 = $_POST['k2'];
						$k3 = $_POST['k3'];
						$k4= $_POST['k4'];
						$k5 = $_POST['k5'];
						$k6 = $_POST['k6'];
						$kt = ($k1 + $k2 + $k3 + $k4 + $k5 + $k6) / 6;
						
						$l1 = $_POST['l1'];
						$l2 = $_POST['l2'];
						$l3 = $_POST['l3'];
						$l4 = $_POST['l4'];
						$l5 = $_POST['l5'];
						$l6 = $_POST['l6'];
						$l7 = $_POST['l7'];
						$lt = ($l1 + $l2 + $l3 + $l4 + $l5 + $l6 + $l7) / 7;
						
						$m1 = $_POST['m1'];
						$m2 = $_POST['m2'];
						$mt = ($m1 + $m2) / 2;
						
						$n1 = $_POST['n1'];
						$n2 = $_POST['n2'];
						$n3 = $_POST['n3'];
						$n4 = $_POST['n4'];
						$n5 = $_POST['n5'];
						$n6 = $_POST['n6'];
						$n7 = $_POST['n7'];
						$n8 = $_POST['n8'];
						$nt = ($n1 + $n2 + $n3 + $n4 + $n5 + $n6 + $n7 + $n8) / 8;
						
						$o1 = ($a4 + $b5 + $c9 + $d6 + $e5 + $f4 + $g7 + $h5 + $i6 + $kt + $lt + $mt + $nt) / 13 ;
						
						$appname = $_POST['appname'];
						$apppos = $_POST['apppos'];
						
						$sql = mysql_query("Insert into existdb.evaluation(EVALDATE,EMPLOYEEID,FULLNAME,APPNAME,APPPOS,EV_TYPE,EVRANGE,EVFROM,EVTO,YEAR,COMMENTS,
										   A1,A2,A3,A4,
										   B1,B2,B3,B4,B5,
										   C1,C2,C3,C4,C5,C6,C7,C8,C9,
										   D1,D2,D3,D4,D5,D6,D7,
										   E1,E2,E3,E4,E5,E6,
										   F1,F2,F3,F4,
										   G1,G2,G3,G4,G5,G6,G7,
										   H1,H2,H3,H4,H5,
										   I1,I2,I3,I4,I5,I6,
										   K1,K2,K3,K4,K5,K6,
										   L1,L2,L3,L4,L5,L6,L7,
										   M1,M2,
										   N1,N2,N3,N4,N5,N6,N7,N8,
										   O1
										   )
										   VALUES('$evaldate','$enum','$ename','$appname','$apppos','$evtype','$evrange','$evrangefrom','$evrangeto','$year','$comment',
										   '$a1','$a2','$a3','$a4',
										   '$b1','$b2','$b3','$b4','$b5',
										   '$c1','$c2','$c3','$c4','$c5','$c6','$c7','$c8','$c9',
										   '$d1','$d2','$d3','$d4','$d5','$d6','$d7',
										   '$e1','$e2','$e3','$e4','$e5','$e6',
										   '$f1','$f2','$f3','$f4',
										   '$g1','$g2','$g3','$g4','$g5','$g6','$g7',
										   '$h1','$h2','$h3','$h4','$h5',
										   '$i1','$i2','$i3','$i4','$i5','$i6',
										   '$k1','$k2','$k3','$k4','$k5','$k6',
										   '$l1','$l2','$l3','$l4','$l5','$l6','$l7',
										   '$m1','$m2',
										   '$n1','$n2','$n3','$n4','$n5','$n6','$n7','$n8',
										   '$o1'
										   )");
						mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Evaluation Posted for Leader Employee','$username','Supervisor User Accounts','$userdep')");
						if($sql)
						{
								echo '<script>alert("Evaluation Submitted");</script>';
						}						
				}

		}
		else
		{
				echo '<script>alert("Invalid Employee #");</script>';
				mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Invalid Employee Number Input','$username','Supervisor User Accounts','$userdep')");
		}
	}
	elseif(isset($_POST['logout']))
	{
		mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Logout','$username','Supervisor User Accounts','$userdep')");		

	}

	?>
    <?php include('../header.php'); ?>
    <div id="cssmenu">
	<ul>
	<li><a href='sup_home.php' name='home'>Supervisor Home</a></li>
	<li><a href='sup_employee.php' name='home'>Supervisor Employees</a></li>
	<li><a href='sup_leaves.php'>Employee Leaves</a></li>
	<li class='active'><a href='#'>Employee Evaluation</a></li>
	
	<li><a href='../logout.php' name='logout'>Logout</a></li>
	<li><a href='#' id="time"></a></li>
	</ul>
    </div>
    <div id="supeval_content">
	<p id="tbl_evaluation"><i>Evaluate Employee Through the use of 5 different categories
    | Each Category has a scale of 1 - 5, 5 as the highest and 1 as the lowest score</i></p>
 
        <table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation1">
            <tr>
            <td><font size="3px"><b>Legend :</b></font></td>
                <td>Excelent</td></td>
		<td>Very Good</td>
		<td>Good</td>
		<td>Fair</td>
		<td>Poor</td>
            </tr>
            <tr>
		<td></td>
                <td>5</td>
                <td>4</td>
                <td>3</td>
                <td>2</td>
                <td>1</td>
            </tr>
        </table>
        <br>
        <table  border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation1">
            <tr>

                <td><font size="3"><b>Employee Information</b></font></td>
				<td><b>Type of Evaluation</td>
								<td></td>
            </tr>
            <tr>
                <td>Employee # of the Employee being evaluated</td>
				<td>Type of evaluation to be applied to the employee</td>
				<td>Year</td>
	    </tr>
	    <tr>
				<td>
						<select name="ename" id="rank">
								<?php
								$r1 = mysql_query("SELECT * FROM existdb.employees WHERE DEPARTMENT='$userdep'");
								while($r = mysql_fetch_array($r1))
								{
										if($r['MNAME']=="")
										{
												$employee = $r['FNAME']." ".$r['MNAME']." ".$r['LNAME'];
										}
										else
										{
												$employee = $r['FNAME']." ".$r['LNAME'];
										}
										
										echo "<option value='$employee'>$employee</option>";
								}
								
								?>
						</select>
						
						
				</td>
                <td>
                    <select name="evtype" id='rank'>
                        <option value="Annual">Annual</option>
                        <option value="Midyear">Midyear</option>
                    </select><br>
					<i>(*Select from Date Range if Midyear)</i><br>
				    <select name="evrange" id='rank'>
                        <option value="January 1 - June 30">January 1 - June 30</option>
                        <option value="July 1 - December 31">July 1 - December 31</option>
                    </select>
				</td>
					<td><input type="text" id="rank" min="2000" max="2099" maxlength="4" name="year" required onKeyPress="return numbersonly(this, event)"> </td>
                
            </tr>
		<tr>
				<td><font size="3"><b>Appraiser Information:</b></font></td>
				<td></td>
				<td></td>
		</tr>
		<tr>
				<td>Appraiser Name:</td>
				<td>Position:</td>
				<td></td>
		</tr>
		<tr>
				<td><input type="text" id="rank" name="appname" required onkeydown="return alphaOnly(event);" autocomplete="off"></td>
				<td><input type="text" id="rank" name="apppos" required onkeydown="return alphaOnly(event);" autocomplete="off"></td>
				<td></td>
		</tr>
        </table >
<br>
	    <table border="0" cellspacing="0" id="tbl_evaluation" text-align="center" width="100%" cellpadding="5">
			<tr>
				<td><b>CATEGORY:</b></td>
			</tr>

        </table>
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<th><b>1. Results of Prior Years Action Plan and Professional Development Plan</b></th>
				</tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Were goals and objectives met?</td>
				<td>Consider areas identified at last review as strengths or as requiring improvement. What impact did Action / Development Plans have in improving performance or enhancing the employees strengths?</td>
				<td>Consider employees initiative & timeliness in completing planned activities</td>
            </tr>
            <tr>
                <td>
                    <select name="a1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="a2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="a3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>2. Knowledge</b></td>
				</tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Review each job description item, comparing job description responsibilities to technical job knowledge</td>
				<td>Consider employees understanding and observance of each job duty</td>
				<td>Consider employees level of required skills and competencies</td>
				<td>Familiarity with other related department and company functions</td>
            </tr>
            <tr>
                <td>
                    <select name="b1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="b2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="b3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="b4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
			</tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>3. Team Work</b></td>
				</tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Willingness and ability to work positively with EXISTs employees at all levels</td>
				<td>Helps others on own initiative</td>
				<td>Works as a team member to achieve common goals sacrifices for the common good</td>
				<td>Desire to cross-train and learn more</td>
				<td>Adaptability to change, new assignments</td>
				<td>Open to others ideas</td>
				<td>Sell the units point of view</td>
				<td>Trusted by team mate</td>
            </tr>
            <tr>
                <td>
                    <select name="c1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="c2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="c3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="c4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="c5" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="c6" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="c7" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="c8" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table >	
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>4. Productivity</b></td>
				</tr>
		</table >		
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Ability and willingness to produce job outputs at standard rate</td>
				<td>Keeps up to date, meet deadlines</td>
				<td>Ability to handle extra work and adapt to work priority changes</td>
				<td>Works consistently and energetically</td>
				<td>Ability to follow instructions, grasp facts and ideas and master new routines</td>
				<td>For Supervisors: Ability to maintain productivity of unit and staff</td>
            </tr>
            <tr>
                <td>
                    <select name="d1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="d2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="d3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="d4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="d5" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="d7" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table >	
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>5. Quality of Work</b></td>
				</tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Consider accuracy, thoroughness</td>
				<td>Neatness, appearance, workmanship</td>
				<td>Organized work and work station</td>
				<td>Ability to follow through on total job, including value added or outputs to the job</td>
				<td>For Supervisors: Ability to achieve and sustain high quality of unit and staffs work</td>
            </tr>
            <tr>
                <td>
                    <select name="e1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="e2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="e3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="e4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="e6" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table >	
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>6. Attendance and Punctuality</b></td>
				</tr>
		</table >			
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Compute actual attendance</td>
				<td>Advanced or timely communication with supervisor about absences</td>
				<td>Consider tardiness or abuse of lunch or break periods</td>
            </tr>
            <tr>
                <td>
                    <select name="f1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="f2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="f3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>7. Supervision Required</b></td>
				</tr>
		</table >		
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Ability to achieve desired results with minimum of supervision</td>
				<td>Takes initiative and acts independently</td>
				<td>Carries out work without detailed instructions</td>
				<td>Makes constructive suggestions</td>
				<td>Keeps supervisor/management informed of work status</td>
				<td>Accepts constructive criticism well</td>
            </tr>
            <tr>
                <td>
                    <select name="g1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="g2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="g3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="g4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="g5" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="g6" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table >			
		
		
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>8. Analytical & Decision Making Ability</b></td>
				</tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
            <tr>
				<td>Ability and willingness to make logical and appropriate decisions, even in the absence of detailed instruction</td>
				<td>Is fair and objective</td>
				<td>Assesses situations, gathering and summarizing data to determine best course of action</td>
				<td>Ability to communicate and act on decisions</td>
            </tr>
            <tr>
                <td>
                    <select name="h1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="h2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="h3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="h4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
				<tr>
						<td><b>9. Customer Service (internal & external)</b></td>
				</tr>
		</table >
		<table border="0px" cellspacing="0px" cellpadding="2px" id="tbl_evaluation">
           <tr>
				<td>Consider effort & willingness to satisfy and retain customers</td>
				<td>Degree of overall effectiveness of service</td>
				<td>Consider general impression made (including courtesy, tact, and ability to express self effectively)</td>
				<td>Ability to explain details of product & to help customers understand all benefits of the product</td>
				<td>Responsive to customer needs, especially in difficult situations</td>
            </tr>
            <tr>
                <td>
                    <select name="i1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="i2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="i3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="i4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="i5" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
				<tr>
						<td><i>Complete items 11 through 14 only if the employee carries out leadership activities, such as staff supervision or management, team leadership, project management, or training / coaching of staff members (note: non-supervisory staff may be rated here, if appropriate). Otherwise, proceed to item #15.</i>
						<br><input type="checkbox" name="check"><i><b>(*Check if carries out leadership activities / Leave blank if no)</b></i>
						</td>
				
				</tr>
				<tr>
						
						
				</tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
				<tr>
						<td><b>11. Lead and Direct</b></td>
				</tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
		<tr>
				<td>Influences and gain commitment from Others</td>
				<td>Sets clear objectives</td>
				<td>Decides and act on decisions comfortably</td>
				<td>Sets high expectations</td>
				<td>Ability to be assertive when needed</td>
				<td>Cooperates and compromises</td>
            </tr>
            <tr>
                <td>
                    <select name="k1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="k2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="k3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="k4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="k5" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="k6" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>				
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
				<tr>
						<td><b>12. Implement</b></td>
				</tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
		<tr>
				<td>Practical and considered approach to getting things done.</td>
				<td>Action oriented</td>
				<td>Enlists the cooperation of others</td>
				<td>Uses peoples talents</td>
				<td>Minimum of mistakes</td>
				<td>Organizes tasks and work environment</td>
				<td>Responds well to changes</td>
            </tr>
            <tr>
                <td>
                    <select name="l1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="l2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="l3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="l4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="l5" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="l6" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="l7" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
				<tr>
						<td><b>13. Control</b></td>
				</tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
		<tr>
				<td>Keeps commitments and follows through to Completion</td>
				<td>Recognizes timely achievements and where falling behind</td>
            </tr>
            <tr>
                <td>
                    <select name="m1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="m2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>	
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
				<tr>
						<td><b>14. Feedback and Developing Others</b></td>
				</tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
		<tr>
				<td>Willingness to create trust by providing positive feedback and addressing inadequate performance</td>
				<td>Conduct motivating performance reviews</td>
				<td>Ability to change less desirable behavior</td>
				<td>Straight forward in disagreement, obtainingpositive results</td>
				<td>Mentors and coaches toward career development</td>
				<td>Assigns challenging tasks</td>
				<td>Provides appropriate training</td>
				<td>Ability to create clear, concise, and appropriate documentation</td>
            </tr>
            <tr>
                <td>
                    <select name="n1" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="n2" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="n3" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="n4" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="n5" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="n6" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="n7" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
                <td>
                    <select name="n8" id="rank">
                        <option value="5">5</option>
                        <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option>
                    </select>
                </td>
            </tr>
		</table>
		<table border="0px" cellspacing="0px" cellpadding="0px" id="tbl_evaluation">
				<tr>
						<td><i>Overall grade from category nos. 1-9 and Overall ratings from all of the categories are automatically computed by the system. Thank you for cooperation.</i>
						</td>
				
				</tr>
				<tr>
						
						
				</tr>
		</table>
        <br>
	<div id="tbl_evaluation">
        <font size="3"><b>Comment / Recomendation :</b></font>
        <br><br>
        <textarea name="comment" id="evalta" style="resize:none;"> </textarea><br>
	<button id="btn1" name="submit" onclick='return confirm("are you sure?")'>Submit Evaluation</button>
	</div>
	<br>
    </form>
</div>
    <br>
	<br>
	    <br>
    <?php include('../footer.php'); ?>
</body>	
</html>

<?php

include('../../javascript/numbers.js');
include('../../javascript/letter.js');
?>