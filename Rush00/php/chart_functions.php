<?php
function create_chart()
{
   if (!isset($_SESSION['chart'])){
      $_SESSION['chart']=array();
      $_SESSION['chart']['Prod_Name'] = array();
      $_SESSION['chart']['Prod_Qty'] = array();
      $_SESSION['chart']['Pro_Price'] = array();
      $_SESSION['chart']['Locked'] = false;
   }
   return true;
}

function add_article_to_chart($Prod_Name,$Prod_Qty)
{
    //Si le chart existe
    if (creationPanier() && !isVerrouille())
    {
       //Si le produit existe déjà on ajoute seulement la quantité
       $Prod_Position = array_search($Prod_Name,  $_SESSION['chart']['Prod_Name']);
 
       if ($Prod_Position !== false)
          $_SESSION['chart']['Prod_Qty'][$Prod_Position] += $Prod_Qty ;
       else
       {
          //Sinon on ajoute le produit
          array_push( $_SESSION['chart']['Prod_Name'],$Prod_Name);
          array_push( $_SESSION['chart']['Pro_Qty'],$Prod_Qty);
          array_push( $_SESSION['chart']['Pro_Price'],100);
       }
    }
    else
    echo "Un problème est survenu veuillez contacter l'administrateur du site.";
 }
 

?>