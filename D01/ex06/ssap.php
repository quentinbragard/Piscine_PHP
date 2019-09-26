#!/usr/bin/php
<?PHP
array_shift($argv);
$my_string = implode(" ", $argv);
$my_string = trim(preg_replace('/\s+/', ' ', $my_string));
$my_tab = explode(" ", $my_string);
if ($my_string != NULL)
        sort($my_tab);
foreach($my_tab as $elem)
print($elem."\n");
?>