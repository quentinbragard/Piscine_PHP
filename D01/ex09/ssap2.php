#!/usr/bin/php
<?PHP
function    compare_spec($a, $b)
{
    $len_a = strlen($a);
    $len_b = strlen($b);
    if ($len_a > $len_b)
        $len = $len_b;
    else
        $len = $len_a;
    $i = 0;
    while ($i < $len)
    {
        if (ctype_alpha($a[$i]) && !(ctype_alpha($b[$i])))
            return (-1);
        else if (!(ctype_alpha($a[$i])) && ctype_alpha($b[$i]))
            return (1);
        else if (ctype_alpha($a[$i]) && ctype_alpha($b[$i]))
            {
                if (strcasecmp($a[$i], $b[$i]) > 0)
                    return (1);
                else if (strcasecmp($a[$i], $b[$i]) < 0)
                    return (-1);
            }
        else if (is_numeric($a[$i]) && !(is_numeric($b[$i])))
            return (-1);
        else if (!(is_numeric($a[$i])) && (is_numeric($b[$i])))
            return (1);
        else if (is_numeric($a[$i]) && is_numeric($b[$i]))
            {
                if ($a[$i] > $b[$i])
                    return (1);
                else if ($a[$i] < $b[$i])
                    return (-1);
            }
        else if ($a[$i] > $b[$i])
            return (1);
        else if ($a[$i] < $b[$i])
            return (-1);
        ++$i;
    }
    if ($len_a > $len_b)
        return (1);
    else if ($len_a < $len_b)
        return (-1);
    return (0);
}

if ($argc < 2)
    exit;
foreach ($argv as $arg)
{
    if ($arg != $argv[0])
        $str = $str." ".$arg;
}
$tab = explode(" ", preg_replace("/\s+/", " ", trim($str)));
usort($tab, compare_spec);
foreach ($tab as $elem)
    print "$elem\n";
?>