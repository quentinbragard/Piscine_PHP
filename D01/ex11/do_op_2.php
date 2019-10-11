#!/usr/bin/php
<?PHP
if ($argc != 2)
{
    echo "Incorrect Parameters\n";
    exit;
}
function    operator($l)
{
    if (($l == '+') || ($l == "-") || ($l == "*") || ($l == "/") || ($l == "%"))
        return (1);
    return (0);
}
$i = 0;
$str = preg_replace("/\s+/", "", (trim($argv[1])));
$tab = explode(" ", preg_replace("/\s+/", " ", (trim($argv[1]))));
if ($tab[3])
{
    echo "Syntax Error\n";
    exit;
}
$len = strlen($str);
while (is_numeric($str[$i]) || ($i == 0 && ($str[$i] == "-" || $str[$i] == "+")))
{
    $str1 = $str1.$str[$i];
    ++$i;
}
if ($i == 0 || !(operator($str[$i])))
{
    echo "Syntax Error\n";
    exit;
}
$op = $str[$i];
++$i;
$option = $i;
while ($i < $len)
{
    if (!(is_numeric($str[$i])) && !($i == $option && ($str[$option] == "+" || $str[$option] == "-")))
    {
        echo "Syntax Error\n";
        exit;
    }
    $str3 = $str3.$str[$i];
    ++$i;
}
if ($op == "+")
    print $str1 + $str3;
if ($op == "-")
    print $str1 - $str3;
if ($op == "*")
    print $str1 * $str3;
if ($op == "/")
{
    if ($str3 == 0)
        print 0;
    else
        print $str1 / $str3;
}
if ($op == "%")
{
    if ($str3 == 0)
        print 0;
    else
        print $str1 % $str3;
}
print "\n";
?>