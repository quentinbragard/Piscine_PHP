#!/usr/bin/php
<?php
if ($argc < 2)
    exit;
$string = trim(preg_replace('/\s+/', ' ',$argv[1]));
$i = 0;
while ($i <= strlen($string) && $string[$i] != " ")
    $i++;
$first_word = substr($string, 0, $i);
$string = trim(str_replace($first_word, "", $string));
if ($argv[1])
{
    if($string)
        print($string." ".$first_word."\n");
    else
        print($first_word."\n");
}
?>