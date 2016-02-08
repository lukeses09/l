<html>
<title>Application</title>
<head>
    <link rel="stylesheet" type="text/css" href="../../css/styles.css"/>
</head>
<body>
	<div id="wrapper">
	<?php include('../header.php'); ?>
	     <div id="cssmenu">
            <ul>
            <li><a href='../../index.php'>User's Login</a></li>
            <li><a href='#'>About Us</a></li>
			<li><a href='../contactus.php'>Contact Us</a></li>
            <li class='active'><a href='#'>Application</a></li>
            <li><a href='#' id="time"></a></li>
            </ul>
        </div>
		<div id="app_content">
		<form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="uploaded_file" id="leave"><br>
        <input type="submit" value="Upload Resume" name="submit" id="leave1">
		</form>
		
		<?php
// Check if a file has been uploaded
if(isset($_POST['submit']))
{
if (is_uploaded_file($_FILES['uploaded_file']['tmp_name']))
{
if(isset($_FILES['uploaded_file'])) {
    // Make sure the file was sent without errors
    if($_FILES['uploaded_file']['error'] == 0) {
        // Connect to the database
        $dbLink = new mysqli('127.0.0.1', 'root', '', 'existdb');
        if(mysqli_connect_errno()) {
            die("MySQL connection failed: ". mysqli_connect_error());
        }
 
        // Gather all required data
        $name = $dbLink->real_escape_string($_FILES['uploaded_file']['name']);
        $mime = $dbLink->real_escape_string($_FILES['uploaded_file']['type']);
        $data = $dbLink->real_escape_string(file_get_contents($_FILES  ['uploaded_file']['tmp_name']));
        $size = intval($_FILES['uploaded_file']['size']);
 
        // Create the SQL query
        $query = "
            INSERT INTO `application` (
                `name`, `mime`, `size`, `data`, `created`
            )
            VALUES (
                '{$name}', '{$mime}', {$size}, '{$data}', NOW()
            )";
 
        // Execute the query
        $result = $dbLink->query($query);
 
        // Check if it was successfull
        if($result) {
            echo
                  "<script type='text/javascript'>alert('Resume Succesfuly Uploaded');
                  {
                  window.location.href = 'application.php';
                  }
                  </script>";
        }
        else {
            echo 'Error! Failed to insert the file'
               . "<pre>{$dbLink->error}</pre>";
        }
    }
    else {
        //echo 'An error accured while the file was being uploaded. '
          // . 'Error code: '. intval($_FILES['uploaded_file']['error']);
    }
 
    // Close the mysql connection
    $dbLink->close();
}
}
else 
{
    echo
                  "<script type='text/javascript'>alert('Empty');
                  {
                  window.location.href = 'application.php';
                  }
                  </script>";
}
}
?>
		</div>
	<?php include('../footer.php'); ?>
	</div>
</body>
</html>

 
 
 