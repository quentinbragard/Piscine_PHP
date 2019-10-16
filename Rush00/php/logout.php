<?php
session_start();
if ($_SESSION['loggued_on_user'])
{
    $_SESSION['loggued_on_user'] = NULL;
    header('Location: ../html/index.html');
    $_SESSION['chart'] = NULL;
    unset($_SESSION);
    exit();
}
header("location:".  $_SERVER['HTTP_REFERER']);
?>