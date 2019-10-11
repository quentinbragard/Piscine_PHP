#!/usr/bin/php
<?php
while (1)
{
	print("Entrez un nombre: ");
	$str = trim(fgets(STDIN));
	$number = $str[strlen($str) - 1];
	if (feof(STDIN))
	{
		print "\n";
		exit;
	}
	if (is_numeric($number))
	{
		print("Le chiffre $number ");
		if ($number % 2)
			print("est Impair\n");
		else
			print("est Pair\n");
	}
	else
	{
		print("'");
		print($number);
		print("' n'est pas un chiffre\n");
	}
}
?>
