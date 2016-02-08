<?php
$server="localhost";
$username="root";
$password="";
$database="existdb";

$con = mysql_connect($server,$username,$password,$database);

if($con)
{
   
}
else
{
    die(mysql_error);
}
?>