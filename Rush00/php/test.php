<?php
$servername = "localhost";
$username = "root";
$password = "123456";
$dbname = "chez_maurice";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO `customers` (`First_Name`, `Last_Name`, `Email_Address`, `Phone_Number`, `Program`, `ID`)
VALUES ('Alexis', 'Senat', 'alexis.Senat@essec.eud', '0630299726', 'GE', NULL);";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>