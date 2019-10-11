<?php
    session_start();
    date_default_timezone_set("Europe/Paris");
    if ($_SESSION["loggued_on_user"] != "")
    {
        $tab = array($_SESSION["loggued_on_user"], date("m-d H:i", time()), $_POST["message"]);
        $ser = serialize($tab);
        if ((file_exists($cd."/private/chat")))
        {
            fopen($cd."/private/chat");
            flock($cd."/private/chat");
        }
        file_put_contents("../private/chat", $ser."\n", FILE_APPEND);
   }
    header("Refresh: 0.01; url=chat.html");  
?>