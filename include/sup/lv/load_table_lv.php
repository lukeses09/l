<?php

  include('../../../database/connection.php');


  $sql = "SELECT lv_id,lv_start,lv_end,lv_desc,lv_status,e.FULLNAME,
(SELECT lc_id_name FROM leave_credit lc WHERE lc.lc_id = lv.lv_lc_id ) as lc_name
FROM leave_file lv, leave_credit lc, employees e
WHERE lv.lv_status = 'pending'
AND (lv.lv_emp_id = e.EMPLOYEEID)
GROUP BY lv.lv_id";

  $q = $conn->prepare($sql);
  $q -> execute(array());
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['lv_id'],$fetch['lc_name'],$fetch['lv_start'],$fetch['lv_end'],$fetch['lv_desc'],$fetch['lv_status'],$fetch['FULLNAME']);          
  }         
$conn = null;             

echo json_encode($output);
?>    