#!/usr/bin/php
<?PHP
include('ft_split.php');
$my_tab = ft_split($argv[1]);
foreach($my_tab as $elem)
print($elem."\n");
?>
