<?php
session_start();
echo "ON";
$price = $_SESSION['total'];
echo "ON1";
$chart = $_SESSION['chart'];
echo "ON2";
$length = count($chart) - 1;
echo "ON3";
$products = "";
print_r($chart);
echo "ON4";
echo "login = ".$_SESSION['loggued_on_user'];
echo "encore";
if (isset($_SESSION['loggued_on_user']))
{
    $login = $_SESSION['loggued_on_user'];
    while ($length >= 0)
    {
        if ($lenght != 0)
            $products += $product."_";
        else    
            $products += $product;
    }
echo $products;
}
?>