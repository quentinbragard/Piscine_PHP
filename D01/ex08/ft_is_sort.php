<?php
function ft_is_sort($tab)
{
    if (!$tab)
        return (FALSE);
    $compare = $tab;
    $rcompare = $tab;
    sort($compare);
    rsort($rcompare);
    if ($tab === $compare || $tab === $rcompare)
        return (TRUE);
    else
        return (FALSE);
}
?>