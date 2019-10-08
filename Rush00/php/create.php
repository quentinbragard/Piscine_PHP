<?php
if (!$_POST['login'] || !$_POST['passwd'])
{
    header('Location: ../html/create_error.html');
    exit ;
}
if (!file_exists("../private/passwd"))
{
    mkdir("../private", 0777);
    $new_user_information = array($_POST['login'] => hash('whirlpool', $_POST['passwd']));
    file_put_contents("../private/passwd", serialize($new_user_information));
    header('Location: ../html/index.html');
    exit ;
}
$users_database = unserialize(file_get_contents("../private/passwd"));
if (array_key_exists($_POST['login'], $users_database))
{
    header('Location: ../html/create_error.html');
    exit ;  
}
$users_database[$_POST['login']] =  hash('whirlpool', $_POST['passwd']);
file_put_contents("../private/passwd", serialize($users_database));
header('Location: ../html/index.html');
?>