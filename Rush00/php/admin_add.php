<?php
session_start();
include("db_connect.php");
print_r($_POST);
function check_email($Email_address)
{
    print($Email_Address);
    try 
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $stmt = $conn->prepare("SELECT COUNT(*) FROM customers WHERE Email_Address = '$Email_address'"); 
        $stmt->execute();
        $row = $stmt->fetch();
        print_r($row);
        if ($row['COUNT(*)'] == 1)
            return (TRUE) ;
        else
            return (FALSE);
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        exit ;
    }
}
$Email_Address = $_POST['Email_Address'];
$Admin = $_POST['Admin'];
if (!isset($_POST['Email_Address']))
{
    echo "Veuillez entrer une adresse mail\n";
    exit ;
}
if (check_email($Email_Address) == FALSE)
{
    echo "L'adresse mail n'est associée à aucun compte> Veuillez réessayer\n";
    exit ;
}
else
{
    try
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("UPDATE `customers` SET `Admin` = '$Admin' WHERE `customers`.`Email_Address` = '$Email_Address';"); 
        $stmt->execute();
    }

    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    header('Location: ../php/admin_space.php');
}
?>