<?php
function auth($login, $passwd)
{
    if (!file_exists("../private/passwd"))
        return (FALSE);
    $users_database = unserialize(file_get_contents("../private/passwd"));
    if (!array_key_exists($login, $users_database))
        return (FALSE);
    if ($users_database[$login] != hash('whirlpool', $passwd))
        return (FALSE);
    return (TRUE);
}
?>