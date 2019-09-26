#!/usr/bin/php
<?PHP
array_shift($argv);
$my_string = implode(" ", $argv);
$my_string = trim(preg_replace('/\s+/', ' ', $my_string));
$my_tab = explode(" ", $my_string);
$number = array(NULL);
$letter = array(NULL);
$garbage = array(NULL);
foreach($my_tab as $elem)
{
    if (is_numeric($elem))
        $number = array_merge($number, array($elem));
    else if(ctype_alpha($elem))
        $letter = array_merge($letter, array($elem));
    else
        $garbage = array_merge($garbage, array($elem));
}
array_shift($letter);
array_shift($number);
array_shift($garbage);
natcasesort($letter);
sort($number, SORT_STRING);
natcasesort($garbage);
foreach($letter as $elem)
print($elem."\n");
foreach($number as $elem)
print($elem."\n");
foreach($garbage as $elem)
print($elem."\n");
?>