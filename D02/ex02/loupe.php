#!/usr/bin/php
<?php
function upper($matches) {
    return strtoupper($matches[0]);
  }

if ($argc == 1)
    exit;
$str = file_get_contents($argv[1]);
//print($str)."\n";
$test = "bonjour toto comment ca va titi tu fais du tutu?";
preg_match_all('/<a(.*)\/a>/', $str, $match);
foreach($match[0] as $elem)
print($elem)."\n";
$result = preg_replace_callback(
    '/<a(.*)\/a>/',
    function ($matches) {
        return strtoupper($matches[0]);
    } ,
    $str);
print($result)."\n\n";
preg_match_all('/>(.*)\/a>/', $str, $match);
foreach($match[0] as $elem)
print($elem)."\n";
$result = preg_replace_callback(
    '/<a(.*)\/a>/',
    function ($matches) {
        return strtoupper($matches[0]);
    } ,
    $str);
//print($result);


?>