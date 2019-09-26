#!/usr/bin/php
<?php
while (1)
{
	print("Entrez un nombre: ");
	$number = trim(fgets(STDIN));
	if(feof(STDIN) == TRUE)
		exit();
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
