<?php
session_start();
include("auth.php");
if ($_POST["submit"] == "OK")
{
    $_SESSION["login"]= $_POST["login"];
    $_SESSION["passwd"] = $_POST["passwd"];
    if (auth($_SESSION["login"], $_SESSION["passwd"]))
    {
        $_SESSION["loggued_on_user"] = $_SESSION["login"];
        header("Refresh:0.5; url=chat.html");  
    }
    else
    {
        $_SESSION["loggued_on_user"] = "";
        ob_start();
        echo "ERROR\n";
        header("Location: index.html");
        ob_end_flush();  
    }
}
?>