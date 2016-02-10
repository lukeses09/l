
    <?php           // ESTABLISH CONNECTION TO MYSQL

try{
  include('../../../database/connection.php');


                                     //FETCH ALL VARIABLES
  	$lv_id = $_POST['lv_id'];


                                                                 // INSERT DATA TO DATABASE
$sql = "UPDATE leave_file SET lv_status='approved' WHERE lv_id=?";
$q = $conn -> prepare($sql);
$q -> execute(array($lv_id));

$conn = null;
echo json_encode(0); 	
}

catch(PDOException $x) {
echo json_encode(1); 		
}



?>
