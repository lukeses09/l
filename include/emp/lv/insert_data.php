
    <?php           // ESTABLISH CONNECTION TO MYSQL

try{
  include('../../../database/connection.php');

    $year = date('Y');
    $year = substr($year,2,3);
    $id =uniqid('lv'.$year);   
                                     //FETCH ALL VARIABLES
    $emp_id = $_POST['emp_id'];
    $lv_lc_id = $_POST['lv_lc_id'];
    $lv_desc = $_POST['lv_desc'];
    $lv_start = $_POST['lv_start'];
    $lv_end = $_POST['lv_end'];

                                                                 // INSERT DATA TO DATABASE
$sql = "INSERT INTO leave_file VALUES(?,?,?,?,?,?,?)";
$q = $conn -> prepare($sql);
$q -> execute(array($id,$lv_lc_id,$lv_start,$lv_end,$lv_desc,$emp_id,'pending'));

$conn = null;
echo json_encode(0); 	
}

catch(PDOException $x) {
echo json_encode(1); 		
}



?>
