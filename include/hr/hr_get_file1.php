<?php
// Make sure an ID was passed
if(isset($_GET['id'])) {
// Get the ID
    $id = intval($_GET['id']);
 
    // Make sure the ID is in fact a valid ID
    if($id <= 0) {
        die('The ID is invalid!');
    }
    else {
        // Connect to the database
        $dbLink = new mysqli('127.0.0.1', 'root', '', 'existdb');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Fetch the file information
        $query = "
            SELECT *
            FROM `empleave`
            WHERE `id` = {$id}";
        $result = $dbLink->query($query);
 
        if($result) {
            // Make sure the result is valid
            if($result->num_rows == 1) {
            // Get the row
                $row = mysqli_fetch_assoc($result);
 
                // Print headers
                header("Content-Type: ". $row['mime']);
                header("Content-Length: ". $row['size']);
                header("Content-Disposition: attachment; filename=". $row['name']);
 
                // Print data
                echo $row['data'];
  
                include('../../database/connection.php');
                session_start();
                $EMPLOYEEID = $_SESSION['hr'];
                $DATE = date("Y-m-d", time());
                $TIME = date("G:i:s A", time());
                $result1 = mysql_query("select * from existdb.useraccounts WHERE USERID='$EMPLOYEEID'");
                $row1 = mysql_fetch_array($result1);
                $username = $row1['FULLNAME'];
                $userdep  = $row1['DEPARTMENT'];
                
                mysql_query("INSERT INTO existdb.log_trail(LOG_DATE,LOG_TIME,LOG_DET,USER,ACCOUNT_TYPE,DEPARTMENT) VALUES('$DATE','$TIME','Leave Successfully Downloaded','$username','Employee Accounts','$userdep')");

            }
            else {
                echo 'Error! No image exists with that ID.';
            }
 
            // Free the mysqli resources
            @mysqli_free_result($result);
        }
        else {
            echo "Error! Query failed: <pre>{$dbLink->error}</pre>";
        }
        @mysqli_close($dbLink);
    }
}
else {
    echo 'Error! No ID was passed.';
}
?>