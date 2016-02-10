<?php
$server="localhost";
$username="root";
$password="starwars";
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