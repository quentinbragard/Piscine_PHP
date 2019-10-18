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

if (prod_name_exist($_POST['Prod_Name']))
{
    try
        {
            $conn = db_connect("localhost", "chez_maurice", "root", "123456");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("DELETE FROM `products` WHERE `products`.`Prod_Name` = '$Prod_Name';"); 
            $stmt->execute();
            header('Location: ../php/admin_space.php');
        }

    catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
        }

}
else
{
    echo "Veuillez entrer un nom de produit existant\n";
}
$conn = null;
?>