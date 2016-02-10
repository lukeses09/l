<?php

  include('../../../database/connection.php');

  $emp_id = $_POST['emp_id'];

  $sql = "SELECT lv_id,lv_start,lv_end,lv_desc,lv_status, 
(SELECT lc_id_name FROM leave_credit lc WHERE lc.lc_id = lv.lv_lc_id ) as lc_name
FROM leave_file lv, leave_credit lc 
WHERE (lv.lv_emp_id = ?) 
GROUP BY lv.lv_id";

  $q = $conn->prepare($sql);
  $q -> execute(array($emp_id));
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['lv_id'],$fetch['lc_name'],$fetch['lv_start'],$fetch['lv_end'],$fetch['lv_desc'],$fetch['lv_status']);          
  }         
$conn = null;             

echo json_encode($output);
?>    