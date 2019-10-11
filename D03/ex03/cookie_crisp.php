<?php
if ($_GET["action"] == "set")
    setcookie($_GET["name"], $_GET["value"], time()+(60*60*24*30));
else if ($_GET["action"] == "get")
{
    if ($_COOKIE[$_GET["name"]])
        print $_COOKIE[$_GET["name"]]."\n";
}
else if ($_GET["action"] == "del")
    setcookie($_GET["name"], "", 0);
?>