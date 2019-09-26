#!/usr/bin/php
<?php
if ($argc != 4 || !is_numeric($argv[1]) || !is_numeric($argv[3]))
{
    print("Incorrect Parameters\n");
    exit;
}
if (!in_array(trim($argv[2]), array("+", "-", "*", "/", "%")))
{
    print("Incorrect Parameters\n");
    exit;
}
if (trim($argv[2]) == "+")
    print($argv[1] + $argv[3]);
if (trim($argv[2]) == "-")
    print($argv[1] - $argv[3]);
if (trim($argv[2]) == "*")
    print($argv[1] * $argv[3]);
if (trim($argv[2]) == "/")
    print($argv[1] / $argv[3]);
if (trim($argv[2]) == "%")
    print($argv[1] % $argv[3]);
print("\n");
?>