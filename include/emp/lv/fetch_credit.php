<?php

  include('../../../database/connection.php');


  $emp_id = $_POST['emp_id'];
  $lc_id = $_POST['lc_id'];

  $sql = "SELECT 
(SELECT lc_qty FROM leave_credit lc WHERE lc.lc_id = ?)-DATEDIFF(lv.lv_end,lv.lv_start) as credit
FROM leave_file lv
WHERE lv.lv_lc_id = ?
AND lv.lv_emp_id = ?
GROUP BY lv.lv_id";
	
  $q = $conn->prepare($sql);
  $q -> execute(array($lc_id,$lc_id,$emp_id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
	$output=$fetch['credit'];          
  }         
$conn = null;             

echo json_encode($output);
?>    