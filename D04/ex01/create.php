<?php
if (!$_POST['login'] || !$_POST['passwd'])
{
    echo "ERROR\n";
    exit ;
}
if (!file_exists("../private/passwd"))
    echo "OK\n";
?>