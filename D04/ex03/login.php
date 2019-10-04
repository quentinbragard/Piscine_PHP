<?php
session_start();
include("auth.php");
if (!isset($_GET['login']) || !isset($_GET['passwd']))
{
    echo "ERROR\n";
    exit ;
}
if (auth($_GET['login'], $_GET['passwd']))
{
    $_SESSION['logged_on_user'] = $_GET['login'];
    echo "OK\n";
}
else
{
    $_SESSION['logged_on_user'] = NULL;
    echo "ERROR\n"; 
}
?>