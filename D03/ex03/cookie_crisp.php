<?php
if (isset($_GET["action"]) && isset($_GET["name"]))
{
	if ($_GET["action"] == "del")
		setcookie($_GET["name"], NULL, -1);
	elseif ($_GET["action"] == "set") {
		setcookie($_GET["name"], $_GET["value"], time() + (7 * 24 * 3600));
}
    elseif ($_GET["action"] == "get" && isset($_COOKIE[$_GET["name"]]))
			echo $_COOKIE[$_GET["name"]]."\n";
}
?>