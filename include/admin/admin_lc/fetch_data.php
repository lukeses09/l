<?php
  include('../../../database/connection.php');

$idKey = $_POST['idKey'];

  $sql = " SELECT * FROM leave_credit WHERE lc_id_name=?";

$q = $conn->prepare($sql);
$q -> execute(array($idKey));
$browse = $q -> fetchAll();
foreach($browse as $fetch)
{
  $output[] = array ($fetch['lc_id_name'],$fetch['lc_qty']);         
}                      

echo json_encode($output);
$conn = null;
?>