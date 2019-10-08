<?php
session_start();
include("auth.php");
if (!isset($_POST['login']) || !isset($_POST['passwd']))
{
    header('Location: ../html/login_error.html');
    exit ;
}
if (auth($_POST['login'], $_POST['passwd']))
{
    $_SESSION['loggued_on_user'] = $_POST['login'];
    header('Location: ../html/produits.html');
    echo "OK\n";
}
else
{
    $_SESSION['loggued_on_user'] = NULL;
    header('Location: ../html/login_error.html');
}
?>