<?php
if (!$_POST['login'] || !$_POST['passwd'])
{
    echo "ERROR\n";
    exit ;
}
if (!file_exists("../private/passwd"))
{
    mkdir("../private", 0777);
    $new_user_information = array($_POST['login'] => hash('whirlpool', $_POST['passwd']));
    file_put_contents("../private/passwd", serialize($new_user_information));
    ob_start();
    echo "OK\n";
    header("Location: index.html");
    ob_end_flush();
    exit ;
}
$users_database = unserialize(file_get_contents("../private/passwd"));
if (array_key_exists($_POST['login'], $users_database))
{
    echo "ERROR\n";
    exit ;  
}
$users_database[$_POST['login']] =  hash('whirlpool', $_POST['passwd']);
file_put_contents("../private/passwd", serialize($users_database));
ob_start();
echo "OK\n";
header("Location: index.html");
ob_end_flush();
?>