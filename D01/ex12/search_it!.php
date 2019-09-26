#!/usr/bin/php
<?php
if ($argc < 3)
    exit;
$tab = array(NULL);
$i = 2;
while ($i < $argc)
{
    array_push($tab, $argv[$i]);
    $i++;
}
array_shift($tab);
foreach($tab as $elem)
{
    if (!strncmp($elem.":", $argv[1].":", strlen($argv[1]) + 1))
        $ret = substr($elem, strlen($argv[1]) + 1, strlen($elem) - strlen($argv[1]) - 1);
}
if ($ret)
    print($ret."\n");
?>
