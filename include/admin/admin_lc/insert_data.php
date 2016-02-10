
    <?php           // ESTABLISH CONNECTION TO MYSQL

try{
  include('../../../database/connection.php');


                                     //FETCH ALL VARIABLES

	$lc_name = ucwords(trim($_POST['lc_name']));
	$lc_qty = $_POST['lc_qty'];


                                                                 // INSERT DATA TO DATABASE
$sql = "INSERT INTO leave_credit VALUES(?,?)";
$q = $conn -> prepare($sql);
$q -> execute(array($lc_name,$lc_qty));

$conn = null;
echo json_encode(0); 	
}

catch(PDOException $x) {
echo json_encode(1); 		
}



?>
