#!/usr/bin/php
<?PHP
if ($argc != 4)
{
    print "Incorrect parameters\n";
    exit;
}
$str = "";
foreach ($argv as $val)
{
    if (strcmp($val,$argv[0]))
        $str = $str." ".$val;
}
$tab = explode(" ", preg_replace("/\s+/", " ", (trim($str))));
if (!(strcmp($tab[1], "+")))
    echo $tab[0] + $tab[2];
if (!(strcmp($tab[1], "-")))
    echo $tab[0] - $tab[2];
if (!(strcmp($tab[1], "*")))
    echo $tab[0] * $tab[2];
if (!(strcmp($tab[1], "/")))
{
    if ($tab[2] == 0)
        echo 0;
    else
        echo $tab[0] / $tab[2];
}
if (!(strcmp($tab[1], "%")))
{
    if ($tab[2] == 0)
        echo 0;
    else
        echo $tab[0] % $tab[2];
}
echo "\n";
?>