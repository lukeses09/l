<html>
<title>Payroll Computation</title>
<header>
	<link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</header>
<body onload="timer_function()">
	<div id="wrapper">
		<?php include('../header.php'); ?>
		<div id="cssmenu">
			<ul>
			<li><a href='acct_home.php'>Accountant's Home</a></li>
			<li><a href='acct_payroll_layout.php'>Payroll</a></li>
			<li class='active'><a href='acct_dtr.php'>Daily Time Record</a></li>
			<li><a href='#'>Announcement</a></li>
			<li><a href='../logout.php'>Logout</a></li>
			</ul>
		</div>
		<div id="acct_dtr">
			<form action="" method="post">
			<input type ="text" name="employeeid" id="input1" autocomplete="off" required autofocus placeholder="Employee ID"><br>
			<input type="submit" name="login" value="Login / Logout" id="btn1"><br>
			<input type="reset" name="reset" value="Reset" id="btn1">
			<br><br>
			<div id="time" name="time"></div>
			</form>
			<?php
				if(isset($_POST['login']))
				{
					$eid = $_POST['employeeid'];
					$dtrdate = date('Y-m-d', time());
					include('../../database/connection.php');
					$sql 	= mysql_query("select * from existdb.dtr where DTRDATE='$dtrdate' and EMPLOYEEID='$eid'");
					while($row = mysql_fetch_array($sql))
					{
						$TIMEIN = $row['TIMEIN'];
						$TIMEOUT = $row['TIMEOUT'];
						echo '<table width="50%" id="tbl_login">';
						echo '<tr>';
						echo '<td>Login Time</td>';
						echo '<td>Logout Time</td>';
						echo '</tr>';
						echo '<tr>';
						echo "<td>$TIMEIN</td>";
						echo "<td>$TIMEOUT</td>";
						echo '</tr>';
						echo '</table>';
					}
				}
			?>
		</div>
		<?php include('../footer.php'); ?>
	</div>
</body>
</html>

<?php
if(isset($_POST['login']))
{
	date_default_timezone_set('Asia/Manila');
	include('../../database/connection.php');
	$dateNow 	= date('Y-m-d', time());
	$eid		= $_POST['employeeid'];
	$time  		= date('g:i:s A', time());
	$time1  	= date('Gis', time());
	$dtrdate	= date('Y-m-d', time());
	
	$sql 	= mysql_query("select * from existdb.dtr where DTRDATE='$dtrdate' and EMPLOYEEID='$eid'");
	$count 	= mysql_num_rows($sql);
	$row = mysql_fetch_array($sql);

	$TIMEIN	 = $row['TIMEIN'];
	$TIMEOUT = $row['TIMEOUT'];
	
	if($count > 0)
	{
		if($TIMEIN != "" and $TIMEOUT == "")
		{
			$to_time = strtotime($time);
			$from_time = strtotime($TIMEIN);
			$h =  round(abs($to_time - $from_time) / 60,2);
			$minutes	= $h % 60;
			$hrs 		= intval($h / 60);
			$hrs_work	= $hrs.".".$minutes;
			
			$sql = "UPDATE existdb.dtr SET TIMEOUT='$time', HRS_WORK='$hrs_work' WHERE DTRDATE='$dtrdate' and EMPLOYEEID='$eid'";
			$result = mysql_query($sql, $con);
			
			if($result)
			{
				echo '<script>alert("Successfuly Logout");</script>';
			}
			else
			{
				$error = mysql_error();
				echo '<script>alert("$error");</script>';
			}
		}
		elseif($TIMEIN != "" and $TIMEOUT != "")
		{
			echo '<script>alert("Already Login/Logout");</script>';
		}

	}
	else
	{
		if($time1 >=  170000 and $time <= 240000 || $time >= 10000 and $time < 60000)
		{
			echo '<script>alert("Invalid Time");</script>';
		}
		elseif($time1 >=  60000 and $time <= 170000 )
		{
			$sql = "INSERT INTO existdb.dtr(EMPLOYEEID,DTRDATE,TIMEIN) VALUES('$eid','$dtrdate','$time')";
			$result = mysql_query($sql, $con);
			
			if($result)
			{
				echo '<script>alert("Successfully Login");</script>';
			}
			else
			{
				$error = mysql_error();
				echo '<script>alert("$error");</script>';
			}
		}
	}

}
?>

<script type="text/javascript">
function AjaxFunction()
{
var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
		  try
   			 		{
httpxml=new ActiveXObject("Msxml2.XMLHTTP");
}
catch (e)
{
try
{
httpxml=new ActiveXObject("Microsoft.XMLHTTP");
}
catch (e)
{
alert("Your browser does not support AJAX!");
return false;
}
}
}
function stateck()
{
if(httpxml.readyState==4)
{
document.getElementById("time").innerHTML=httpxml.responseText;
}
}
var url="time.php";
url=url+"?sid="+Math.random();
httpxml.onreadystatechange=stateck;
httpxml.open("GET",url,true);
httpxml.send(null);
tt=timer_function();
}
function timer_function(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('AjaxFunction();',refresh)
}
</script>
<?php include('../../javascript/numbers.js'); ?>