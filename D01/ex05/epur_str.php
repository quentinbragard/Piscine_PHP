#!/usr/bin/php
<?PHP
if ($argc != 2)
exit;
$new = trim(preg_replace('/\s+/', ' ', $argv[1]));
print($new."\n");
?>
