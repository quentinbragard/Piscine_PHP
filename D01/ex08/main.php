#!/usr/bin/php
<?PHP
include("ft_is_sort.php");
$tab = array("!/@#;^", "42", "Hello World", "hi", "zZzZzZz");
$tab[] = "What are we doing now ?";
//foreach($tab as $elem)
    //print($elem."\n");
if (ft_is_sort($tab))
echo "Le tableau est trie\n"; else
echo "Le tableau n’est pas trie\n"; ?>