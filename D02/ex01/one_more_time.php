#!/usr/bin/php
<?php
if ($argc == 1)
    exit;

$days = Array("lundi", "mardi", "mercredi", "jeudi", "vendredi", "samedi", "dimanche",
"Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
$months = Array("Janvier", "Février", "Mars", "Avril", "Mai", "Juin", "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre",
"janvier", "Février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
$num_months = Array(1,2,3,4,5,6,7,8,9,10,11,12,1,2,3,4,5,6,7,8,9,10,11,12);
$tab = explode(" ", $argv[1]);
//foreach($days as $elem)
//print($elem."\n");
if(!in_array($tab[0], $days, TRUE))
    print("Wrong Format\n");
if (!preg_match("/^([0-9]){1,2}$/", $tab[1]) || $tab[1] > 31)
    print("Wrong Format\n");
if(!in_array($tab[2], $months, TRUE))
    print("Wrong Format\n");
$tab[2] = $num_months[array_search($tab[2], $months)];
//print("tab[2] = ".$tab[2]);
if (!preg_match("/^([0-9]){4}$/", $tab[3]))
    print("Wrong Format\n");
if (!preg_match("/^[0-9]{2}:[0-9]{2}:[0-9]{2}/", $tab[4]))
    print("Wrong Format\n");
$hour = explode(":", $tab[4]);
if ($hour[0] > 23 || $hour[1] > 59 || $hour[2] > 59)
    print("Wrong Format\n");
    array_shift($tab);
$res = implode(":", $tab);
print($res."\n");
print(date_timestamp_get(date("d:M:Y:H:i:s", $res)));

    
?>