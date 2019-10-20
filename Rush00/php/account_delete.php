<?php
session_start();
include("db_connect.php");
echo "oK1\n";
if (isset($_SESSION['loggued_on_user']))
    {
    $login = $_SESSION['loggued_on_user'];
    try 
    {
echo "oK2\n";
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $stmt = $conn->prepare("DELETE FROM `customers` WHERE `customers`.`Email_Address` = '$login'"); 
        $stmt->execute(); 
        $_SESSION['loggued_on_user'] = NULL;
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        return (FALSE);
    }
    $conn = null;
    }
//header('Location:../php/index.php')
?>