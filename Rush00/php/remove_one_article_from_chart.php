<?php
session_start();
include("chart_functions.php");
remove_one_article_from_chart($_POST['Prod_Name']);
header('Location: ../php/display_chart.php')
?>