<?php
    session_start();
    date_default_timezone_set("Europe/Paris");
    if ((file_exists("../private/chat")))
    {
        $f = fopen("../private/chat", "r");
        flock($f, LOCK_SH);
    }
    if ($_SESSION["loggued_on_user"] != "" && file_exists("../private/chat"))
    {
        $content_full = file_get_contents("../private/chat");
        $content = preg_split("/\n/", $content_full);
        foreach ($content as $mess)
        {
            $tmp = unserialize($mess);
            if ($tmp[2] != "")
                echo("(".$tmp[1].") <strong>".$tmp[0]."</strong> :  ".$tmp[2]."<BR />");
        }
    }
?>