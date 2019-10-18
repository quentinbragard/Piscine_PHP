<?php
include("db_connect.php");

function prod_name_exist($Prod_Name)
{
    try
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Prod_Name FROM `products` WHERE Prod_Name = '$Prod_Name'");
        $stmt->execute();
        $result = $stmt->fetchAll();
        if ($result[0])
            return (TRUE);
        else
            return (FALSE);
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
        return (FALSE);
    }
    $conn = null;
}

$Prod_Name = $_POST['Prod_Name'];
$Prod_Category = $_POST['Prod_Category'];
$Prod_Desc = $_POST['Prod_Desc'];
$Prod_Qty = $_POST['Prod_Qty'];
$Prod_Price = $_POST['Prod_Price'];


if (prod_name_exist($_POST['Prod_Name']))
{
    try
        {
            $conn = db_connect("localhost", "chez_maurice", "root", "123456");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

    catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

    if (isset($_POST['Prod_Category']))
        {
            $stmt = $conn->prepare("UPDATE `products` SET `Prod_Category` = '$Prod_Category' WHERE `products`.`Prod_Name` = '$Prod_Name';"); 
            $stmt->execute();
        }

    if (isset($_POST['Prod_Desc']))
        {
            $stmt = $conn->prepare("UPDATE `products` SET `Prod_Desc` = '$Prod_Desc' WHERE `products`.`Prod_Name` = '$Prod_Name';"); 
            $stmt->execute();
        }

    if (isset($_POST['Prod_Qty']))
        {
            $stmt = $conn->prepare("UPDATE `products` SET `Prod_Qty` = '$Prod_Qty' WHERE `products`.`Prod_Name` = '$Prod_Name';"); 
            $stmt->execute();
        }

    if (isset($_POST['Prod_Price']))
        {
            $stmt = $conn->prepare("UPDATE `products` SET `Prod_Price` = '$Prod_Price' WHERE `products`.`Prod_Name` = '$Prod_Name';"); 
            $stmt->execute();
        }
    header('Location: ../php/admin_space.php');
}
else
{
    try
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO Products (Prod_ID, Prod_Name, Prod_Picture, Prod_Desc, Prod_Price, Prod_Category, Prod_Qty)
        VALUES ('', '$Prod_Name', '', '$Prod_Desc', '$Prod_Price', '$Prod_Category', '$Prod_Qty')"; 
        $conn->exec($sql);
    }

    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
    header('Location: ../php/admin_space.php');
}
$conn = null;
?>