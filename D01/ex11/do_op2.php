#!/usr/bin/php
<?php
$param = trim(preg_replace('/\s+/', ' ', $argv[1]));
$tab = explode(" ", $param);
foreach($tab as $elem)
print($elem."\n");
?>