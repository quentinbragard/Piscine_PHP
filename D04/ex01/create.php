<?php
if (!$_POST['login'] || !$_POST['passwd'])
{
    echo "ERROR\n";
    exit ;
}
if (!file_exists("../private/passwd"))
    mkdir("../private", 0777);
file_put_contents("../private/passwd", $_POST['login'], FILE_APPEND);
file_put_contents("../private/passwd", "\n", FILE_APPEND);
?>