<?php
include("db_connect.php");
function product_get($Prod_Category)
{
    if (!$Prod_Category)
    {
        try
        {
            $conn = db_connect("localhost", "chez_maurice", "root", "123456");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM products"); 
            $stmt->execute();
            $result = $stmt->fetchAll();
            return ($result);
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
            return (NULL);
        }
        $conn = null;
    }
    else
    {
        try
        {
            $conn = db_connect("localhost", "chez_maurice", "root", "123456");
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn->prepare("SELECT * FROM products WHERE Prod_Category = '$Prod_Category'"); 
            $stmt->execute();
            $result = $stmt->fetchAll();
            return ($result);
        }
        catch(PDOException $e)
        {
            echo $sql . "<br>" . $e->getMessage();
            return (NULL);
        }
        $conn = null;
    }
    
}
?>