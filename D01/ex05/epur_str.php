#!/usr/bin/php
<?PHP
$new = trim(preg_replace('/\s+/', ' ', $argv[1]));
print($new."\n");
?>
