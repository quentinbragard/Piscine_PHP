<?php
include("db_connect.php");
function price_get($Prod_Name)
{
   
    try
     {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT Prod_Price FROM products WHERE Prod_Name = '$Prod_Name'"); 
        $stmt->execute();
        $result = $stmt->fetchAll();
        print_r($result);
        return ($result);
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
        return (NULL);
    }
    $conn = null;
}
?>