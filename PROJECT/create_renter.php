<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "renters";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// sql to create table
$sql = "CREATE TABLE new_renter_details 
(name VARCHAR(30),
area VARCHAR(30),vtype VARCHAR(30),ftype VARCHAR(30),tim INT(3),rent INT(8),phoneno VARCHAR(10),email VARCHAR(30),password VARCHAR(30),confirmpassword VARCHAR(30))
";
if (mysqli_query($conn, $sql)) {
    echo "Table Student_details created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
?>