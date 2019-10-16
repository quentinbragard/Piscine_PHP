#!/usr/bin/php
<?php
if ($argc > 1)
{
    $param = trim(preg_replace('/\t+| +/', ' ', $argv[1]));
    print($param."\n");
}
?>
