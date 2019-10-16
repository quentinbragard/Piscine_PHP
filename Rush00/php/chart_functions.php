<?php
session_start();
include("price_get.php");
function create_chart()
{
   if (!isset($_SESSION['chart'])){
      $_SESSION['chart']=array();
      $_SESSION['chart']['Prod_Name'] = array();
      $_SESSION['chart']['Prod_Qty'] = array();
      $_SESSION['chart']['Prod_Price'] = array();
      $_SESSION['chart']['Locked'] = false;
   }
   return true;
}

function add_article_to_chart($Prod_Name,$Prod_Qty)
{

   create_chart();
   $price = price_get("Le Colombe");
   $Prod_Position = array_search($Prod_Name,  $_SESSION['chart']['Prod_Name']);
       if ($Prod_Position !== false)
          $_SESSION['chart']['Prod_Qty'][$Prod_Position] += $Prod_Qty ;
       else
       {
          array_push($_SESSION['chart']['Prod_Name'],$Prod_Name);
          array_push($_SESSION['chart']['Prod_Qty'],$Prod_Qty);
          array_push($_SESSION['chart']['Prod_Price'],$price[0]['Prod_Price']);
       }
 }
 

 function remove_one_article_from_chart($Prod_Name)
 {
   $Prod_Position = array_search($Prod_Name,  $_SESSION['chart']['Prod_Name']);
      if ($_SESSION['chart']['Prod_Qty'][$Prod_Position] > 0)
         $_SESSION['chart']['Prod_Qty'][$Prod_Position] -= 1 ;
 }

?>