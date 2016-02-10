<?php

  include('../../../database/connection.php');

  $sql = "SELECT * FROM leave_credit";

  $q = $conn->prepare($sql);
  $q -> execute(array());
  $browse = $q -> fetchAll();
  foreach($browse as $fetch)
  {
    $output[] = array ($fetch['lc_id'],$fetch['lc_id_name']);          
  }         
$conn = null;             

echo json_encode($output);
?>    