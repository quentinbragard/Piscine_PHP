#!/usr/bin/php
<?php
if ($argc < 2)
    exit;
$c = curl_init($argv[1]);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_BINARYTRANSFER, true);
$content = curl_exec($c);
$str = trim(preg_replace('/\//', "", $argv[1]));
$str = preg_replace('/https:|http:/', "", $str);
$dir = getcwd()."/".$str."/";
if (!($error = mkdir($dir)))
    exit;
preg_match_all('/img src="(.*?)"/', $content, $match);
$links = $match[1];
foreach ($links as $link)
{
    $name = preg_replace("/^(.*[\/])/", "", $link);
    $name = $dir.$name;
    if (!(preg_match("/http/", $link)))
        copy($argv[1].$link, $name);
    else
        copy($link, $name);
}
curl_close($c);
?>