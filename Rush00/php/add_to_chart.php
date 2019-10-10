<?php
session_start();
include("chart_functions.php");
add_article_to_chart($_POST['Prod_Name'], $_POST['Desired_Qty']);
print_r($_SESSION['chart']);
?>