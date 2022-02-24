<?php
$conn = mysqli_connect('localhost', 'root', '', 'donate');
// Checking the connection
if (mysqli_connect_errno()) {
    die('Database connection failed ' . mysqli_connect_error());
} else {
   // echo "Connection Successful";
}
?>