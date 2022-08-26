<?php
$servername = "localhost";
$username = "paystubs_paystub";
$password = 'm$gPJh1o[*58';
$db = 'paystubs_paystub';

// Create connection
$con = new mysqli($servername, $username, $password, $db);

// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
// Perform query

$file_to_delete_error = 'error_log';
unlink($file_to_delete_error);
    
    
$sql = "SELECT pdf_name FROM `my_payslips` WHERE created < DATE_SUB(NOW(), INTERVAL 2 DAY)";

if ($result = mysqli_query($con, $sql)) {
  while ($row = mysqli_fetch_row($result)) {
    $file_to_delete = 'assets/payslips/'.$row[0];
    unlink($file_to_delete);
  }
  mysqli_free_result($result);
}

mysqli_close($con);
?>

