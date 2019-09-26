<?PHP
function ft_split($string)
{
	$new = trim(preg_replace('/\s+/', ' ', $string));
	$tab = explode(" ", $new);
	if ($string != NULL)
		sort($tab);
	return($tab);
}
?>
