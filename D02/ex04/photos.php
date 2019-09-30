#!/usr/bin/php
<?php
if ($argc == 1)
    exit ;
$c = curl_init($argv[1]);
curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
$str = curl_exec($c);
preg_match_all('/<img.*?src="(.*?)"[^\>]+>/', $str, $matches);
foreach($matches[0] as $elem)
    print($elem."\n");

//$img = '42_logo_black.svg';  
//file_put_contents($img, file_get_contents("https://www.42.fr/wp-content/themes/42/images/42_logo_black.svg"));
foreach($matches[0] as $elem)
{
$imgss = explode("src=", $elem);
$imgs = explode('"', $imgss[1]);
$url = $imgs[1];
$img = explode("/", $url);
foreach($img as $elem)
$img_name = $img[substr_count($url, "/")];
file_put_contents($img_name, file_get_contents($url));
}
?>

