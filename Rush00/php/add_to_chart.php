<?php
session_start();
include("chart_functions.php");
add_article_to_chart($_POST['Prod_Name'], $_POST['Desired_Qty']);
header('Location: ../php/display_chart.php')
?>