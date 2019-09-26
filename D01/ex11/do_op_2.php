#!/usr/bin/php
<?php
if ($argc != 2)
{
    print("Incorrect Parameters\n");
    exit;
}
$param = trim(preg_replace('/\s+/', '', $argv[1]));
if (!preg_match("/\*|\+|\-|\/|%/", $param, $tab1))
{
    print("Syntax Error\n");
    exit ;
}
$tab2 = preg_split("/\*|\+|\-|\/|%/", $param, PREG_SPLIT_DELIM_CAPTURE);
$tab = array($tab2[0], $tab1[0], $tab2[1]);
if (count($tab) != 3 || !is_numeric($tab[0]) || !is_numeric($tab[2]))
{
    print("Syntax Error\n");
    exit ;
}
if (!in_array(trim($tab[1]), array("+", "-", "*", "/", "%")))
{
    print("Syntax Error\n");
    exit ;
}
if (trim($tab[1]) == "+")
print($tab[0] + $tab[2]);
if (trim($tab[1]) == "-")
print($tab[0] - $tab[2]);
if (trim($tab[1]) == "*")
print($tab[0] * $tab[2]);
if (trim($tab[1]) == "/")
print($tab[0] / $tab[2]);
if (trim($tab[1]) == "%")
print($tab[0] % $tab[2]);
print("\n");
?>