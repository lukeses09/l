
    <?php           // ESTABLISH CONNECTION TO MYSQL

try{
  include('../../../database/connection.php');


                                     //FETCH ALL VARIABLES
  	$lc_id = $_POST['lc_id'];
	$lc_name = ucwords(trim($_POST['lc_name']));
	$lc_qty = $_POST['lc_qty'];


                                                                 // INSERT DATA TO DATABASE
$sql = "UPDATE leave_credit SET lc_id_name=?, lc_qty=? WHERE lc_id=?";
$q = $conn -> prepare($sql);
$q -> execute(array($lc_name,$lc_qty,$lc_id));

$conn = null;
echo json_encode(0); 	
}

catch(PDOException $x) {
echo json_encode(1); 		
}



?>
