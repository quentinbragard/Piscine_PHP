<?php
session_start();
include("db_connect.php");
$price = intval($_SESSION['Order_Price']);
$chart = $_SESSION['chart'];
$length = count($chart['Prod_Name']) - 1;
$products = $chart['Prod_Name'][0];

if (isset($_SESSION['loggued_on_user']))
{
    $login = $_SESSION['loggued_on_user'];
    while ($length > 0)
    {
        $product = $chart['Prod_Name'][$length];
        if ($length != 0)
            $products = $products."_".$product;
        else    
            $products = $products.$product;
        $length -= 1;
    }
    try
    {
        $conn = db_connect("localhost", "chez_maurice", "root", "123456");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO orders (ID, Email_Address, Products, Total_Price)
        VALUES (NULL, '$login', '$products', '$price')";
        $conn->exec($sql);
    }
    catch(PDOException $e)
    {
        echo "Error: " . $e->getMessage();
        return (FALSE);
    }
    $conn = null;
    echo "OK";
}
?>