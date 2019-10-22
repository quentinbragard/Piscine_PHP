<?php
include("db_connect.php");
$host="localhost"; 

$root="root"; 
$password="123456"; 
$columns = "ID INT( 11 ) AUTO_INCREMENT PRIMARY KEY, Prename VARCHAR( 50 ) NOT NULL, Name VARCHAR( 250 ) NOT NULL,
 StreetA VARCHAR( 150 ) NOT NULL, StreetB VARCHAR( 150 ) NOT NULL, StreetC VARCHAR( 150 ) NOT NULL, 
 County VARCHAR( 100 ) NOT NULL, Postcode VARCHAR( 50 ) NOT NULL, Country VARCHAR( 50 ) NOT NULL " ;


$db="test6"; 

    try {
        $dbh = new PDO("mysql:host=$host", $root, $password);
        $dbh->exec("CREATE DATABASE `$db`;
        CREATE USER '$root'@'localhost' IDENTIFIED BY '$password';
        GRANT ALL ON `$db`.* TO '$user'@'localhost';")
        or die(print_r($dbh->errorInfo(), true));
        echo "OKKkkk\n";

    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
    try {
        $conn = db_connect("localhost", "test6", "root", "123456");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE `customers` (
            `ID` INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
            `First_Name` INT,
            `Last_Name` INT,
            `Phone_Number` VARCHAR(10),
            `Program` INT,
            `Admin` INT;";
        $conn->exec($sql);

    } catch (PDOException $e) {
        die("DB ERROR: ". $e->getMessage());
    }
?>