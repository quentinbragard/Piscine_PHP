<?php
session_start();
if ($_SESSION['loggued_on_user'])
{
    $_SESSION['loggued_on_user'] = NULL;
    header('Location: ../html/index.html');
    exit();
}
header("location:".  $_SERVER['HTTP_REFERER']);
?>