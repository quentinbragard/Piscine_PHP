#!/usr/bin/php
<?php
if ($argc == 1)
    exit;

$days = Array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche",
"Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$months = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre",
"janvier", "Février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
$num_months = Array("01","02","03","04","05","06","07","08","09","10","11","12", "01","02","03","04","05","06","07","08","09","10","11","12");
$tab = explode(" ", $argv[1]);

if(!in_array($tab[0], $days, TRUE))
{
    print("Wrong Format\n");
    exit ;
}
if (!preg_match("/^([0-9]){1,2}$/", $tab[1]) || $tab[1] > 31)
{
    print("Wrong Format\n");
    exit ;
}
if(!in_array($tab[2], $months, TRUE))
{
    print("Wrong Format\n");
    exit ;
}
$tab[2] = $num_months[array_search($tab[2], $months)];
//print("tab[2] = ".$tab[2]);
if (!preg_match("/^([0-9]){4}$/", $tab[3]))
{
    print("Wrong Format\n");
    exit ;
}
if (!preg_match("/^[0-9]{2}:[0-9]{2}:[0-9]{2}/", $tab[4]))
{
    print("Wrong Format\n");
    exit ;
}
$hour = explode(":", $tab[4]);
if ($hour[0] > 23 || $hour[1] > 59 || $hour[2] > 59)
{
    print("Wrong Format\n");
    exit ;
}
array_shift($tab);
date_default_timezone_set("Europe/Paris");
print(mktime($hour[0], $hour[1], $hour[2], $tab[1], $tab[0], $tab[2])."\n");
?>