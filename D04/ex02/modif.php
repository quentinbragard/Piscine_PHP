<?php
if (!$_POST['login'] || !$_POST['oldpw'] || !$_POST['newpw'])
{
    echo "ERROR\n";
    exit ;
}
if (!file_exists("../private/passwd"))
{
    echo "ERROR\n";
    exit ;
}
$users_database = unserialize(file_get_contents("../private/passwd"));
if (!array_key_exists($_POST['login'], $users_database))
{
    echo "ERROR\n";
    exit ;  
}
if ($users_database[$_POST['login']] != hash('whirlpool', $_POST['oldpw']))
{
    echo "ERROR\n";
    exit ;  
}
$users_database[$_POST['login']] =  hash('whirlpool', $_POST['newpw']);
file_put_contents("../private/passwd", serialize($users_database));
echo "OK\n";
?>