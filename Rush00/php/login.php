<?php
session_start();
include("check_user.php");
if (!isset($_POST['login']) || !isset($_POST['passwd']))
{
    header('Location: ../html/login_error.html');
    exit ;
}
if (check_user($_POST['login'], $_POST['passwd']))
{
    $_SESSION['loggued_on_user'] = $_POST['login'];
    header('Location: ../php/prod_display.php');
}
else
    header('Location: ../html/login_error.html');
?>